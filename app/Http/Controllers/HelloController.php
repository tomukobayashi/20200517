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
       ['name'=>'山田たろう', 'mail'=>'taro@yamada'],
       ['name'=>'田中はなこ', 'mail'=>'hanako@flower'],
       ['name'=>'鈴木さちこ', 'mail'=>'sachico@happy']
   ];
   return view('hello.index', ['data'=>$data]);
  }
}
