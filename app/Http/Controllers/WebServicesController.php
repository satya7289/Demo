<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Http\Resources\DetailResources;
use App\Http\Resources\DetailResourceCollection;
use App\Traits\Validate;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Mail;
use App\Mail\DetailMail;
use Illuminate\Support\Facades\Log;

class WebServicesController extends Controller
{
    use Validate;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): DetailResourceCollection
    {
        return new DetailResourceCollection(Detail::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>$this->name(),
            'email'=> $this->email(),
            'pincode'=>$this->pincode()
        ]);
            // dd($request->all());
        $name = request('name');
        $email = request('email');
        $pincode = request('pincode');
        $detail = $this->checkDataSave($name,$email,$pincode);
        $status = $detail[3];
        if($status==4)
            return new DetailResources($detail[0]);
        else {
            return ['status'=>0,'message'=>$detail[1]];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail): DetailResources
    {
        return new DetailResources($detail);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Detail $detail, Request $request): DetailResources
    {
        // dd($request->all(),"ssss");
        $detail->update($request->all());
        return new DetailResources($detail);
    }


    public function destroy(Detail $detail)
    {
        $detail->delete();
        return response()->json();
    }
}
