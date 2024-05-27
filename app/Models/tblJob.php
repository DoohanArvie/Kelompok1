<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblJob extends Model
{
    use HasFactory;

    public function Category()
    {
        return $this->belongsTo(tblCategory::class, 'category_id', 'id');
    }

    public function Company()
    {
        return $this->belongsTo(tblCompany::class, 'company_id', 'id');
    }

    public function Seekers()
    {
        return $this->belongsToMany(User::class, 'tbl_jobseekers', 'tbl_job_id', 'tbl_user_id');
    }
}
