<?php

namespace App\Models;

use App\Services\Scopes\LanguageScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected static function booted(){

        static::addGlobalScope(new LanguageScope());
    }
}
