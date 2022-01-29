<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicant_assessment_model extends Model
{
    use HasFactory;
    public $table='applicant_assessment';
    public $timestamp= false;
}
