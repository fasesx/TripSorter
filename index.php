<?php
// Define path to source directory
defined('SOURCE_FILE_PATH') || define('SOURCE_FILE_PATH', __DIR__ . '/Source/');
// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';
// Load Json Parser
$sourceFile = SOURCE_FILE_PATH . 'boarding-cards.json';
$_InputParser = new Core\Parser\Input\Input();
$tripCollection = $_InputParser->readFromFile($sourceFile);

print_r($tripCollection);die;