<?php

namespace Homeful\Properties\Traits;

use Homeful\Properties\Models\Project;

trait HasAdditionalProjectAttributes
{
    const ADDRESS = 'address';

    public function setAddressAttribute(?string $value): self
    {
        if ($value === null) {
            return $this;
        }
        $this->getAttribute('meta')->set(Project::ADDRESS, $value);
        return $this;
    }

    public function getAddressAttribute(): ?string
    {
        return $this->getAttribute('meta')->get(Project::ADDRESS) ?? '';
    }
}
