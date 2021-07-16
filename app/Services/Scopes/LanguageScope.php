<?php
/**
 * Created by PhpStorm.
 * User: Mehmet F. GCGN
 * Date: 9.07.2021
 * Time: 14:36
 */

namespace App\Services\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class LanguageScope implements \Illuminate\Database\Eloquent\Scope
{

    /**
     * @inheritDoc
     */
    public function apply(Builder $builder, Model $model)
    {
        if(session("language")) {
            $builder->where("language", session("language"));
        }
    }
}
