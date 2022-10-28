<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'project_name',
            'deadline',
//          'user_id',
            'category_id',
            'task',
            'updated_at',
            'created_at',
    ];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Category',);
    }
}
