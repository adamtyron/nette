<?php

/**
 * Test: Nette\Config\Loader: including files
 *
 * @author     David Grudl
 * @package    Nette\Config
 */

use Nette\Config;



require __DIR__ . '/../bootstrap.php';



Assert::throws(function() {
	$config = new Config\Loader;
	$config->load('missing.neon');
}, 'Nette\FileNotFoundException', "File 'missing.neon' is missing or is not readable.");

Assert::throws(function() {
	$config = new Config\Loader;
	$config->load(__FILE__);
}, 'Nette\InvalidArgumentException', "Unknown file extension '%a%.phpt'.");

Assert::throws(function() {
	$config = new Config\Loader;
	$config->load('files/config.sample.neon', 'unknown');
}, 'Nette\AssertionException', "Missing section 'unknown' in file '%a%'.");
