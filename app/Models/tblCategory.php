<?php

namespace App\Models;

use Illuminate\Queue\Jobs\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tblCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'

    ];

    public function Jobs()
    {
        return $this->hasMany(Job::class);
    }
}
