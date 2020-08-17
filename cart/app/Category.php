<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{ protected $fillable = [
    'name', 'parent_id',
];

public function courses()
{
   return $this->hasMany(Course::class,'category_id','id');

}



public function children()
{
  return $this->hasMany(Category::class,'parent_id','id');

}



public function parent()
{
  return $this->belongsTo(Category::class,'parent_id','id');

}





// public static function getValidator($data, $except = 0)
//     {
//         $rules = [
//             'name' => [
//                 'required',
//                 'string',
//                 'max:255',
//                 'min:3',
//                 'unique:categories,name,' . $except,
//             ],
//             'parent_id' => [
//                 'nullable',
//                 'int',
//                 'exists:categories,id'
//             ],

//         ];
//         $validator = Validator::make($data, $rules, [
//             'required' => ':attribute Required data!!'
//         ]);
//         return $validator;
//     }


}
