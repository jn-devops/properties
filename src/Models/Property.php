<?php

namespace Homeful\Properties\Models;

use Homeful\Common\Traits\HasPackageFactory as HasFactory;
use Homeful\Properties\Traits\HasAdditionalAttributes;
use Spatie\SchemalessAttributes\SchemalessAttributes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Homeful\Products\Models\Product;
use Homeful\Common\Traits\HasMeta;

/**
 * Class Product
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $type
 * @property int $cluster
 * @property string $phase
 * @property string $block
 * @property string $lot
 * @property string $building
 * @property float $floor_area,
 * @property float $lot_area,
 * @property string $unit_type
 * @property string $unit_type_interior
 * @property string $house_color
 * @property string $roof_style
 * @property bool $end_unit
 * @property bool $veranda
 * @property bool $balcony
 * @property bool $firewall
 * @property bool $eaves
 * @property int $bedrooms
 * @property int $toilets_and_bathrooms
 * @property int $parking_slots
 * @property int $carports
 * @property string $project_code
 * @property string $project_location
 * @property string $project_address
 * @property string $sku
 * @property Product $product
 *
 * @method int getKey()
 */
class Property extends Model
{
    use HasAdditionalAttributes;
    use HasFactory;
    use HasMeta;

    protected $fillable = [
        'code',
        'name',
        'type',
        'cluster',
        'sku',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'sku', 'sku', 'products');
    }
}
