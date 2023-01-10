<?php

namespace App\Models;
//namespace App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope('users_id',function(Builder $builder){
            $builder->where('users_id', '=', auth()->id());
        });
    }

    use HasFactory;
    protected $fillable =
        [
            'project_name',
            'deadline',
            'user_id',
            'category',
            'task',
            'visible',
            'updated_at',
            'created_at',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
