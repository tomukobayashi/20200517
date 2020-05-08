@extends('layouts.helloapp')
<style>
   .pagination { font-size:10pt; }
   .pagination li { display:inline-block }
   tr th a:link { color: white; }
   tr th a:visited { color: white; }
   tr th a:hover { color: white; }
   tr th a:active { color: white; }
</style>
@section('title', 'Index')

@section('menubar')
   @parent
   インデックスページ
@endsection

@section('content')

    @if (Auth::check())
        <p>USER: {{$user->name . ' (' . $user->email . ')'}}</p>
        <p><a href="/login">ログアウト</a></p>
    @else
        <p>※ログインしていません。（<a href="/login">ログイン</a>｜
        <a href="/register">登録</a>）</p>
    @endif
    <a href="http://localhost:8000/hello/add">表にデータを追加</a>
   <table>
   <tr>
       <th><a href="/hello?sort=name">name</a></th>
       <th><a href="/hello?sort=mail">mail</a></th>
       <th><a href="/hello?sort=age">age</a></th>
   </tr>
   @foreach ($items as $item)
       <tr>
           <td>{{$item->name}}<br>
           <a href="hello/edit?id=<?php echo $item->id; ?>">更新</a>/
           <a href="hello/del?id=<?php echo $item->id; ?>">削除</a></td>
           <td>{{$item->mail}}</td>
           <td>{{$item->age}}</td>
       </tr>
   @endforeach
   </table>
   {{ $items->appends(['sort' => $sort])->links() }}
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection