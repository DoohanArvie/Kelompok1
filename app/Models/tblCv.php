<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblCv extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'tbl_cvs';

    // Specify the fields that can be mass assigned
    protected $fillable = [
        'cv',
        'document',
        'users_id'
    ];

    /**
     * Get the user that owns the CV.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
