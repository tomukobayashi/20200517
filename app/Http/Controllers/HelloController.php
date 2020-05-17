<?php

//コントローラークラスを作成する基本設定
//コントローラーの場所を指定
namespace App\Http\Controllers;

//下記の場所にあるRequestファイルを使える状態にしている
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests\Hellorequest;
use Validator;

use Illuminate\Support\Facades\DB;

use App\Person;
use Illuminate\Support\Facades\Auth;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        // $items = DB::table('people')->simplePaginate(5);
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
        // return view('hello.index', ['items' => $items]);
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
        DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
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

public function rest(Request $request)
{
   return view('hello.rest');
}

public function ses_get(Request $request)
{
   $sesdata = $request->session()->get('msg');
   return view('hello.session', ['session_data' => $sesdata]);
}

public function ses_put(Request $request)
{
   $msg = $request->input;
   $request->session()->put('msg', $msg);
   return redirect('hello/session');
}

public function getAuth(Request $request)
{
   $param = ['message' => 'ログインして下さい。'];
   return view('hello.auth', $param);
}

public function postAuth(Request $request)
{
   $email = $request->email;
   $password = $request->password;
   if (Auth::attempt(['email' => $email,
           'password' => $password])) {
       $msg = 'ログインしました。（' . Auth::user()->name . '）';
   } else {
       $msg = 'ログインに失敗しました。';
   }
   return view('hello.auth', ['message' => $msg]);
}

}
