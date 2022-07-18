<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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
        'password',
        'is_admin',
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

    public function checklists()
    {
        return $this->hasMany(Checklist::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function subtasks()
    {
        return $this->hasMany(Subtask::class);
    }

    public function habits()
    {
        return $this->hasMany(Habit::class);
    }

    public function routines()
    {
        return $this->hasMany('App\Models\Routine');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    
    public function friends()
    {
        return $this->hasMany('App\Models\Friend', 'user_id_requester');
    }

    public function friendsacceptors()
    {
        return $this->hasMany('App\Models\Friend', 'user_id_acceptor');
    }
}
