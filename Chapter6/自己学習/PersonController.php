<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller{
    public function index(Request $request) {
        $items = Person::all();
        return view('person.index', ['items' => $items]);
    }

    // フィールド検索(get)
    public function find(Request $request) {
        return view('person.find', ['input' => '']);
    }
    // フィールド検索(post)
    public function search(Request $request) {
        $min = $request->input * 1;  // 入力された文字列をInt型するため*1をする
        // dd($min);
        $max = $min + 10;    
        // findの引数はプライマリーキーのIDという前提。
        // $item = Person::find($request->input);
        // nameフィールドで検索
        // $item = Person::where('name', $request->input)->first();
        // $item = Person::nameEqual($request->input)->first();
        // スコープを利用し、入力された年齢幅のレコードを表示する
        $item = Person::ageGreaterThan($min)->ageLessThan($max)->first();
        // dd($item);
        $param = ['input' => $request->input, 'item' => $item];
        return view('person.find', $param);
    }

    // 追加処理(get)
    public function add(Request $request) {
        return view('person.add');
    }
    // 追加処理(post)
    public function create(Request $request) {
        // バリデーションの実行
        $this->validate($request, Person::$rules);
        // Personインスタンスの作成
        $person = new Person;
        // フォームからの値をすべて$formに代入
        $form = $request->all();
        // フォームのトークンは削除しておく
        unset($form['_token']);
        // Personインスタンスにフォームで入力された値を設定し保存
        $person->fill($form)->save();
        // 以下のように1つずつ値をインスタンスに設定してもOK
        $person->name = $request->name;
        $person->mail = $request->mail;
        $person->age = $request->age;
        $person->save();

        return redirect('/person');
    }
    
    // 更新処理(get)
    public function edit(Request $request) {
        $person = Person::find($request->id);
        return view('person.edit', ['form' => $person]);
    }
    // 更新処理(post)
    public function update(Request $request) {
        $this->validate($request, Person::$rules);
        // idパラメータの値のモデルを取得
        $person = Person::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $person->fill($form)->save();
        return redirect('/person');
    }

    // 削除処理(get)
    public function delete(Request $request) {
        // idパラメータの値のモデルを取得
        $person = Person::find($request->id);
        // dd($person->age);
        return view('person.delete', ['form' => $person]);
    }
    // 削除処理(post)
    public function remove(Request $request) {
        Person::find($request->id)->delete();
        return redirect('/person');
    }
    
}
