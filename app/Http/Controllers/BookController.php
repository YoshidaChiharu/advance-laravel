<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //一覧表示
    public function index()
    {
        $items = Book::all();
        return view('book.index', ['items' => $items]);
    }

    //追加ページへアクセス
    public function add()
    {
        return view('book.add');
    }

    //追加処理
    public function create(Request $request)
    {
        $this->validate($request, Book::$rules);
        $form = $request->all();
        Book::create($form);
        return redirect('/book');
    }
}
