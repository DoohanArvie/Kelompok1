<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
