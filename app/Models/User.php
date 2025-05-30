<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
    ];

    public const ADMIN = 1; //Full Access
    // public static $ADMIN = 2;
    public const USER = 2;  // Customer

    public function getRoleAttribute() {

        return match ($this->attributes['role']) {
            self::ADMIN => 'Admin',
            self::USER => 'Customer',
            default => 'Unknown',
        };
    }


    // Add mutator if you need to set the role
    public function setRoleAttribute($value): void
    {
        $this->attributes['role'] = in_array($value, [self::ADMIN, self::USER])
            ? $value
            : self::USER;
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
