<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class defects extends Model
{
    use HasFactory;
    public $table= 'defects';
    protected $primaryKey = 'defect_id';
    public $timestamps =false;
}
