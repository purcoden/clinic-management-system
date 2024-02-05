<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\Clinic;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class ClinicRepository
 *
 * @version August 6, 2021, 10:17 am UTC
 */
class ClinicRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'no_str',
        'address',
        'no_wa',
        'link_map',
        'email',
        'phone_number',
        'password',
        'role',
    ];

    /**
     * Return searchable fields
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Clinic::class;
    }

    /**
     * @return mixed
     */
    

    public function store($input): bool
    {
        try {
            DB::beginTransaction();

            $input['email'] = setEmailLowerCase($input['email']);
            $input['password'] = Hash::make($input['password']);
            $input['type'] = User::CLINIC;
            $clinic = User::create($input);

            if (isset($input['role']) && ! empty($input['role'])) {
                $role = $clinic->assignRole($input['role']);
                $role->givePermissionTo('manage_admin_dashboard');
            }

            if (isset($input['profile_image']) && ! empty($input['profile_image'])) {
                $clinic->addMedia($input['profile_image'])->toMediaCollection(Clinic::PROFILE, config('app.media_disc'));
            }

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    public function update($input, $id)
      {
        try {
            DB::beginTransaction();

            $clinic = User::find($id);
            $input['email'] = setEmailLowerCase($input['email']);
            if (isset($input['password']) && ! empty($input['password'])) {
                $input['password'] = Hash::make($input['password']);
            } else {
                unset($input['password']);
            }

            $input['type'] = User::CLINIC;
            $clinic->update($input);
            if (isset($input['role']) && ! empty($input['role'])) {
                $clinic->syncRoles($input['role']);
            }

            if (isset($input['profile_image']) && ! empty($input['profile_image'])) {
                $clinic->clearMediaCollection(Clinic::PROFILE);
                $clinic->media()->delete();
                $clinic->addMedia($input['profile_image'])->toMediaCollection(Clinic::PROFILE, config('app.media_disc'));
            }

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
