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
        $to_name = 'YO';
        $to_email = 'leandro.m.docarmo@gmail.com';
        $data = [
            "nombre" => $request->input('nombre'),
            "celular" => $request->input('celular'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
            "to_email" => 'leandro.m.docarmo@gmail.com'
        ];
        try {
            Mail::send('emails.consulta', compact('data'), function($message) use ($data){
                $message->from($data['to_email']);
                $message->to($data['to_email']);
                $message->subject('Consulta por MATEUY');
              });

            // Mail::send(
            //     'emails.consulta',
            //     $data,
            //     function ($message) use ($to_name, $to_email) {
            //         $message->to($to_email, $to_name)->subject('Consulta por MATEUY');
            //         $message->from('SENDER_EMAIL_ADDRESS', 'Test Mail');
            //     }
            // );
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
