<?php

namespace Homeful\Properties\Models;

use Homeful\Common\Traits\HasPackageFactory as HasFactory;
use Homeful\Products\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Product
 *
 * @property int $id
 * @property string $code
 * @property string $sku
 * @property Product $product
 *
 * @method int getKey()
 */
class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'sku',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'sku', 'sku', 'products');
    }
}
