<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblCv extends Model
{
    use HasFactory;

    protected $fillable = [
        'cv',
        'document',
        'tbl_user_id',
    ];
}
