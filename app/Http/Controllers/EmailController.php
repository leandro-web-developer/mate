<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ConsultaDominio;
use Exception;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function store(Request $request)
    {
        try {
            $modelo = new ConsultaDominio($request);
            $email = Mail::to('leandro.m.docarmo@gmail.com')->send($modelo);
            if ($email) {
                return 'Email enviado';
            } else {
                return response()->json([$email, $modelo]);
            }
        } catch (Exception $ec) {
            return response()->json($ec);
        }
    }
}
