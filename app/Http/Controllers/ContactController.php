<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailClass;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function contact_form()
    {
        return view('contact_form');
    }

    public function contact_form_send(Request $request)
    {

        $data = array(
            'username'=>$request->username,
            'phone'=>$request->phone
        );

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'phone' => 'required',
        ]);



        if ($validator->passes()) {

            Mail::to('karpenkoegor329@gmail.com')->send(new MailClass($data));

            return response()->json(['success'=>'<div class="alert alert-success" role="alert">
  Спасибо! Ваше сообщение отправленно!</div>']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

}
