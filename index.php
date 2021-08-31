<?php 

	require_once("vendor/autoload.php");
	use \Slim\Slim;
	use \Hcode\Page;
	use \Hcode\PageAdmin;

	$app = new Slim();

	$app->config('debug', true);

	//Rota tamplete do cliente
	$app->get('/', function() {
		//pucha dados e cabeçalho da página
		$page = new Page();
		$page->setTpl("index");
	});

	//Rota tamplete adiministrador
	$app->get('/admin/', function() {
		//pucha dados e cabeçalho da página
		$page = new PageAdmin();
		$page->setTpl("index");
	});

	$app->run();

?>