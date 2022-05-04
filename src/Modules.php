<?php

namespace App;

return [
    'db' => new Database(getenv("DB_HOST"), getenv("DB_PORT"), getenv("DB_NAME"), getenv("DB_USER"), getenv("DB_PASS")),
    'request' => new Request(),
];