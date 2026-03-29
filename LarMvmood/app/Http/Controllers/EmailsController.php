<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailsController extends Controller
{
    public function WelcomeEmail()
    {
        Mail::to(.....)->send(new SendEmail()) ;
        return "Email sent";
    }
}
