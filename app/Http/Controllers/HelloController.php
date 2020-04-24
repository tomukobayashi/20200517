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
    public function index()
    {
       $items = DB::table('people')->get();
       return view('hello.index', ['items' => $items]);
    }

   public function post()
   {
       $items = DB::select('select * from people');
       return view('hello.index', ['items' => $items]);
   }


   // insert
   public function add()
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
    //  DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        DB::table('people')->insert($param);
       return redirect('/hello');
   }


   // update
   public function edit(Request $request)
{
//    $param = ['id' => $request->id];
//    $item = DB::select('select * from people where id = :id', $param);
    $item = DB::table('people')
        ->where('id', $request->id)->first();
//    return view('hello.edit', ['form' => $item[0]]);
    return view('hello.edit', ['form' => $item]);
}

public function update(Request $request)
{
   $param = [
        //  'id' => $request->id,
       'name' => $request->name,
       'mail' => $request->mail,
       'age' => $request->age,
   ];
    // DB::update('update people set name =:name, mail = :mail, age = :age where id = :id', $param);
    DB::table('people')
        ->where('id', $request->id)
        ->update($param);
   return redirect('/hello');
}

//delete
public function del(Request $request)
{
//    $param = ['id' => $request->id];
//    $item = DB::select('select * from people where id = :id', $param);
//    return view('hello.del', ['form' => $item[0]]);
    $item = DB::table('people')
        ->where('id', $request->id)->first();
    return view('hello.del', ['form' => $item]);
}

public function remove(Request $request)
{
//    $param = ['id' => $request->id];
//    DB::delete('delete from people where id = :id', $param);

    DB::table('people')
        ->where('id', $request->id)->delete();
   return redirect('/hello');
}

//show
public function show(Request $request)
{
    $page = $request->page;
   $items = DB::table('people')
       ->offset($page * 3)
       ->limit(3)
       ->get();
   return view('hello.show', ['items' => $items]);
}

}
