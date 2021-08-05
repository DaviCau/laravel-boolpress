<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Lead;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;

class LeedController extends Controller
{
    public function store(Request $request) {

        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:60',
            'email' => 'required|max:60',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        $lead = new Lead();
        $lead->fill($data);
        $lead->save();

        Mail::to('admin@sito.it')->send(new ContactMessage($lead));

        return response()->json($data);
    }
}
