@extends('layouts.default')

@section('title', 'verror.blade.php')

@section('content')
<p>入力内容にエラーがありました</p>
<ul>
  @foreach($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>

@endsection