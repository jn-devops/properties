<?php

namespace Homeful\Properties\Data;

use Homeful\Properties\Models\Property;
use Homeful\Products\Data\ProductData;
use Spatie\LaravelData\Data;

class PropertyData extends Data
{
    public function __construct(
        public string $code,
        public string $sku,
        public ProductData $product,
    ) {}

    public static function fromModel(Property $property): PropertyData
    {
        return new self(
            code: $property->code,
            sku: $property->sku,
            product: ProductData::fromModel($property->product)
        );
    }
}
