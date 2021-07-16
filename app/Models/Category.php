<?php

namespace App\Models;

use App\Services\Scopes\LanguageScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    public function contents()
    {
     return   $this->hasMany(Content::class);
    }

    public function field()
    {
        return $this->hasOne(Field::class);
    }

    public function translateCategory()
    {
        return $this->hasOne(TranslateCategory::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

}
