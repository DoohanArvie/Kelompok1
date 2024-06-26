<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'no_hp',
        'tgl_lahir',
        'address',
        'foto',
        'role',
        'gender',
        'password',
        'tbl_company_id',
    ];

    protected $table = 'tbl_users';

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
        'password' => 'hashed',
    ];

    public function Jobs()
    {
        return $this->belongsToMany(tblJob::class, 'tbl_jobseekers', 'tbl_user_id', 'tbl_job_id')
            ->withPivot('status', 'created_at', 'updated_at');
    }

    public function cvs()
    {
        return $this->hasOne(tblCv::class, 'tbl_user_id', 'id');
    }

    public function Company(): BelongsTo
    {
        return $this->belongsTo(tblCompany::class);
    }
}
