<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    public $table = 'notes';
    public $primaryKey = 'id';
    
    protected $fillable = ['student_id','title','text'];

    public function student(){
        return $this->belongsTo(Student::class, 'id');
    }
}
