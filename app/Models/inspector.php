<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inspector extends Model
{
    use HasFactory;
    public $table='inspector';
    protected $primaryKey ='inspectorId';
    public $timestamps=false;
}
