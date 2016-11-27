<?php
require_once __DIR__.'/../vendor/autoload.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Max-Age: 1000');


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

$app['debug'] = true;

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'    => 'pdo_pgsql',
        'host'      => "172.17.0.2",
        'dbname'    => 'hackaton',
        'user'      => 'postgres',
        'password'  => 'postgres',
        'charset'   => 'utf-8',
    ),
));

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
 
$app->get('/', function() use ($list, $app) {
	return "Hello Word!";
});

$app->match('/v1/sign-up', function (Request $request) use ($app) {
    var_dump('aaaa');exit;
    $content = json_decode($request->getContent());
    var_dump(array(
            'nome' => $content->nome,
            'email' => $content->email,
            'senha' => $content->senha
        ));exit;

	$post = $app['db']->insert('usuario',
        array(
            'nome' => $content->nome,
            'email' => $content->email,
            'senha' => $content->senha
        )
    );

	return '';
})->method('OPTIONS|POST');

$app->post('/v1/questions', function (Request $request) {
    $content = json_decode($request->getContent());
});

$app->get('/v1/notify', function() use ($list) {
	return "Hello Word!";
});

$app->get('/v1/risk-area', function() use ($list) {
	return "Hello Word!";
});

$app->get('/v1/ccurrences', function() use ($list) {
	return json_encode($list);
});
 
$app->run();
