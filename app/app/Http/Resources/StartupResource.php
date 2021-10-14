<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StartupResource extends JsonResource
{
    public function toArray($request) : array
    {
        $startup = $this->resource;
        return [
            'id' => $startup->getId(),
            'name' => $startup->getName(),
            'img' => $startup->getImg(),
            'kindstartupId' => $startup->getKindstartupId(),
            'userId' => $startup->getUserId(),
        ];
    }
}