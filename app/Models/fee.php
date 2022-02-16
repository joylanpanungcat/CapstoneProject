<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class fee extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table='fees';
    protected $primaryKey= 'fees_id';
    public $timestamp=false;
    protected $dates=['deleted_at'];


    public function other_fees(){
        return $this->hasMany(other_fees::class,'fees_id');
    }
}
