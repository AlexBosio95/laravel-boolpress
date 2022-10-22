<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lead;
use App\Mail\NewContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request) {

        
        $info = $request->all();
        $validator = Validator::make($info, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        
        $newContact = New Lead();
        $newContact->fill($info);
        $newContact->save();

        Mail::to('pippo@gmail.com')->send(new NewContact($newContact));

        return response()->json([
            'success' => true,
        ]);
    }
}
