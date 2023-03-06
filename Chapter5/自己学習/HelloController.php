<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request) {
        // if (isset($request->id)) {
        //     $param = ['id' => $request->id];
        //     // $param配列のパラメータを:idに埋め込む。「:〇〇」→プレースホルダ
        //     $items = DB::select('select * from people where id = :id', $param);
        // } else {
        //     $items = DB::select('select * from people');
        // }
        // dd($request);
        $items = DB::table('people')->orderby('age', 'asc')->get();
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
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        // DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        DB::table('people')->insert($param);
        return redirect('/hello');
    }

    // 更新処理(get)
    public function edit(Request $request) {
        // $param = ['id' => $request->id];
        // $item = DB::select('select * from people where id = :id', $param);
        $item = DB::table('people')->where('id', $request->id)->first();
        // dd($item);
        // edit.bladeに更新するデータのidを渡す
        return view('hello.edit', ['form' => $item]);
    }
    // 更新処理(post)
    public function update(Request $request) {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        // URLで指定したidのレコード内容を更新する
        // DB::update('update people set name = :name, mail = :mail, age = :age where id = :id', $param);
        DB::table('people')->where('id', $request->id)->update($param);
        return redirect('/hello');
    }

    // 削除処理(get)
    public function del(Request $request) {
        // $param = ['id' => $request->id];
        // $item = DB::select('select * from people where id = :id', $param);
        $item = DB::table('people')->where('id', $request->id)->first();
        return view('hello.del', ['form' => $item]);
    }
    // 削除処理(post)
    public function remove(Request $request) {
        // $param = ['id' => $request->id];
        // DB::delete('delete from people where id = :id', $param);
        DB::table('people')->where('id', $request->id)->delete();
        return redirect('/hello');
    }

    // 指定したidのレコードを取得
    public function show(Request $request) {
        // $id = $request->id;
        // $name = $request->name;
        $min = $request->min;
        $max = $request->max;

        // peopleデーブルにあるのidとURLから渡ってきたidが一致した最初のレコードだけを$itemsに代入
        // $item = DB::table('people')->where('id', $id)->first();
        // URLから渡ってきたidの値以下のレコードをすべて表示させる
        // $items = DB::table('people')->where('id', '<=', $id)->get();

        // レコードの抽出条件を設定 ※where(フィールド名,演算記号,値)
        // $items = DB::table('people')
        // URLから渡ってきたnameがnameフィールドに含まれているかどうか
        // ->where('name', 'like', '%' .  $name . '%')
        // URLから渡ってきたnameがmailフィールドに含まれているかどうか
        // ->orwhere('mail', 'like', '%' .  $name . '%')
        // ->get();

        //  min=?&max=? で渡ってきた年齢幅で一致したレコードを表示させる ※whereRaw( 条件式, パラメータ配列 )
        $items = DB::table('people')->whereRaw('age >= ? and age <= ?', [$min, $max])->get();
        return view('hello.show', ['items' => $items]);
    }
}