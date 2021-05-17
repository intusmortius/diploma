<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{

    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'worker_specialization',
        'worker_group',
        'worker_cathedra',
        'worker_faculty',
        'customer_work_place',
        'about',

    ];

    protected $hidden = [
        'password',
        'remember_token',

    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',

    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['resource_url'];

    public function vacancy()
    {
        return $this->hasOne(Vacancy::class, "author_id");
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    public function chatable()
    {
        return $this->belongsToMany(User::class, "chatable_users", "receiver_id");
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/users/' . $this->getKey());
    }
}
