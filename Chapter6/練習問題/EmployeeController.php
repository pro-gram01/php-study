<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller{
    // 社員情報一覧を表示(モデル名は？)
    public function index(Request $request) {
        // dd($request);
        // $items = DB::table('employee')->orderby('employee_code', 'asc')->get();
        $items = Employee::all();
        // dd($items);
        return view('hello.index', ['items' => $items]);
    }

    // 追加処理(get)
    public function add(Request $request) {   
        return view('hello.add');
    }
    // 追加処理(post)
    public function create(Request $request) {
        // バリデーションの実行
        $this->validate($request, Employee::$rules);
        // dd($request->addname);
        // Personインスタンスの作成
        $employee = new Employee;
        // フォームからの値をすべて$formに代入
        $form = $request->all();
        // フォームのトークンは削除しておく
        unset($form['_token']);
        // Personインスタンスにフォームで入力された値を設定し保存
        $employee->fill($form)->save();
        return redirect('/hello');
    }

    // 更新処理(get)
    public function edit(Request $request) {
        // $person = Employee::find($request->editcode);
        // employee_codeを指定する
        $employee = Employee::where('employee_code', $request->editcode)->first();
        // $item = DB::table('employee')->where('employee_code', $request->editcode) -> first();    
        return view('hello.edit', ['form' => $employee]);
    }
    // 更新処理(post)
    public function update(Request $request) {
        $this->validate($request, Employee::$rules);
        // dd($request);
        // employee_codeパラメータの値のモデルを取得
        $employee = Employee::where('employee_code', $request->employee_code)->first();
        $form = $request->all();
        unset($form['_token']);
        // dd($form);
        // $employee->timestamps = false;
        // ↓↓↓ここでエラー↓↓↓
        $employee->fill($form)->save();
        // dd($employee);
        return redirect('/hello');
    }

    // 削除処理(post)
    public function remove(Request $request) {
        // DB::table('employee')->where('employee_code', $request->delcode)->delete();
        Employee::where('employee_code', $request->delcode)->delete();
        return redirect('/hello');
    }

    // 名前あいまい検索(get)
    public function find(Request $request) {
        return view('hello.find', ['employee_name' => '']);
    }
    // 名前あいまい検索(post)
    public function search(Request $request) {
        // バリデーションの実行
         $this->validate($request, Employee::$rules);
        // dd($request);
        $name = $request->employee_name;
        // 入力された名前(あいまい)のレコードを表示する
        $items = Employee::where('employee_name', 'like', '%' . $name . '%')->get();
        // dd($items);
        // dd($param);
        return view('hello.find', compact('items'));
    }
}
