<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;

class GoogleV3CaptchaController extends Controller
{
    public function index()
    {
        return view('google-v3-recaptcha');
    }

    public function validateGCaptch(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required|recaptchav3:contact_us,0.5'
 
        ]);
        
 
        $save = new ContactUs;
 
        $save->name = $request->name;
        $save->email = $request->email;
        $save->subject = $request->subject;
        $save->message = $request->message;
 
        $save->save();
 
        return redirect('google-v3-recaptcha')->with('status', 'Google V3 Recaptcha has been validated form');
 
    }
}
