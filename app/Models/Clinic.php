<?php

namespace App\Models;

use Database\Factories\ClinicFactory;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class Clinic
 *
 * @version August 6, 2021, 10:17 am UTC
 *
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone_number
 * @property string $password
 * @property string $gender
 * @property string $role
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static ClinicFactory factory(...$parameters)
 * @method static Builder|Clinic newModelQuery()
 * @method static Builder|Clinic newQuery()
 * @method static Builder|Clinic query()
 * @method static Builder|Clinic whereCreatedAt($value)
 * @method static Builder|Clinic whereEmail($value)
 * @method static Builder|Clinic whereFirstName($value)
 * @method static Builder|Clinic whereGender($value)
 * @method static Builder|Clinic whereId($value)
 * @method static Builder|Clinic whereLastName($value)
 * @method static Builder|Clinic wherePassword($value)
 * @method static Builder|Clinic wherePhoneNumber($value)
 * @method static Builder|Clinic whereUpdatedAt($value)
 *
 * @mixin Model
 *
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[]
 *     $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 *
 * @method static Builder|Clinic permission($permissions)
 * @method static Builder|Clinic role($roles, $guard = null)
 */
class Clinic extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasRoles;

    protected $table = 'Clinic';

    const PROFILE = 'profile_image';

    public $fillable = [
        'name',
        'no_izin',
        'email',
        'phone_number',
        'no_wa',
        'address',
        'link_map',
        'password',
        'role',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'no_izin' => 'string',
        'email' => 'string',
        'phone_number' => 'string',
        'no_wa' => 'string',
        'address' => 'string',
        'password' => 'string',
        'link_map' => 'string',
        'role' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'no_izin' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|same:password_confirmation|min:6',
        'contact' => 'nullable|unique:users,contact',
        'role' => 'required',
    ];
}
