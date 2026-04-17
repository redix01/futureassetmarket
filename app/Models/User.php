<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'pass',
        'role',
        'status',
        'balance',
        'profit',
        'phone',
        'telegram',
        'avatar',
        'country',
        'city',
        'address',
        'id_type',
        'id_image_1',
        'id_image_2',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function status()
    {
        if ($this->status >= 1) {
            return '<span class="badge bg-success">Verified</span>';
        }
        return '<span class="badge bg-danger">Not Verified</span>';
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function stockOrder()
    {
        return $this->hasMany(StockOrder::class);
    }

    public function referral()
    {
        return $this->hasOne(Referral::class);
    }

    public function referredBy()
    {
        return $this->hasOne(Referral::class, 'user_id')->with('referrer');
    }

    public function referrals()
    {
        return $this->hasManyThrough(
            User::class,
            Referral::class,
            'referrer_id',  // This user's ID as the referrer
            'id',           // Referred user's ID
            'id',           // This user's ID
            'user_id'       // Referred user's ID in referrals table
        );
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail);
    }

    public function getIdImage1UrlAttribute()
    {
        if ($this->id_image_1) {
            return asset('storage/' . $this->id_image_1);
        }
        return null;
    }

    public function getIdImage2UrlAttribute()
    {
        if ($this->id_image_2) {
            return asset('storage/' . $this->id_image_2);
        }
        return null;
    }

    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        }
        return asset('img/user/default-avatar.png');
    }

}
