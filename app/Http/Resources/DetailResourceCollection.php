<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DetailResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'data'=>$this->collection,
            // 'email'=>$this->email,
            // 'pinCode'=>$this->pinCode,
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
