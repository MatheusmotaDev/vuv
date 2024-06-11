<?php

namespace App\Models;

use App\Notifications\NewQuotation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\DatabaseNotification as Notification; // Importe a classe Notification corretamente

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'legal_id',
        'phone_number',
        'role',
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
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function quotations(): HasMany
    {
        return $this->hasMany(Quotation::class, 'costumer_id');
    }

    public function budgets(): HasMany
    {
        return $this->hasMany(Budget::class, 'seller_id');
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function isSeller(): bool
    {
        return $this->role == 'seller';
    }

    public function isAdmin(): bool
    {
        return $this->role == 'admin';
    }

    // Define relação para notificações
    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    // Define relação para notificações não lidas
    public function unreadNotifications(): HasMany
    {
        return $this->notifications()->whereNull('read_at');
    }
}
