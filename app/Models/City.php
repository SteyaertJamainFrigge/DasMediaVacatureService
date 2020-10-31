<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = [
        'name'
    ];

    public function companies(){
        return $this->hasMany( Company::class);
    }
}
