<?php

//コントローラークラスを作成する基本設定
//コントローラーの場所を指定
namespace App\Http\Controllers;

//下記の場所にあるRequestファイルを使える状態にしている
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// use App\Http\Requests\HelloRequest;
// use Validator;

use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->id))
        {
           $param = ['id' => $request->id];
           $items = DB::select('select * from people where id = :id',
              $param);
        } else {
           $items = DB::select('select * from people');
        }
        return view('hello.index', ['items' => $items]);
    }

}
