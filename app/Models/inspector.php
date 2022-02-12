<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class inspector extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table='inspector';
    protected $primaryKey ='inspectorId';
    public $timestamps=false;
    protected $dates=['deleted_at'];

}
