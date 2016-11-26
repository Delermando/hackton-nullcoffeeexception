<?php
require_once __DIR__.'/../vendor/autoload.php';
 
$app = new Silex\Application();

$app['debug'] = true;

$list = [
	["lat" => 22.98241688, "lon" => -43.36303711],
	["lat" => -23.0085816, "lon" => -43.3167113],
	["lat" => -23.0149757, "lon" => -43.3043638],
    ["lat" => -22.98490592, "lon" => -43.36501122],
    ["lat" => -22.98715787, "lon" => -43.36586952],
    ["lat" => -23.0118059, "lon" => -43.3050487],
    ["lat" => -22.98261443, "lon" => -43.36488247],
	["lat" => -23.0080965, "lon" => -43.3043155]
];
 
$app->get('/', function() use ($list) {
	return "Hello Word!";
});
 
$app->get('/occurrences', function() use ($list) {
	return json_encode($list);
});

$app->get('/{id}', function (Silex\Application $app, $id) use ($list) {
 
 if (!isset($list[$id])) {
     $app->abort(404, "id {$id} does not exist.");
 }
 return json_encode($list[$id]);
});
 
$app->run();
