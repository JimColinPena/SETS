<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $table = 'comments';
    public $primaryKey = 'id';
    
    protected $fillable = ['text','student_id'];

    public function subcomment(){
       return $this->hasMany(Subcomment::class, 'comment_id');
    }

    public function student(){
        return $this->belongsTo(Student::class, 'id');
    }
}
