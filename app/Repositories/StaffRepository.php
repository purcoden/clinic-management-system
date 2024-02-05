<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\Staff;
use App\Models\State;
use App\Models\Doctor;
use App\Models\User;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class StaffRepository
 *
 * @version August 6, 2021, 10:17 am UTC
 */
class StaffRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'password',
        'gender',
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
        return Staff::class;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        $roles = Role::pluck('display_name', 'id')->except([User::ADMIN, User::DOCTOR, User::PATIENT]);

        return $roles;
    }

    public function store($input): bool
    {
        try {
            DB::beginTransaction();

            $input['email'] = setEmailLowerCase($input['email']);
            $input['password'] = Hash::make($input['password']);
            $input['type'] = User::STAFF;
            $input['email_verified_at'] = Carbon::now()->format('Y-m-d H:i:s');
            $staff = User::create($input);

            if (isset($input['profile_image']) && ! empty($input['profile_image'])) {
                $staff->addMedia($input['profile_image'])->toMediaCollection(Staff::PROFILE, config('app.media_disc'));
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

            $staff = User::find($id);
            $input['email'] = setEmailLowerCase($input['email']);
            if (isset($input['password']) && ! empty($input['password'])) {
                $input['password'] = Hash::make($input['password']);
            } else {
                unset($input['password']);
            }

            $input['type'] = User::STAFF;
            
            $staff->update($input);
            
            if (isset($input['profile_image']) && ! empty($input['profile_image'])) {
                $staff->clearMediaCollection(Staff::PROFILE);
                $staff->media()->delete();
                $staff->addMedia($input['profile_image'])->toMediaCollection(Staff::PROFILE, config('app.media_disc'));
            }

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    public function getData(): array
    {
        $data['doctors'] = Doctor::with('user')->get()->where('user.status', User::ACTIVE)->pluck('user.full_name',
            'id');
        
        return $data;
    }
    public function getCity($staff): array
    {
        $data2['city'] = State::orderBy('name', 'ASC')->pluck('name', 'id');
        // print_r($city);die;
        // $data['doctors'] = Doctor::with('user')->get()->where('user.status', true)->pluck('user.full_name', 'id');

        return $data2;
    }
}
