<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OmikujiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        if ($this->path() == 'apply') {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        // return [
        //     'name' => 'required | alpha' ,
        //     'write' => 'required | max: 50'
        // ];
    }
    // エラーメッセージを日本語化する
    // public function messages() {
    //     return [
    //         'name.required' => '名前は必ず入力して下さい。',
    //         'name.string' => '名前に数値は入力できません。',
    //         'write.required' => '書き込みは必ず入力して下さい。',
    //         'write.max' => '入力できる文字数は50文字までです。'
    //     ];
    // }
}
