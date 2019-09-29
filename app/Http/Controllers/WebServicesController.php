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
        return new DetailResourceCollection(Detail::paginate());    // Using DetailResourcesCollection
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
        ]);      // using Validate methods name(),email(),pincode().

        $name = request('name');
        $email = request('email');
        $pincode = request('pincode');
        $detail = $this->checkDataSave($name,$email,$pincode);  // Using Validate Method checkAndSave($name,$email,$pincode);
        $status = $detail[3];
        if($status==4)      
            return new DetailResources($detail[0]);     // If status=4 means no Dublicate data enters.
        else {
            return ['status'=>0,'message'=>$detail[1]];     // otherwise some Dublicate Data enters.
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
        return new DetailResources($detail);        // Using DetailResourcesCollection
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
        $detail->update($request->all());        // Using DetailResourcesCollection
        return new DetailResources($detail);
    }


    public function destroy(Detail $detail)
    {
        $detail->delete();
        return ['status'=>1,'message'=>'Succesfully Deleted.'];     // Returning Successfully Deleted.  
    }
}
