<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'interface_id' => $this->id,
            'title' => $this->title,
            'created_at' => $this->created_at->format('d/m/Y'),
            'report_link' => $this->report_link,
        ];
    }
}
