<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{
    public function contact()
    {
        $maildata=[
            'title'=>'hcbshbcb',
            'body'=>'vehbgfeb'
        ];
        Mail::to('lotlikarabhinav@gmail.com')->send(new ContactMail($maildata));

    }
}
