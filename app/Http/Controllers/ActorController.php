<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActorController extends Controller
{

    /**
     * Read films from storage
     */
    public static function readActors(): array {
        $actors = DB::table('actors')->select('name','surname','birthdate','country','img_url')->get();
        return json_decode(json_encode($actors),true);
    }
    public function listActors()
    {
        $title = "Listado de todos los actores";
        $actors = ActorController::readActors();

        return view("actors.list", ["actors" => $actors, "title" => $title]);
    }

    public function listActorsByDecade(Request $request)
    {
        $decade = $request->input('decade');
        $title = "Listado de actores segun la decada";
        // Calcula el rango de años para la década proporcionada
        $startYear = $decade;
        $endYear = $decade + 9;

    
        // Realiza la consulta utilizando QueryBuilder
        $actors = DB::table('actors')
                    ->select('name','surname','birthdate','country','img_url')
                    ->whereYear('birthdate', '>=', $startYear)
                    ->whereYear('birthdate', '<=', $endYear)
                    ->get();
    
        // Retorna los actores encontrados
        return view("actors.list", ["actors" => json_decode(json_encode($actors),true), "title" => $title]);

    }
public function countActors()
{
    $title = "Numero de actores";
    $actors = DB::table('actors')->count();

    return view("actors.count", ["actors" => $actors, "title" => $title]);
}

public function deleteActor($id)
{
   
    $delete = DB::table('actors')->where('id',$id)->delete();
    
    if($delete){
    return response()->json(["action" => $delete, "status" => "true"]);
    }else{
    return response()->json(["action" => $delete, "status" => "false"]);
    }
    
}


}
