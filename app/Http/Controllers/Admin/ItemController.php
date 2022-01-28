<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{
    //商品一覧ページ
    public function index()
    {
        //SELECT * FROM items;
        $items = Item::get();
        $data = ['items' => $items];
        return view('admin.item.index', $data);
    }

    //商品入力
    public function create()
    {
        return view('admin.item.create');
    }

    //商品追加  
    public function add(Request $request)
    {
        $posts = $request->all();
        // dd($posts);
        //INSERT INTO items SET name = 'XXXX', code ='XXXX', ...;
        Item::create($posts);
        //商品一覧にリダイレクト
        return redirect('/admin/item/');
    }

    public function edit(Request $request, $id)
    {
        //SELECT * FROM items WHERE id = xxx;
        $item = Item::find($id);
        $data = ['item' => $item];
        return view('admin.item.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $posts = $request->all();
        //UPDATE items SET name = 'xxxx', code = 'xxxx' ... WHERE id = xxx;
        Item::find($id)->update($posts);
        return redirect()->route('admin.item.index');
    }


}