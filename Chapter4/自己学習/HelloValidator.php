<?php
namespace App\Http\Validators;

use Illuminate\Validation\Validator;

// オリジナルバリデータ
class HelloValidator extends Validator {
    public function validateHello($attribute, $value, $parameter) {
        // 入力された年齢が($value)が偶数なら許可(trueを返す、奇数の場合falseを返しエラーが発生したことを示す)
        return $value % 2 == 0;
    }
}