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
      $data = [
          'msg'=>'お名前を入力下さい。',
      ];
      return view('hello.index', $data);
  }

  public function post(Request $request)
  {
      $msg = $request->msg;
      $data = [
          'msg'=>'こんにちは、' . $msg . 'さん！',
      ];
      return view('hello.index', $data);
  }
}
