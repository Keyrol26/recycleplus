<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'email_verified_at'
    ];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function role(): Attribute
    {
        return new Attribute(
            get: fn($value) => ["0", "1", "2", "3"][$value],
        );
    }
    public function admin()
    {
        return $this->hasOne(Admins::class, 'user_id');
    }

    public function superadmin()
    {
        return $this->hasOne(Superadmins::class, 'user_id');
    }

    public function client()
    {
        return $this->hasOne(Clients::class, 'user_id');
    }

    public function collector()
    {
        return $this->hasOne(Collector::class, 'user_id');
    }

    public function userprofile()
    {
        return $this->hasOne(UserProfile::class, 'user_id');
    }

    public function address()
    {
        return $this->hasMany(Address::class, 'user_id');
    }

    public function timeline()
    {
        return $this->hasMany(BookingActivity::class, 'updated_by');
    }
}
