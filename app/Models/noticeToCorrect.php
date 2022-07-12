<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class noticeToCorrect extends Model
{
    use HasFactory;
    public $table = 'notice_to_correct';
    protected $primaryKey = 'notice_id';
    public $timestamps = false;
}
