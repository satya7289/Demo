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
        try{
            $dublicate = Detail::where('name', $detail->name)
                                ->orwhere('email',$detail->email)
                                ->orwhere('pinCode',$detail->pinCode)
                                ->firstOrFail();
            return redirect('/')->with('flash_message', 'Detail already exits.');
        }
        catch (ModelNotFoundException $e) {
            $detail->save();
            return redirect('/')->with('flash_message', 'Detail Added Successfully');
        }

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
