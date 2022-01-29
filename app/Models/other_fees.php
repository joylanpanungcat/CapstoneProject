<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class other_fees extends Model
{
    use HasFactory;
    public $table = 'other_fees';
    public $primaryKey='fees_id';
    public $timestamp=false;
    
    public function fee(){
      return $this->belongsTo(fee::class,'fees_id');
    }
}
