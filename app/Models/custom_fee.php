<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class custom_fee extends Model
{
    use HasFactory;
    public $table = 'custom_fee';
    public $timestamp= false;
    public $primaryKey= 'fees_id';

}
