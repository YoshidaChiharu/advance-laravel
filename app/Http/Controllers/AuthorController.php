<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    // データ一覧ページの表示
    public function index() 
    {
        // Authorクラスのallメソッドを利用して、authorsテーブルから全件取得
        $authors = Author::all();
        // dd($authors); // デバッグ処理
        return view('index', ['authors' => $authors]);
    }

    // データ追加用ページの表示
    public function add()
    {
        return view('add');
    }

    // データ追加処理
    public function create(AuthorRequest $request)
    {
        $form = $request->all();
        // dd($form); // デバッグ処理
        Author::create($form);
        return redirect('/');
    }

    // データ更新ページの表示
    public function edit(Request $request)
    {
        // クエリ文字列（ID）を受け取って…
        // テーブルから一致するIDのレコードを取得
        $author = Author::find($request->id);
        // レコードを渡しつつedit.blade.phpを表示
        return view('edit', ['form' => $author]);
    }

    // データ更新処理
    public function update(AuthorRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        // dd($form); // デバッグ処理
        Author::find($request->id)->update($form);
        return redirect('/');
    }

    // データ削除ページの表示
    public function delete(Request $request)
    {
        $author = Author::find($request->id);
        return view('delete', ['author' => $author]);
    }

    // 削除処理
    public function remove(Request $request)
    {
        // 削除するIDの取得して…
        // テーブルからIDに一致するレコードを削除
        // dd($request->all()); // デバッグ処理
        Author::find($request->id)->delete();
        return redirect('/');
    }

    // 名前での検索
    public function find()
    {
        return view('find', ['input' => ""]);
    }

    public function search(Request $request)
    {
        $items = Author::where('name', 'LIKE', "%{$request->input}%")->get();
        $param = [
            'input' => $request->input,
            'items' => $items,
        ];
        return view('find', $param);
    }

    // 
    public function bind(Author $author)
    {
        $data = [
            'item' => $author,
        ];
        return view('author.binds', $data);
    }

    // エラー表示
    public function verror()
    {
        return view('verror');
    }

    //
    public function relate()
    {
        $items = Author::all();
        return view('author.index', ['items' => $items]);
    }
}
