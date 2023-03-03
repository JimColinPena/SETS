<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'start', 'end' , 'student_id'
    ];
    public function student(){
        return $this->belongsTo(Student::class, 'id');
    }
}
