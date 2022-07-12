<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class toCorrectDefects extends Model
{
    use HasFactory;
    public $table= 'to_correct_defects';
    protected $primaryKey = 'defect_id';
    public $timestamps =false;
}
