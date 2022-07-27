<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificate extends Model
{
    use HasFactory;
    public $table = 'certificate';
    protected $primaryKey ='cert_id';
    public $timeStamps= false;
}
