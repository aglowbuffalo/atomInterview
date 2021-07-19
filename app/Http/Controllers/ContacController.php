<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use App\Models\Inquiries;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\InquiriesPostRequest;

class ContacController extends Controller
{
    public function index(Request $request)
    {

        return view('contact.index');
    }

    public function submit(InquiriesPostRequest $request){

        $inquiries = $this->store($request);

        $this->sendMail($inquiries);

        if($request->ajax()){
            return response()->json(['success'=>'Contact form submitted successfully']);
        }else{
            return view('home.index');
        }

    }

    public function store($request){
        $inquiries = Inquiries::create($request->all());

        return $inquiries;
    }

   public function sendMail(Inquiries $inquirie){

        $data = new ContactUs ($inquirie);
        Mail::to('mail@example.com')->send($data);
   }

}
