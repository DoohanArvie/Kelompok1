<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class tblJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'job',
        'slug',
        'lokasi',
        'tbl_category_id',
        'tbl_company_id',
        'is_open',
        'description',
        'requirement',
        'salary',
        'benefit',
    ];

    public function category()
    {
        return $this->belongsTo(tblCategory::class, 'tbl_category_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(tblCompany::class, 'tbl_company_id', 'id');
    }

    public function seekers()
    {
        return $this->belongsToMany(User::class, 'tbl_jobseekers', 'tbl_job_id', 'users_id');
    }
}
