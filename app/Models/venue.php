<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venue extends Model
{
    use HasFactory;
    public $table = 'venues';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'venue_id', 'id');
    }
}
