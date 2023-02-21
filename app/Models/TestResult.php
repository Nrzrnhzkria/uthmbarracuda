<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    use HasFactory;
    protected $table = 'test_results';

    protected $fillable = [
        'matric_no',
        'result',
        'weight',
        'image',
        'test_id'
    ];
}
