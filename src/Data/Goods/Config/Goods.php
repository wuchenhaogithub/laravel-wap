<?php
return [
    'database' => [
        // 这是 goods 组件的 默认的连接属性
        'connection' => [
            // 定义数据类连接类型
            'type' => 'mysql',// sqlserver,oracle
            'name' => 'goods',
        ],
        // 这是连接属性值
        'goods' => [
            'prefix' => 'goods_'
        ],
    ],
    'observes'=>[
        'Category'=>'CategoryObserver'
    ]
];
?>