<?php

use DB\MyQueryBuilder;

require_once 'autoload.php';

$config = [

        'DB_DRIVER'       => 'pgsql',

        'DB_HOST'       => '127.0.0.1',

        'DB_PORT'       => 'port',

        'DB_NAME'   => 'table',

        'DB_USER'   => 'postgres',

        'DB_PASSWORD'   => 'password',
];

$db = new MyQueryBuilder($config);

/*
$db
    ->update('books', ['classes' =>'quernsd', 'first_name' => 'libra'])
    ->where('books.id', '=', 11);
*/


/*
$db
    ->select()
    ->from('books')
    ->where(['id', '>=', 2]);
*/

$result = $db->execute();

dd($result);



