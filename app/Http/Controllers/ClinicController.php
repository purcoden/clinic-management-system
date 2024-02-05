<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClinicRequest;
use App\Http\Requests\UpdateClinicRequest;
use App\Models\User;
use App\Repositories\ClinicRepository;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class ClinicController extends AppBaseController
{
    /** @var ClinicRepository */
    private $clinicRepository;

    public function __construct(ClinicRepository $clinicRepo)
    {
        $this->clinicRepository = $clinicRepo;
    }

    /**
     * Display a listing of the Clinic.
     *
     * @return Application|Factory|View
     */
    public function index(): \Illuminate\View\View
    {
        return view('clinics.index');
    }

    /**
     * Show the form for creating a new Clinic.
     *
     * @return Application|Factory|View
     */
    public function create(): \Illuminate\View\View
    {
        $roles = $this->clinicRepository->getRole();

        return view('clinics.create', compact('roles'));
    }

    /**
     * Store a newly created Clinic in storage.
     *
     * @return Application|Redirector|RedirectResponse
     */
    public function store(CreateClinicRequest $request): RedirectResponse
    {
        $input = $request->all();
        $this->clinicRepository->store($input);

        Flash::success(__('messages.flash.clinic_create'));

        return redirect(route('clinics.index'));
    }

    /**
     * @return Application|Factory|View
     */
    public function show(User $clinic): \Illuminate\View\View
    {
        $clinic = User::whereType(User::CLINIC)->findOrFail($clinic['id']);

        return view('clinics.show', compact('clinic'));
    }

    /**
     * Show the form for editing the specified clinic.
     *
     * @return Application|Factory|View
     */
    public function edit(User $clinic): \Illuminate\View\View
    {
        $roles = $this->clinicRepository->getRole();

        return view('clinics.edit', compact('clinic', 'roles'));
    }

    /**
     * Update the specified Clinic in storage.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateClinicRequest $request, User $clinic): RedirectResponse
    {
        $this->clinicRepository->update($request->all(), $clinic->id);

        Flash::success(__('messages.flash.clinic_update'));

        return redirect(route('clinics.index'));
    }

    /**
     * Remove the specified clinic from storage.
     */
    public function destroy(User $clinic): JsonResponse
    {
        $clinic->delete();

        return $this->sendSuccess(__('messages.flash.clinic_delete'));
    }
}
