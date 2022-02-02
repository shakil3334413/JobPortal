<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'job_types_id',
        'description',
        'thumbnail',
        'status'
    ];

    public function jobtype()
    {
        return $this->belongsTo(jobtype::class,'job_types_id','id');
    }

    public function apply()
    {
        return $this->hasMany(Apply::class,'user_id','id');
    }

}
