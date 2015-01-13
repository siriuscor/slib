<?php
namespace slib;
include __DIR__ . '/../vendor/autoload.php';

class ModelA extends Model {

}

$a = new ModelA();
var_dump($a->has('prop', 'subprop'));
$a->set('prop','subprop', 'a');
var_dump($a->has('prop', 'subprop'));
var_dump($a->get('prop', 'subprop'));
$a->del('prop');
var_dump($a->has('prop'));