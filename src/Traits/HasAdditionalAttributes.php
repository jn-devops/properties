<?php

namespace Homeful\Properties\Traits;

use Homeful\Properties\Models\Property;

trait HasAdditionalAttributes
{
    const PHASE_FIELD = 'phase';
    const BLOCK_FIELD = 'block';
    const LOT_FIELD = 'lot';
    const BUILDING_FIELD = 'building';
    const FLOOR_AREA_FIELD = 'floor_area';
    const LOT_AREA_FIELD = 'lot_area';
    const UNIT_TYPE_FIELD = 'unit_type';
    const UNIT_TYPE_INTERIOR_FIELD = 'unit_type_interior';
    const HOUSE_COLOR_FIELD = 'house_color';
    const ROOF_STYLE_FIELD = 'roof_style';
    const END_UNIT_FIELD = 'end_unit';
    const VERANDA_FIELD = 'veranda';
    const BALCONY_FIELD = 'balcony';
    const FIREWALL_FIELD = 'firewall';
    const EAVES_FIELD = 'eaves';
    const BEDROOMS_FIELD = 'bathrooms';
    const TOILETS_AND_BATHROOMS_FIELD = 'toilets_and_bathrooms';
    const PARKING_SLOTS_FIELD = 'parking_slots';
    const CARPORTS_FIELD = 'carports';
    const PROJECT_CODE = 'project_code';
    const PROJECT_LOCATION = 'project_location';
    const PROJECT_ADDRESS = 'project_address';

    public function initializeHasAdditionalAttributes(): void
    {
        $this->mergeFillable(['phase', 'block', 'lot', 'building', 'floor_area', 'lot_area']);
    }

    public function setPhaseAttribute(string $value): self
    {
        $this->getAttribute('meta')->set(Property::PHASE_FIELD, $value);

        return $this;
    }

    public function getPhaseAttribute(): ?string
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::PHASE_FIELD) ?? $default;
    }

    public function setBlockAttribute(string $value): self
    {
        $this->getAttribute('meta')->set(Property::BLOCK_FIELD, $value);

        return $this;
    }

    public function getBlockAttribute(): ?string
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::BLOCK_FIELD) ?? $default;
    }

    public function setLotAttribute(string $value): self
    {
        $this->getAttribute('meta')->set(Property::LOT_FIELD, $value);

        return $this;
    }

    public function getLotAttribute(): ?string
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::LOT_FIELD) ?? $default;
    }

    public function setBuildingAttribute(string $value): self
    {
        $this->getAttribute('meta')->set(Property::BUILDING_FIELD, $value);

        return $this;
    }

    public function getBuildingAttribute(): ?string
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::BUILDING_FIELD) ?? $default;
    }

    public function setFloorAreaAttribute(float $value): self
    {
        $this->getAttribute('meta')->set(Property::FLOOR_AREA_FIELD, $value);

        return $this;
    }

    public function getFloorAreaAttribute(): ?float
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::FLOOR_AREA_FIELD) ?? $default;
    }

    public function setLotAreaAttribute(float $value): self
    {
        $this->getAttribute('meta')->set(Property::LOT_AREA_FIELD, $value);

        return $this;
    }

    public function getLotAreaAttribute(): ?float
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::LOT_AREA_FIELD) ?? $default;
    }

    public function setUnitTypeAttribute(string $value): self
    {
        $this->getAttribute('meta')->set(Property::UNIT_TYPE_FIELD, $value);

        return $this;
    }

    public function getUnitTypeAttribute(): ?string
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::UNIT_TYPE_FIELD) ?? $default;
    }

    public function setUnitTypeInteriorAttribute(string $value): self
    {
        $this->getAttribute('meta')->set(Property::UNIT_TYPE_INTERIOR_FIELD, $value);

        return $this;
    }

    public function getUnitTypeInteriorAttribute(): ?string
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::UNIT_TYPE_INTERIOR_FIELD) ?? $default;
    }

    public function setHouseColorAttribute(string $value): self
    {
        $this->getAttribute('meta')->set(Property::HOUSE_COLOR_FIELD, $value);

        return $this;
    }

    public function getHouseColorAttribute(): ?string
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::HOUSE_COLOR_FIELD) ?? $default;
    }

    public function setRoofStyleAttribute(string $value): self
    {
        $this->getAttribute('meta')->set(Property::ROOF_STYLE_FIELD, $value);

        return $this;
    }

    public function getRoofStyleAttribute(): ?string
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::ROOF_STYLE_FIELD) ?? $default;
    }

    public function setEndUnitAttribute(bool $value): self
    {
        $this->getAttribute('meta')->set(Property::END_UNIT_FIELD, $value);

        return $this;
    }

    public function getEndUnitAttribute(): ?bool
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::END_UNIT_FIELD) ?? $default;
    }

    public function setVerandaAttribute(bool $value): self
    {
        $this->getAttribute('meta')->set(Property::VERANDA_FIELD, $value);

        return $this;
    }

    public function getVerandaAttribute(): ?bool
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::VERANDA_FIELD) ?? $default;
    }

    public function setBalconyAttribute(bool $value): self
    {
        $this->getAttribute('meta')->set(Property::BALCONY_FIELD, $value);

        return $this;
    }

    public function getBalconyAttribute(): ?bool
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::BALCONY_FIELD) ?? $default;
    }

    public function setFirewallAttribute(bool $value): self
    {
        $this->getAttribute('meta')->set(Property::FIREWALL_FIELD, $value);

        return $this;
    }

    public function getFirewallAttribute(): ?bool
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::FIREWALL_FIELD) ?? $default;
    }

    public function setEavesAttribute(bool $value): self
    {
        $this->getAttribute('meta')->set(Property::EAVES_FIELD, $value);

        return $this;
    }

    public function getEavesAttribute(): ?bool
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::EAVES_FIELD) ?? $default;
    }

    public function setBedroomsAttribute(int $value): self
    {
        $this->getAttribute('meta')->set(Property::BEDROOMS_FIELD, $value);

        return $this;
    }

    public function getBedroomsAttribute(): ?int
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::BEDROOMS_FIELD) ?? $default;
    }

    public function setToiletsAndBathroomsAttribute(int $value): self
    {
        $this->getAttribute('meta')->set(Property::TOILETS_AND_BATHROOMS_FIELD, $value);

        return $this;
    }

    public function getToiletsAndBathroomsAttribute(): ?int
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::TOILETS_AND_BATHROOMS_FIELD) ?? $default;
    }

    public function setParkingSlotsAttribute(int $value): self
    {
        $this->getAttribute('meta')->set(Property::PARKING_SLOTS_FIELD, $value);

        return $this;
    }

    public function getParkingSlotsAttribute(): ?int
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::PARKING_SLOTS_FIELD) ?? $default;
    }

    public function setCarportsAttribute(int $value): self
    {
        $this->getAttribute('meta')->set(Property::CARPORTS_FIELD, $value);

        return $this;
    }

    public function getCarportsAttribute(): ?int
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::CARPORTS_FIELD) ?? $default;
    }

    public function setProjectCodeAttribute(string $value): self
    {
        $this->getAttribute('meta')->set(Property::PROJECT_CODE, $value);

        return $this;
    }

    public function getProjectCodeAttribute(): ?string
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::PROJECT_CODE) ?? $default;
    }

    public function setProjectLocationAttribute(string $value): self
    {
        $this->getAttribute('meta')->set(Property::PROJECT_LOCATION, $value);

        return $this;
    }

    public function getProjectLocationAttribute(): ?string
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::PROJECT_LOCATION) ?? $default;
    }

    public function setProjectAddressAttribute(string $value): self
    {
        $this->getAttribute('meta')->set(Property::PROJECT_ADDRESS, $value);

        return $this;
    }

    public function getProjectAddressAttribute(): ?string
    {
        $default = null;

        return $this->getAttribute('meta')->get(Property::PROJECT_ADDRESS) ?? $default;
    }
}
