<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DefaultClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            'name' => 'Erha Ultimate',
            'no_izin' => '91201002725740035',
            'contact' => '1234567890',
            'no_wa' => '1234567890',
            'address' => 'Jakarta',
            'type' => User::CLINIC,
            'email' => 'clinic@gamil.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123456'),
            'region_code' => '62',
        ];

        $user = User::create($input);

        /** @var Role $clinicRole */
        $clinicRole = Role::create(['name' => 'clinic', 'display_name' => 'Clinic']);
        $user->assignRole($clinicRole);

        /** @var Permission $allPermission */
        $allPermission = Permission::pluck('id');
        $clinicRole->givePermissionTo($allPermission);
    }
}
