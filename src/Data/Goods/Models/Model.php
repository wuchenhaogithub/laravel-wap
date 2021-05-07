<?php

namespace Wuchenhao\LaravelShop\Data\Goods\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;
use ShineYork\LaravelExtend\Database\Eloquent\SEvents;

class Model extends BaseModel
{
    use SEvents;
    public function __construct(array $attributes = [])
    {
        $this->setConnection(config('data.goods.database.connection.name'));
        parent::__construct($attributes);
    }

}
