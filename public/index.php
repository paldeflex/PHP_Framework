<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

use Framework\Http\Reqeust;
use Framework\Http\Response;

$request = Reqeust::createFromGlobals();

$content = '<h1>Hello world!</h1>';

$response = new Response($content, 200, []);
$response->send();
