<?php

//コントローラークラスを作成する基本設定
//コントローラーの場所を指定
namespace App\Http\Controllers;

//下記の場所にあるRequestファイルを使える状態にしている
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests\HelloRequest;

class HelloController extends Controller
{
  public function index(Request $request)
  {
    return view('hello.index',['msg'=>'フォームを入力：']);
  }

  public function post(HelloRequest $request)
  {
    return view('hello.index',['msg'=>'正しく入力されました！']);
  }
}
