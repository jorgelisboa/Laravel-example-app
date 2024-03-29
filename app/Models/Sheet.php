<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    use HasFactory;
    protected $fillable = [
        'char_photo_path',
        'strength',
        'dexterity',
        'constitution',
        'wisdom',
        'charisma',
        'sheet_id'
    ];
    public $timestamps = false;

    public function sheet()
    {
        return $this->belongsTo(Character::class, 'id'); //Use as default key 'id'
    }
}
