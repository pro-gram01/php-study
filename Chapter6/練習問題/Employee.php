<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Employee extends Model{
    // use HasFactory;
    // employeeテーブルを紐づける
    protected $table = 'employee';
    // employee_codeをプライマリーキーとする
    protected $primaryKey = 'employee_code';
    // idはDB側で割り振るため、idを保護しておく(nullでエラーにならないように保護)
    protected $guarded = array('employee_code');
    public $timestamps = false;
    // バリデーションルールを設定(社員名)
    public static $rules = array(
        'employee_name' => 'required | alpha'
    );

    public function getCode() {
        // dd($this->employee_name);
        // 社員コードと社員名を返す
        return $this->employee_code;
    }

    public function getName() {
        // dd($this->employee_name);
        // 社員コードと社員名を返す
        return $this->employee_name;
    }
}
