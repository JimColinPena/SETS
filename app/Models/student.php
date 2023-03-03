<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'students';
    public $primaryKey = 'id';
    
    protected $fillable = ['first_name','last_name',
        'middle_name','section','course'
        ];

// 07-21
    public function events(){
       return $this->hasMany(Event::class, 'student_id');
    }

    public function notes(){
       return $this->hasMany(Note::class, 'student_id');
    }

    public function comments(){
       return $this->hasMany(Comment::class, 'student_id');
    }
}
