<?php

namespace Homeful\Properties\Models;

use Homeful\Properties\Traits\HasAdditionalProjectAttributes;
use Homeful\Common\Traits\HasPackageFactory as HasFactory;
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
    ];
}
