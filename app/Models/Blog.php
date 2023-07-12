<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    public static function saveData($dataVal, $blog, $userId, $id = null)
    {
      $saveData = ($id) ? Blog::find($id) : new Blog;
      if ($blog) : $saveData->image = $blog;
      endif;
      $saveData->content = $dataVal->content;
      $saveData->title = $dataVal->title;
      $saveData->slug = Str::slug($dataVal->title);
      $saveData->user_id = $userId;
      $saveData->save();
    }
  
    public static function getBlog($id)
    {
      return Blog::where('id', $id)->delete();
    }
}
