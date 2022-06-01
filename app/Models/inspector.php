<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class inspector extends Model
{
    use HasApiTokens,HasFactory,Notifiable;
    use SoftDeletes;
    public $table='inspector';
    protected $primaryKey ='inspectorId';
    public $timestamps=false;
    protected $dates=['deleted_at'];
    protected $hidden = [
        'remember_token',
    ];
}
