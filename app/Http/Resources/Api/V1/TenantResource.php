<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Tenant */
class TenantResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'name' => $this->name,
            'slug' => $this->slug,
            'email' => $this->email,
            'phone' => $this->phone,
            'timezone' => $this->timezone,
            'currency' => $this->currency,
            'is_active' => $this->is_active,
            'settings' => $this->settings,
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
