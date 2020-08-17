<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseVideo extends Model
{
    protected $guarded = [];


    public function course()
    {
        return $this->belongsTo(
            Course::class,
            'course_id',
            'id'
        );
  }
}
