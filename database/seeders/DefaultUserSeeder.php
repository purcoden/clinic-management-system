<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Specialization;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'first_name' => 'Super Admin',
                'contact' => '1234567890',
                'gender' => User::MALE,
                'type' => User::ADMIN,
                'email' => 'admin@gmail.com',
                'status' => 1,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('123456'),
                'region_code' => '62',
            ],
            [
                'first_name' => 'Krisnawan Adi',
                'contact' => '085814936812',
                'dob' => '1981-02-03',
                'gender' => User::MALE,
                'type' => User::DOCTOR,
                'email' => 'doctor@gmail.com',
                'status' => '1',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('123456'),
            ],
            [
                'first_name' => '23 Paskal Shopping Center',
                'last_name' => 'Walsh',
                'contact' => '1234567890',
                'gender' => User::MALE,
                'status' => 1,
                'no_izin' => '445/7992-Dinkes/15-SIO-KU/IV/!8',
                'no_wa' => '+6281223186529',
                'link_map' => 'https://www.google.com/maps?z=12&t=m&q=loc:-6.915214+107.594375',
                'link_map' => 'https://www.google.com/maps?z=12&t=m&q=loc:-6.915214+107.594375',
                'type' => User::STAFF,
                'email' => 'clinic@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('123456'),
            ],
        ];

        foreach ($users as $key => $user) {
            $user = User::create($user);
            if ($key == 1) {
                $doctor = Doctor::create(['user_id' => $user->id]);
                $user->address()->create(['owner_id' => $user->id]);
            }
            if ($key == 2) {
                $patient = Patient::create(['user_id' => $user->id, 'patient_unique_id' => 'UNIQUE12']);
                $patient->address()->create(['owner_id' => $patient['user_id']]);
            }
        }

        $specializationIds = Specialization::pluck('id');
        $doctor->specializations()->sync($specializationIds);
    }
}
