<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller{
    // 社員情報一覧を表示
    public function index(Request $request) {
        // dd($request);
        $items = DB::table('employee')->orderby('employee_code', 'asc')->get();
        // dd($items);
        return view('hello.index', ['items' => $items]);
    }

    // 追加処理(get)
    public function add(Request $request) {   
        return view('hello.add');
    }
    // 追加処理(post)
    public function create(Request $request) {
        $param = [
            // 'employee_code' => $request->code,
            'employee_name' => $request->addname,
        ];
        DB::table('employee')->insert($param);
        return redirect('/hello');
    }

    // 更新処理(get)
    public function edit(Request $request) {
        // dd($request);
        $item = DB::table('employee')->where('employee_code', $request->editcode) -> first();    
        // dd($item);
        return view('hello.edit', ['form' => $item]);
    }
    // 更新処理(post)
    public function update(Request $request) {
        $param = [
            'employee_code' => $request->editcode,
            'employee_name' => $request->editname,
        ];
        DB::table('employee')->where('employee_code', $request->editcode)->update($param);
        return redirect('/hello');
    }

    // 削除処理(post)
    public function remove(Request $request) {
        DB::table('employee')->where('employee_code', $request->delcode)->delete();
        return redirect('/hello');
    }
}
