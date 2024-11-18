<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    use HasFactory;

    // Define the table name (optional if it follows Laravel's pluralization)
    protected $table = 'recruiters'; 

    // Define the fillable attributes (fields that can be mass-assigned)
    protected $fillable = [
        'name', 
        'email', 
        'phone', 
        'company',
        'address',
    ];

    // Optionally, define any relationships (e.g., with jobs, candidates, etc.)
    // public function jobs() {
    //     return $this->hasMany(Job::class);
    // }
}
