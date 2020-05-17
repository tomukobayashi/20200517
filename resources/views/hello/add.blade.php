@extends('layouts.helloapp')

@section('title', 'Add')

@section('menubar')
   @parent
   新規作成ページ
@endsection

@section('content')
   <form action="/hello/add" method="post">
   <table>
      @csrf
      @error('name')
         <tr><th>ERROR:</th><td>{{$message}}</td><tr>
      @enderror
      <tr><th>name: </th><td><input type="text" name="name"></td></tr>
      @error('mail')
         <tr><th>ERROR:</th><td>{{$message}}</td><tr>
      @enderror
      <tr><th>mail: </th><td><input type="text" name="mail"></td></tr>
      @error('age')
         <tr><th>ERROR:</th><td>{{$message}}</td><tr>
      @enderror
      <tr><th>age: </th><td><input type="text" name="age"></td></tr>
      <tr><th></th><td><input type="submit" value="追加"></td></tr>
   </table>
   </form>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection