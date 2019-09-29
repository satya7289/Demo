<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Traits\Validate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mail;
use App\Mail\DetailMail;


class ATGController extends Controller
{
    use Validate;           // Add Validate Trait.
    public function index()
    {
        return view('welcome');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $this->validate($request, [
           'name'=>$this->name(), 
            'email'=> $this->email(),
            'pincode'=>$this->pincode(),
        ]);         // using Validate methods name(),email(),pincode().

        $name = request('name');
        $email = request('email');
        $pincode = request('pincode');
        $messages = $this->checkDataSave($name,$email,$pincode); // Using Validate Method checkAndSave($name,$email,$pincode);
                                                                
        return redirect('/')->with([
                                    'flash_message'=> $messages[1], 
                                    'mail_message' => $messages[2],
                                    ]);
                                    // Redirecting to Home Page with flashing messages.

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
