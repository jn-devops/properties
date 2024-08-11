<?php

namespace Homeful\Properties\Models;

use Homeful\Common\Traits\HasPackageFactory as HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property int $id
 * @property string $code
 *
 * @method int getKey()
 */
class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
    ];
}
