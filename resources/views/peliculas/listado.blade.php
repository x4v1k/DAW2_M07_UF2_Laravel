<h1>{{$titulo}}</h1>

@if(empty($pelis))
    <FONT COLOR="red">No se ha encontrado ninguna película</FONT>
@else
    <div align="center">
    <table>
        <tr>
            @foreach($pelis as $peli)
                @foreach(array_keys($peli) as $clave)
                    <th>{{$clave}}</th>
                @endforeach
                @break
            @endforeach
        </tr>

        @foreach($pelis as $peli)
            <tr>
                <td>{{$peli['name']}}</td>
                <td>{{$peli['year']}}</td>
                <td>{{$peli['genre']}}</td>
                <td><img src={{$peli['img_url']}} style="width: 100px; heigth: 120px;" /></td>
            </tr>
        @endforeach
    </table>
</div>
@endif