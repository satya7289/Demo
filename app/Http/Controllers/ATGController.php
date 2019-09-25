<?php

namespace App\Http\Controllers;

use App\Detail;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class ATGController extends Controller
{
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
            'name'=>'required|max:30',
            'email'=>'required|email',
            'pincode'=>'required|size:6',
        ]);
        $detail = new Detail();
        $detail->name = request('name');
        $detail->email = request('email');
        $detail->pinCode = request('pincode');
        $message = '';
        if(Detail::where('name', $detail->name)->first())
            $message = 'Name Aready exits.';
        elseif (Detail::where('email', $detail->email)->first())
            $message = 'Email Already exits.';
        elseif (Detail::where('pinCode', $detail->pinCode)->first())
            $message = 'Pincode Aready exits.';
        else{
            $detail->save();
            $message = 'Detail Added Successfully';
        }
        return redirect('/')->with('flash_message', $message);

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
