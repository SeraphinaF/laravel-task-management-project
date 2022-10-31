<?php

namespace App\Models;
//namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory;

    protected $table ='categories';

    protected $fillable =
        [
        'name'
        ];
    //Tells which model to connect to and that there are multiple projects for one category
    public function projects()
    {
        return $this->hasMany('App\Project', 'category_id');
    }

}
