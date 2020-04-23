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
       $items = DB::select('select * from people');
       return view('hello.index', ['items' => $items]);
   }

   public function post(Request $request)
   {
       $items = DB::select('select * from people');
       return view('hello.index', ['items' => $items]);
   }

   public function add(Request $request)
   {
       return view('hello.add');
   }

   public function create(Request $request)
   {
       $param = [
           'name' => $request->name,
           'mail' => $request->mail,
           'age' => $request->age,
       ];
       DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
       return redirect('/hello');
   }
}
