<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CampaignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'name'=>$this->name,
            'from'=>$this->from,
            'to'=>$this->to,
            'total'=>$this->total,
            'daily_budget'=>$this->daily_budget,
            'campaign_images'=> ImageResource::collection($this->getMedia('campaign_images'))?? null,
        ];
    }
}
