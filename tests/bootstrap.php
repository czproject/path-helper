<?php

require __DIR__ . '/../vendor/autoload.php';

Tester\Environment::setup();


/**
 * @return void
 */
function test(callable $cb)
{
	$cb();
}
