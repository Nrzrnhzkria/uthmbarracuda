<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AthleteDetails extends Model
{
    use HasFactory;
    protected $table = 'athlete_details';

    protected $fillable = [
        'matric_no',
        'ic_no',
        'phone_no',
        'gender',
        'faculty',
        'weight',
        'height',
        'experience',
        'aspirations',
        'user_id'
    ];
}
