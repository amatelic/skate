<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;


class Article extends Model
{
  protected $table = 'articles';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'body','image_dir'];

  public function scopegetImagesPath($query, $type)
  {
    return Storage::disk('public')->allFiles("/photos/" . $type);
  }
}
