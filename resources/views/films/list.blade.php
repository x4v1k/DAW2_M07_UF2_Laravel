<!-- resources/views/nombre_de_tu_vista.blade.php -->

@extends('layouts.master')

@section('title', $title)

@section('content')

    <h1>{{$title}}</h1>

    @if(empty($films))
        <font color="red">No se ha encontrado ninguna película</font>
    @else
        <div align="center">
            <table border="1">
                <tr>
                    @foreach($films as $film)
                        @foreach(array_keys($film) as $key)
                            <th>{{$key}}</th>
                        @endforeach
                        @break
                    @endforeach
                </tr>

                @foreach($films as $film)
                    <tr>
                        <td>{{$film['name']}}</td>
                        <td>{{$film['year']}}</td>
                        <td>{{$film['genre']}}</td>
                        <td>{{$film['country']}}</td>
                        <td>{{$film['duration']}}</td>
                        <td><img src={{$film['img_url']}} style="width: 100px; height: 120px;" /></td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif

@endsection
