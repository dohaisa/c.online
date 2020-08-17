<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 'category_id', 'description', 'image','video'
    ];

    public function category()
    {

        return $this->belongsTo(Category::class);
    }

    public function vedios()
    {

        return $this->hasMany(CourseVedio::class,'course_id','id');


    }

}
