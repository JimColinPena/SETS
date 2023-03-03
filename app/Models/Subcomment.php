<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcomment extends Model
{
    use HasFactory;
    public $table = 'subcomments';
    public $primaryKey = 'id';
    
    protected $fillable = ['text','student_id','comment_id'];

     public function student(){
        return $this->belongsTo(Comment::class, 'id');
    }
}
