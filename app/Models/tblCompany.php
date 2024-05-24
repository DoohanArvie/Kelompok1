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

    public function Jobs()
    {
        return $this->hasMany(tblJob::class);
    }
}
