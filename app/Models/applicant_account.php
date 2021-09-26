<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class applicant_account extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table ='applicant_account';
    protected $primaryKey ='accountId';
    public $timestamps=false;
    protected $dates=['deleted_at'];

    public function application(){
        return $this->hasMany(application::class,'accountId');
    }
   
}
