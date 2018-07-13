<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Rule extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);

        // return [
        //     'id' => $this->id,
        // ];
    }


    public function with($request)
    {
        return[
            'version' => '1.max.max',
            'author' => 'Max',
        ];
    }


}
