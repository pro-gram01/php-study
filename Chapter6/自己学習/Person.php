<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ScopePerson;

// モデルクラスを継承している
class Person extends Model{
    // idはDB側で割り振るため、idを保護しておく(nullでエラーにならないように保護)
    protected $guarded = array('id');
    public $timestamps = false;
    // バリデーションルールを設定
    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer | min:0 | max:150'
    );

    public function getData() {
        // dd($this->id);
        // id,name,ageを返す
        return $this->id . ':' . $this->name . '(' . $this->age . ')';
    }

    // スコープ
    public function scopeNameEqual($query, $str) {
        return $query->where('name', $str);
    }
    // ageの値が引数の値と等しいかもっと大きいものに絞り込むものです。
    public function scopeAgeGreaterThan($query, $n) {
        // dd($query);
        return $query->where('age', '>=', $n);
    }
    // ageの値が引数と等しいかもっと小さいものに絞り込みます。
    public function scopeAgeLessThan($query, $n) {
        return $query->where('age', '<=', $n);
    }
    
    // グローバルスコープの作成(オーバーライドすることでグローバルスコープの追加が可能)
    protected static function boot() {
        parent::boot(); // → これがモデル初期化専用メソッド
        // ScoperPersonをグローバルスコープとして追加
        static::addGlobalScope(new ScopePerson);
        // static::addGlobalScope('age', function (Builder $builder) {
            // 年齢が20歳未満のレコードは非表示にする
            // $builder->where('age', '>', 19);
        // });
    }
    
}
