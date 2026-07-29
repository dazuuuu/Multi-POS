<?php

namespace App\Backend\Models;

class BaseModel
{
    protected array $data = [];

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function all(): array
    {
        return $this->data;
    }
}
