<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tblCategory extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'slug',
        'cover'

    ];

    public function Jobs(): HasMany
    {
        return $this->hasMany(tblJob::class, 'tbl_category_id', 'id');
    }
}
