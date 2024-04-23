<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

use Framework\Http\Kernel;
use Framework\Http\Reqeust;

$request = Reqeust::createFromGlobals();
$kernel = new Kernel();
$response = $kernel->handle($request);
$response->send();
