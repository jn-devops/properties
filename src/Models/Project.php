<?php

namespace Homeful\Properties\Models;

use Carbon\Carbon;
use Homeful\Properties\Traits\HasAdditionalProjectAttributes;
use Homeful\Common\Traits\HasPackageFactory as HasFactory;
use Homeful\Property\Enums\{HousingType, MarketSegment};
use Illuminate\Database\Eloquent\Model;
use Homeful\Common\Traits\HasMeta;

/**
 * Class Project
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $location
 * @property string $address
 * @property MarketSegment $type
 * @property HousingType $housingType
 * @property string $licenseNumber
 * @property Carbon $licenseDate
 * @property string $company_code
 * @property float $appraised_lot_value
 * @property int $total_sold
 *
 * @method int getKey()
 */
class Project extends Model
{
    use HasAdditionalProjectAttributes;
    use HasFactory;
    use HasMeta;

    protected $fillable = [
        'code',
        'name',
        'location',
        'address',
        'company_code',
        'appraised_lot_value',
        'total_sold',
        'project_description',
    ];

    public function getConnectionName()
    {
        $connection = config('properties.models.project.connection');

        return !empty($connection)
            ? $connection
            : parent::getConnectionName();
    }

    public function getTable()
    {
        $table = config('properties.models.project.table');

        return !empty($table)
            ? $table
            : parent::getTable();
    }
}
