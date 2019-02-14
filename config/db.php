<?php

return [
    'type'    => getenv('DB_CONNECTION', 'mysql'),
    'host'    => getenv('DB_HOST', 'localhost'),
    'dbname'  => getenv('DB_NAME', 'app'),
    'charset' => 'utf8',
    'user'    => getenv('DB_USERNAME', 'root'),
    'pass'    => getenv('DB_PASSWORD', ''),
];