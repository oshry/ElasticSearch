<?php
/**
 * Created by PhpStorm.
 * User: oshry
 * Date: 5/5/15
 * Time: 5:16 PM
 */
return [
    '(<controller>(/<action>))' => [
        'prefix'     => CONTRLLER,
        'controller' => 'Users',
        'action'     => 'index'
    ],
    [
        'prefix'     => CONTRLLER,
        'controller' => 'Api',
        'action'     => 'index'
    ],
];