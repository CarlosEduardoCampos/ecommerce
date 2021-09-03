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

	//Rota listagem de Usuarios
	$app->get("/admin/users", function()
	{
		User::veryfyLogin();
		$page = new PAgeAdmin();
		$page->setTpl("users");
		exit;
	});

	//Rota Cadastro de Usuarios
	$app->get("/admin/user/create"), function()
	{
		User::veryfyLogin();
		$page = new PageAdmin();
		$page->setTpl("users-creat");
		exit;
	});

	//Rota Cadastro de Usuarios
	$app->post("/admin/user/creat"), function()
	{
		User::veryfyLogin();
		$page = new PageAdmin();
		$page->setTpl("users-creat");
	});

	//Rota Atualização de Usuarios
	$app->get("/admin/user/:iduser"), function($iduser)
	{
		User::verifyLogin();
		$page = new PageAdmin();
		$page->setTpl("users-update");
	});

	//Rota Atualização de Usuarios
	$app->post("/admin/user/:iduser"), function($iduser)
	{
		User::verifyLogin();
		$page = new PageAdmin();
		$page->setTpl("users-update");
	});

	//Rota de deltar usuario
	//Rota Atualização de Usuarios
	$app->deletar("/admin/user/:iduser", function($iduser))
	{
		User::verifyLogin();
		$page = new PageAdmin();
		$page->setTpl("users-update");
	}

	//Rota login adiministrador Verificação
	$app->post('/admin/login', function()
	{
		//pucha dados e anula cabeçalho padrão
		User::login($_POST["login"], $_POST["password"]);
		header("Location: /admin/");
		exit;
	});

	//Rota logout
	$app->get('/admin/logout',function()
	{
		User::logout();
		header("Location: /admin/login");
		exit;
	});

	$app->run();
?>