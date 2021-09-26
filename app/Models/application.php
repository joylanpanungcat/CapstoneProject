<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class application extends Model
{
    use HasFactory;
     public $table='application';
    protected $primaryKey='applicationId';
  public $timestamps=false;

    public function applicant_account(){
        return $this->belongsTo(applicant_account::class,'applicationId');
    }
}
