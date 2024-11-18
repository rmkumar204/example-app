<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural form of the model name
    protected $table = 'profiles';

    // Define the attributes that can be mass-assigned
    protected $fillable = [
        'jobid',
        'recruiter',
        'jobTitle',
        'jobType',
        'state',
        'salaryFromMonthly',
        'salaryToMonthly',
        'salaryFromCTC',
        'salaryToCTC',
        'opening',
        'experience',
        'skills',
        'jobDescription',
        'company',
        'jobImage',
        'jobStatus',
    ];

    // Optionally, define date columns if applicable
    protected $dates = ['created_at', 'updated_at'];
}
