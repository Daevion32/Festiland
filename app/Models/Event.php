<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


    protected $fillable = [
        "name", 
        "description",
        "image",
        "spaces",
        "location",
        "date",
    ];

    public function user(){
        return $this->belongsToMany(User::class);
    }
}
