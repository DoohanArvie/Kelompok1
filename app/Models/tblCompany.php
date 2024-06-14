<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tblCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'cover',
        'about',
        'website',
        'email',
    ];

    public function Job()
    {
        return $this->hasMany(tblJob::class, 'tbl_company_id', 'id');
    }

    public function Admin(): HasMany
    {
        return $this->hasMany(User::class, 'tbl_company_id', 'id');
    }
}
