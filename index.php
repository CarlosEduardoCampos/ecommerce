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
	$app->get('/admin/', function()
	{
		User::verifyLogin();
		//pucha dados e cabeçalho padrão
		$page = new PageAdmin();
		$page->setTpl("index");
		exit;
	});

	//Rota login adiministrador Amostragem
	$app->get('/admin/login', function()
	{
		//pucha dados e anula cabeçalho padrão
		$page = new PageAdmin(
			[
				"header"=>false,
				"footer"=>false
			]
		);
		$page->setTpl("login");
		exit;
	});

	//Rota login adiministrador Verificação
	$app->post('/admin/login', function()
	{
		//pucha dados e anula cabeçalho padrão
		User::login($_POST["login"], $_POST["password"]);
		header("Location: /admin/");
		exit;
	});

	//Rota logout
	$app->get('admin/logout',function()
	{
		User::logout();
		header("login");
		exit;
	});

	$app->run();
?>