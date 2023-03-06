<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

// スコープクラス
class ScopePerson implements Scope {
    public function apply(Builder $builder, Model $model) {
    //     // 年齢が20歳未満のレコードは非表示にする
        $builder->where('age', '>', 19);
    }

}
