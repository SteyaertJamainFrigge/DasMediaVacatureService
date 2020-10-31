<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    public $timestamps = true;

    protected $fillable = [
      'title',
      'company_id',
      'description',
      'type'
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
