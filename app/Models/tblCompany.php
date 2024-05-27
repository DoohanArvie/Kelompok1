<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'cover'
    ];

    public function Job()
    {
        return $this->hasMany(tblJob::class, 'company_id', 'id');
    }
}
