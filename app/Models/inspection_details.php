<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inspection_details extends Model
{
    use HasFactory;
    public $table='inspection_details';
    protected $primaryKey='inspection_id';
    public $timestamps= false;
    
}
