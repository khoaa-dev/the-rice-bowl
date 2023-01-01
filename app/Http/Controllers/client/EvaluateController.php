<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Eveluate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class EvaluateController extends Controller
{
    public function send_comment(Request $request){
        $userId = FacadesSession::get('idUser', 1);
        $content = $request->comment_content;
        $numberStar = $request->numberStar;

        $eveluate = new Eveluate();
        $eveluate->userId = $userId;
        $eveluate->content = $content;
        $eveluate->numberStar = $numberStar;
        $eveluate->save();

        return redirect('home');
    }

}