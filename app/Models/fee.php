<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fee extends Model
{
    use HasFactory;
    public $table='fees';
    public $timestamp=false;

    public function other_fees(){
        return $this->hasMany(other_fees::class,'fees_id');
    }
}
