<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KindstartupResource extends JsonResource
{
    public function toArray($request) : array
    {
        $Kindstartup = $this->resource;
        return [
            'id' => $Kindstartup->getId(),
            'name' => $Kindstartup->getName()
        ];
    }
}