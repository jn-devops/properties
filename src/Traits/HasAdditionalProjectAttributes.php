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
    const TOTAL_SOLD = 'total_sold';
    const PROJECT_DESCRIPTION = 'project_description';
    const FILING_SITE = 'filing_site';

    public function setAddressAttribute(?string $value): self
    {
        $this->getAttribute('meta')->set(Project::ADDRESS, $value);

        return $this;
    }

    public function getAddressAttribute(): ?string
    {
        return $this->getAttribute('meta')->get(Project::ADDRESS);
    }

    public function setTypeAttribute(MarketSegment|string $value): self
    {
        $reflection = new ReflectionEnum(MarketSegment::class);

        $this->getAttribute('meta')->set(Project::TYPE,  $value instanceof MarketSegment
            ? $value->name
            : $reflection->getCase($value)
        );

        return $this;
    }

    public function getTypeAttribute(): MarketSegment
    {
        $reflection = new ReflectionEnum(MarketSegment::class);
        $name = $this->getAttribute('meta')->get(Project::TYPE);

        return $name ? $reflection->getCase($name)->getValue() : MarketSegment::default();
//        return MarketSegment::{$name}; //PHP 8.3
    }

    public function setHousingTypeAttribute(HousingType|string|null $value): self
    {
        $reflection = new ReflectionEnum(HousingType::class);

        $this->getAttribute('meta')->set(Project::HOUSING_TYPE,  $value instanceof HousingType
            ? $value->name
            : $reflection->getCase($value));

        return $this;
    }

    public function getHousingTypeAttribute(): ?HousingType
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

    public function setCompanyCodeAttribute(?string $value): self
    {
        $this->getAttribute('meta')->set(Project::COMPANY_CODE, $value);

        return $this;
    }

    public function getCompanyCodeAttribute(): ?string
    {
        return $this->getAttribute('meta')->get(Project::COMPANY_CODE);
    }

    public function setAppraisedLotValueAttribute(?float $value): self
    {
        $this->getAttribute('meta')->set(Project::APPRAISED_LOT_VALUE, $value);

        return $this;
    }

    public function getAppraisedLotValueAttribute(): ?float
    {
        return $this->getAttribute('meta')->get(Project::APPRAISED_LOT_VALUE);
    }

    public function setTotalSoldAttribute(?int $value): self
    {
        $this->getAttribute('meta')->set(Project::TOTAL_SOLD, $value);

        return $this;
    }

    public function getTotalSoldAttribute(): ?int
    {
        return $this->getAttribute('meta')->get(Project::TOTAL_SOLD);
    }

    public function setProjectDescriptionAttribute(?string $value): self
    {
        $this->getAttribute('meta')->set(Project::PROJECT_DESCRIPTION, $value);

        return $this;
    }

    public function getProjectDescriptionAttribute(): ?string
    {
        return $this->getAttribute('meta')->get(Project::PROJECT_DESCRIPTION);
    }

    public function setFilingSiteAttribute(?string $value): self
    {
        $this->getAttribute('meta')->set(Project::FILING_SITE, $value);

        return $this;
    }
    public function getFilingSiteAttribute(): ?string
    {
        return $this->getAttribute('meta')->get(Project::FILING_SITE);
    }
}
