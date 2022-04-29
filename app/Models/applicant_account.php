<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class applicant_account extends Authenticatable
{
    use HasApiTokens,HasFactory,Notifiable;
    use SoftDeletes;

    public $table ='applicant_account';
    protected $primaryKey ='accountId';
    public $timestamps=false;
    protected $dates=['deleted_at'];
    protected $fillable = [
        'username',
        'password',
    ];
    protected $hidden = [
        'remember_token',
    ];

    public function application(){
        return $this->hasMany(application::class,'accountId');
    }

}
