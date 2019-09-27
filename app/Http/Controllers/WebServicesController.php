<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Http\Resources\DetailResources;
use App\Http\Resources\DetailResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Contracts\Routing\ResponseFactory;



class WebServicesController extends Controller
{
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
            'name'  =>'required',
            'email' =>'required',
            'pinCode'=>'required',
        ]);
        // dd($request);
        $detail = Detail::create($request->all());
        return new DetailResources($detail);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail) : DetailResources
    {
        $detail->delete();
        return response()->json();
    }
}
