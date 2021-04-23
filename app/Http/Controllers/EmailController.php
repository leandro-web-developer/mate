<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ConsultaDominio;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function store(Request $request)
    {
        return (Mail::to('leandro.m.docarmo@gmail.com')->send(new ConsultaDominio($request))) ? 'Email enviado' : 'No se pudo mandar el email';
    }
}
