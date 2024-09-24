<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'connection' => $this->id,
            'threadsCount' => $this->threads_count,
            'resolution' => $this->thread_resolution,
            'framerate' => $this->thread_framerate,
            'highlightActiveTread' => $this->highlight_active_tread,
            'highlightMousePointerArea' => $this->highlight_mouse_pointer_area
        ];
    }
}
