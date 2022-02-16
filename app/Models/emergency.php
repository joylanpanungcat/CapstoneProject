<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emergency extends Model
{
    use HasFactory;
    public $table='emergency';
    public $timestamps= false;
    public $primaryKey ='emergency_id';
}
