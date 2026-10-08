<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;
use App\Models\Kategoria;
use Illuminate\Support\Facades\Validator;

class AutoController extends Controller
{
    public function index(){
        $autok = Auto::with('kategoria')->get();
        return response()->json($autok);
    }

    public function store(Request $req){
        $validator = Validator::make(
            $req->all(),
            [
                "napi_ar" => "required|integer|min:0",
                "tipus" => "required"
            ],
            [
                "napi_ar.required" => "A napi ár megadása kötelező",
                "napi_ar.integer" => "A napi árnak egész számnak kell lennie",
                "napi_ar.min" => "A napi ár minimum 0.",
                "tipus.required" => "A típus megadása kötelező"
            ]
        );

        if($validator->fails()){
            return response()->json(['hiba'=>$validator->errors()],400);
        }

        $auto = Auto::create([
            "kategoria_id" => $req->kategoria_id,
            "tipus" => $req->tipus,
            "rendszam" => $req->rendszam,
            "napi_ar" => $req->napi_ar,
            "elerheto" => (bool)$req->elerheto
        ]);
        return response()->json([
            "uzenet" => "Az autó sikeresen létrejött",
            "auto" => $auto
        ],201);


    }   

    public function destroy($auto_id){
        $auto = Auto::find($auto_id);
        if(!$auto){
            return response()->json(["uzenet"=>"Nincs ilyen autó"],404);
        }
        $auto->delete();
        return response()->json(["uzenet" => "Az autó sikeresen törölve"],204);
    }

    public function show($kategoria_id){
        $kategoria = Kategoria::find($kategoria_id);
        if(!$kategoria){
            return response()->json(['hiba' => "Kategória nem található"],404);
        }
        return response()->json($kategoria->autok);
    }
}
