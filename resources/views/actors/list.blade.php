<!-- resources/views/nombre_de_tu_vista.blade.php -->

@extends('layouts.master')

@section('title', $title)

@section('content')

    <h1>{{$title}}</h1>

    @if(empty($actors))
        <font color="red">No se ha encontrado ningun actor</font>
    @else
        <div align="center">
            <table border="1">
                <tr>
                    @foreach($actors as $actor)
                        @foreach(array_keys($actor) as $key)
                            <th>{{$key}}</th>
                        @endforeach
                        @break
                    @endforeach
                </tr>

                @foreach($actors as $actor)
                    <tr>
                        <td>{{$actor['name']}}</td>
                        <td>{{$actor['surname']}}</td>
                        <td>{{$actor['birthdate']}}</td>
                        <td>{{$actor['country']}}</td>
                        <td><img src={{$actor['img_url']}} style="width: 100px; height: 120px;" /></td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif

@endsection
