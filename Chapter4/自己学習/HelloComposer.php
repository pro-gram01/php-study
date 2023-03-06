<?php
namespace App\Http\Composers;

use Illuminate\View\View;

// ビューコンポーザークラス
class HelloComposer {
    public function compose(View $view) {
        // ビューの名前をview_messageに設定する(withメソッドでView内に変数の値を渡すことが可能)
        $view->with('view_message', 'this view is "' . $view->getName() . '"!!');
    }
}