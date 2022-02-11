<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class schedule extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table ='schedule';
    protected $primaryKey= 'scheduleId';
    public $timestamps= false;
    protected $dates=['deleted_at'];

    
}
