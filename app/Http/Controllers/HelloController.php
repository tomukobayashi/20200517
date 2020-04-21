<?php

//コントローラークラスを作成する基本設定
//コントローラーの場所を指定
namespace App\Http\Controllers;

//下記の場所にあるRequestファイルを使える状態にしている
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
  public function index()
  {
    $data = ['one', 'two', 'three', 'four', 'five'];
    return view('hello.index', ['data'=>$data]);
  }

  // public function post(Request $request)
  // {
  //     return view('hello.index',  ['msg'=>$request->msg]);
  // }
}
