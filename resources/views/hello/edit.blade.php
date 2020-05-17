@extends('layouts.helloapp')

@section('title', 'Edit')

@section('menubar')
   @parent
   更新ページ
@endsection

@section('content')
   <form action="/hello/edit" method="post">
   <table>
      @csrf
      <input type="hidden" name="id" value="{{$form->id}}">
      @error('name')
         <tr><th>ERROR:</th><td>{{$message}}</td><tr>
      @enderror
      <tr><th>name: </th><td><input type="text" name="name" 
         value="{{$form->name}}"></td></tr>
      @error('mail')
         <tr><th>ERROR:</th><td>{{$message}}</td><tr>
      @enderror
      <tr><th>mail: </th><td><input type="text" name="mail" 
         value="{{$form->mail}}"></td></tr>
      @error('age')
      <tr><th>ERROR:</th><td>{{$message}}</td><tr>
      @enderror
      <tr><th>age: </th><td><input type="text" name="age" 
         value="{{$form->age}}"></td></tr>
      <tr><th></th><td><input type="submit" 
         value="更新"></td></tr>
   </table>
   </form>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection