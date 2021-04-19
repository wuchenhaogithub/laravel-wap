<?php

namespace Wuchenhao\LaravelShop\Data\Goods\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    public function __construct()
    {
        $this->setConnection(config('data.goods.database.connection.name'));
        parent::__construct();
    }

}
