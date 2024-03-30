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
@section('title', 'edit.blade.php')

@section('content')

@if(count($errors) > 0)
<ul>
  @foreach($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif

<!-- 
↓確認用
<pre>
  @php
  print_r($errors);
  print_r($errors->all());
  @endphp
</pre>

@error('name')
<p>{{$message}}</p>
@enderror
 -->

<form action="/edit" method="POST">
  <table>
    @csrf
    <tr>
      <th>id</th>
      <td>
        {{$form->id}}
        <input type="hidden" name="id" value="{{$form->id}}">
      </td>
    </tr>
    <tr>
      @unless($errors->has('name'))
      <th>name</th>
      <td>
        <input type="text" name="name" value="{{$form->name}}">
      </td>
      @else
      <th style="background-color:red">name</th>
      <td style="background-color:red">
        <input type="text" name="name" value="{{$form->name}}">
      </td>
      @endif
    </tr>
    <tr>
      @unless($errors->has('age'))
      <th>age</th>
      <td>
        <input type="text" name="age" value="{{$form->age}}">
      </td>
      @else
      <th style="background-color:red">age</th>
      <td style="background-color:red">
        <input type="text" name="age" value="{{$form->age}}">
      </td>
      @endif
    </tr>
    <tr>
      @unless($errors->has('nationality'))
      <th>nationality</th>
      <td>
        <input type="text" name="nationality" value="{{$form->nationality}}">
      </td>
      @else
      <th style="background-color:red">nationality</th>
      <td style="background-color:red">
        <input type="text" name="nationality" value="{{$form->nationality}}">
      </td>
      @endif
    </tr>
    <tr>
      <th></th>
      <td>
        <button>送信</button>
      </td>
    </tr>
  </table>
</form>
@endsection