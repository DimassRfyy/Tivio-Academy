<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasRole('admin');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'occupation',
        'google_id',
        'google_token',
        'google_refresh_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    public function transactions() 
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }

    public function getActiveSubscription() 
    {
        return $this->transactions()
            ->where('is_paid', true)
            ->where('ended_at', '>=', now())
            ->first(); // return details of subscription
    }

    public function hasActiveSubscription() 
    {
        return $this->transactions()
            ->where('is_paid', true)
            ->where('ended_at', '>=', now())
            ->exists(); // return boolean
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            if ($user->photo) {
                Storage::delete($user->photo);
            }
        });

        static::updating(function ($user) {
            if ($user->isDirty('photo')) {
                Storage::delete($user->getOriginal('photo'));
            }
        });
    }
}
