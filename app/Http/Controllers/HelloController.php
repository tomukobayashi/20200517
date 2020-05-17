<?php

//コントローラークラスを作成する基本設定
//コントローラーの場所を指定
namespace App\Http\Controllers;

//下記の場所にあるRequestファイルを使える状態にしている
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests\Hellorequest;
use App\Http\Requests\HelloRequest2;
use Validator;

use Illuminate\Support\Facades\DB;

use App\Person;
use Illuminate\Support\Facades\Auth;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if(!$request->sort) {
            $sort = 'id';
        } else {
            $sort = $request->sort;
        }
        $items = Person::orderBy($sort, 'asc')
                ->simplePaginate(5);
        $param = ['items' => $items, 'sort' => $sort, 'user' => $user];
        return view('hello.index', $param);
    }

   public function post(Request $request)
   {
       $items = DB::select('select * from people');
       return view('hello.index', ['items' => $items]);
   }


   // insert
   public function add(Request $request)
   {
       return view('hello.add');
   }

   public function create(Hellorequest $request)
   {
       $param = [
           'name' => $request->name,
           'mail' => $request->mail,
           'age' => $request->age,
       ];
        DB::table('people')->insert($param);
       return redirect('/hello');
   }


   // update
   public function edit(Request $request)
    {
    $item = DB::table('people')
        ->where('id', $request->id)->first();
    return view('hello.edit', ['form' => $item]);
    }

public function update(HelloRequest2 $request)
    {
    $param = [
       'name' => $request->name,
       'mail' => $request->mail,
       'age' => $request->age,
   ];
    DB::table('people')
        ->where('id', $request->id)
        ->update($param);
   return redirect('/hello');
}

//delete
public function del(Request $request)
{
    $item = DB::table('people')
        ->where('id', $request->id)->first();
    return view('hello.del', ['form' => $item]);
}

public function remove(Request $request)
{
    DB::table('people')
        ->where('id', $request->id)->delete();
   return redirect('/hello');
}

}