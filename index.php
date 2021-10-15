<?php 
	session_start();
	require_once("vendor/autoload.php");
	use \Slim\Slim;
	use \Hcode\Page;
    use \Hcode\PageAdmin;
    Use \Hcode\Model\User;
	
	$app = new Slim();

	$app->config('debug', true);

	//Rota templete do cliente
	$app->get('/', function()
	{
		//pucha dados e cabeçalho padrão
		$page = new Page();
		$page->setTpl("index");
		exit;
	});

	//Rota templete adiministrador
	$app->get('/admin', function()
	{
		User::verifyLogin();
		//pucha dados e cabeçalho padrão
		$page = new PageAdmin();
		$page->setTpl("index");
		exit;
	});

	require_once('vendor/routes/routes.php');

	$app->run();
?>