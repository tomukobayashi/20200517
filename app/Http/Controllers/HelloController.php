<?php

//コントローラークラスを作成する基本設定
//コントローラーの場所を指定
namespace App\Http\Controllers;

//下記の場所にあるRequestファイルを使える状態にしている
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests\HelloRequest;
use Validator;

class HelloController extends Controller
{
  public function index(Request $request)
   {
       if ($request->hasCookie('msg'))
       {
           $msg = 'Cookie: ' . $request->cookie('msg');
       } else {
           $msg = '※クッキーはありません。';
       }
       return view('hello.index', ['msg'=> $msg]);
   }

    public function post(Request $request)
    {
        $validate_rule = [
            'msg' => 'required',
        ];
        $this->validate($request, $validate_rule);
        $msg = $request->msg;
        $response = response()->view('hello.index', 
            ['msg'=>'「' . $msg . 
            '」をクッキーに保存しました。']);
        $response->cookie('msg', $msg, 100);
        return $response;
    }

}
