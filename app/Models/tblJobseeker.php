<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblJobseeker extends Model
{
    use HasFactory;

    protected $table = 'tbl_jobseekers';

    protected $fillable = [
        'tbl_user_id',
        'tbl_job_id',
        'status',
    ];
}
