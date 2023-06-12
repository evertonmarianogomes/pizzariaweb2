<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\About;

class AboutController extends Controller
{
    public function selectAboutByID(Request $request) {
        $id = $request->id;
        $about = About::find($id);

        if ($about) {
            echo json_encode($about);
        } else {
            echo json_encode(["message" => "Ocorreu um erro ao executar a query"]);
        }
    }


    public function update(Request $request) 
    {
        $id = $request->id;
        $about = About::find($id);

        if ($about) {
            $about->name = filter_var($request->name, FILTER_SANITIZE_SPECIAL_CHARS);
            $about->description = filter_var($request->description, FILTER_SANITIZE_SPECIAL_CHARS);
            if ($about->save()) {
                echo json_encode(["message" => "Atualizado com sucesso", "reload" => true]);
            } else {
                echo json_encode(["message" => "Atualizado com sucesso, dado não alterado", "reload" => true]);
            }
            
        } else {
            echo json_encode(["message" => "Ocorreu um erro ao executar a query"]);
        }
    }

}
