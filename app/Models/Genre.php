<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'zanr'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function book(){
        return $this->hasMany(Book::class);

    }
}
