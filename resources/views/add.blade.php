@extends('layouts.default')
<style>
  th {
    background-color: #289ADC;
    color: white;
    padding: 5px 40px;
  }
  tr:nth-child(odd) td{
    background-color: #FFFFFF;
  }
  td {
    padding: 25px 40px;
    background-color: #EEEEEE;
    text-align: center;
  }
  button {
    padding: 10px 20px;
    background-color: #289ADC;
    border: none;
    color: white;
  }
</style>
@section('title', 'add.blade.php')

@section('content')
@if (count($errors) > 0)
<p>入力に問題があります</p>
<ul>
  @foreach($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif
<form action="/add" method="post">
  <table>
  @csrf
    <tr>
      @if($errors->has('name'))
      <th style="background-color:red">name</th>
      <td style="background-color:red"><input type="text" name="name"></td>
      @else
      <th>name</th>
      <td><input type="text" name="name"></td>
      @endif
    </tr>
    <tr>
      @if($errors->has('age'))
      <th style="background-color:red">age</th>
      <td style="background-color:red"><input type="text" name="age"></td>
      @else
      <th>age</th>
      <td><input type="text" name="age"></td>
      @endif
    </tr>
    <tr>
      @if($errors->has('nationality'))
      <th style="background-color:red">nationality</th>
      <td style="background-color:red"><input type="text" name="nationality"></td>
      @else
      <th>nationality</th>
      <td><input type="text" name="nationality"></td>
      @endif
    </tr>
    <tr>
      <th></th>
      <td><button>送信</button></td>
    </tr>
  </table>
</form>
@endsection