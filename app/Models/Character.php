<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $table = 'character';
    protected $fillable = ['name']; //Mass assignment

    public function sheets()
    {
        return $this->hasOne(Sheet::class, 'sheet_id');
    }
}
