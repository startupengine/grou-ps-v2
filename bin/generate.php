#!/usr/bin/php
<?php

require __DIR__ . "/../vendor/autoload.php";
include __DIR__ . '/../lib/FileGeneration.php';

$dir = __DIR__ . '/../site/templates';
$templates = new League\Plates\Engine($dir);

/*
if($argc<3) {
    echo "You must enter name and id parameters.";
    exit(1);
}
$name = $argv[1];
$id = $argv[2]; // '79982844-6a27-4b3b-b77f-419a79be0e10';
$title = $argv[3] ? $argv[3] : $name; 
*/

$cmd = new Commando\Command();

$cmd->setHelp("Generates static social network frontend");

$cmd->option()
    ->require()
    ->describedAs('Short Group Name (ASCII only)');

$cmd->option()
    ->require()
    ->describedAs('Group Title (may contain spaces or special chars)');

$cmd->option('i')
    ->aka('id')
    ->describedAs('GraphJS ID');

$cmd->option('h')
    ->aka('host')
    ->describedAs('GraphJS Server Hostname');

$cmd->option('s')
    ->aka('stream')
    ->describedAs('Stream Server Hostname');

$cmd->option('p')
    ->aka('primary_color')
    ->describedAs('Primary Color');

$cmd->option('t')
    ->aka('text_color')
    ->describedAs('Text Color');

$cmd->option('b')
    ->aka('background_color')
    ->describedAs('Background Color');

$cmd->option('t')
    ->aka('theme')
    ->describedAs('Theme (light or dark)');

$name = $cmd[0];
$title = $cmd[1];
$id = $cmd["id"];

(new FileGeneration($dir, $name, $title))->generate();
