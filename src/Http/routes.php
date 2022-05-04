<?php
\App\Router::get('/', [\App\Controllers\SummaryController::class, 'index']);

\App\Router::get('/index', function (){
    return 'REST API WITH MVC';
});