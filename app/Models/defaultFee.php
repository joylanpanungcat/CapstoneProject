<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class defaultFee extends Model
{
    use HasFactory;
    public $table= 'default';
    public $timestamp= false;

}
