<?php

namespace Homeful\Properties\Traits;

use Homeful\Property\Enums\MarketSegment;
use Homeful\Property\Enums\HousingType;
use Homeful\Properties\Models\Project;
use Illuminate\Support\Carbon;
use ReflectionEnum;

trait HasAdditionalProjectAttributes
{
    const ADDRESS = 'address';
    const TYPE = 'type';
    const HOUSING_TYPE = 'housing_type';
    const LICENSE_NUMBER = 'license_number';
    const LICENSE_DATE = 'license_date';

    const COMPANY_CODE = 'company_code';
    const APPRAISED_LOT_VALUE = 'appraised_lot_value';

    public function setAddressAttribute(?string $value): self
    {
        $this->getAttribute('meta')->set(Project::ADDRESS, $value);

        return $this;
    }

    public function getAddressAttribute(): ?string
    {
        return $this->getAttribute('meta')->get(Project::ADDRESS);
    }

    public function setTypeAttribute(MarketSegment $value): self
    {
        $this->getAttribute('meta')->set(Project::TYPE,  $value->name);

        return $this;
    }

    public function getTypeAttribute(): MarketSegment
    {
        $reflection = new ReflectionEnum(MarketSegment::class);
        $name = $this->getAttribute('meta')->get(Project::TYPE);

        return $name ? $reflection->getCase($name)->getValue() : MarketSegment::default();
//        return MarketSegment::{$name}; //PHP 8.3
    }

    public function setHousingTypeAttribute(HousingType $value): self
    {
        $this->getAttribute('meta')->set(Project::HOUSING_TYPE,  $value->name);

        return $this;
    }

    public function getHousingTypeAttribute(): HousingType
    {
        $reflection = new ReflectionEnum(HousingType::class);
        $name = $this->getAttribute('meta')->get(Project::HOUSING_TYPE);

        return $name ? $reflection->getCase($name)->getValue() : HousingType::SINGLE_DETACHED;
//        return MarketSegment::{$name}; //PHP 8.3
    }

    public function setLicenseNumberAttribute(?string $value): self
    {
        $this->getAttribute('meta')->set(Project::LICENSE_NUMBER, $value);

        return $this;
    }

    public function getLicenseNumberAttribute(): ?string
    {
        return $this->getAttribute('meta')->get(Project::LICENSE_NUMBER);
    }

    public function setLicenseDateAttribute(?Carbon $value): self
    {
        $this->getAttribute('meta')->set(Project::LICENSE_DATE, $value?->serialize());

        return $this;
    }

    public function getLicenseDateAttribute(): ?Carbon
    {
        $serialized = $this->getAttribute('meta')->get(Project::LICENSE_DATE);

        return $serialized ? Carbon::fromSerialized($serialized): null;
    }

    public function setCompanyCodeAttribute(string $value): self
    {
        $this->getAttribute('meta')->set(Project::COMPANY_CODE, $value);

        return $this;
    }

    public function getCompanyCodeAttribute(): string
    {
        return $this->getAttribute('meta')->get(Project::COMPANY_CODE);
    }

    public function setAppraisedLotValueAttribute(float $value): self
    {
        $this->getAttribute('meta')->set(Project::APPRAISED_LOT_VALUE, $value);

        return $this;
    }

    public function getAppraisedLotValueAttribute(): float
    {
        return $this->getAttribute('meta')->get(Project::APPRAISED_LOT_VALUE);
    }
}
