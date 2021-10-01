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

	////////////////////////////////////////////*** USUÁRIOS ***////////////////////////////////////////////
	//Rota listagem de Usuarios
	$app->get('/admin/users', function()
	{
		User::verifyLogin();
		$users = User::listAll();
		$page = new PAgeAdmin();
		$page->setTpl("users", array("users"=>$users));
		exit;
	});

	//Rota Cadastro de Usuarios
	$app->get('/admin/users/create', function()
	{
		User::verifyLogin();
		$page = new PageAdmin();
		$page->setTpl("users-create");
		exit;
	});

	//Rota Cadastro de Usuarios
	$app->post('/admin/users/create', function()
	{
		User::verifyLogin();
		$page = new PageAdmin();
		$users = new User();
		$users->setData($_POST);
		$users->save();
		header('Location: /admin/users');
		exit;
	});

	//Rota de deletar usuario
	$app->get('/admin/users/delete/:iduser', function($iduser)
	{
		User::verifyLogin();
		$user = new User();
		$user->get((int)$iduser);
		$user->delete();
		header('Location: /admin/users');
		exit;
	});

	//Rota Atualização de Usuarios
	$app->get('/admin/users/:iduser', function($iduser)
	{
		User::verifyLogin();
		$user = new User();
		$user->get((int)$iduser);
		$page = new PageAdmin();
		$page->setTpl("users-update", array('user'=> $user->getValues()));
	});

	//Rota Atualização de Usuarios
	$app->post('/admin/users/:iduser', function($iduser)
	{
		User::verifyLogin();
		$user = new User();
		$user->get((int)$iduser);
		$user->setData($_POST);
		$user->update();
		header('Location: /admin/users');
		exit;
	});
	////////////////////////////////////////////*** USUÁRIOS ***////////////////////////////////////////////

	/////////////////////////////////////////////*** LOGIN ***//////////////////////////////////////////////
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
		header("Location: /admin");
		exit;
	});

	//Rota logout
	$app->get('/admin/logout',function()
	{
		User::logout();
		header("Location: /admin/login");
		exit;
	});
	/////////////////////////////////////////////*** LOGIN ***//////////////////////////////////////////////

	/////////////////////////////////////////////*** SENHA ***//////////////////////////////////////////////
	//Rota de recuperação de senha
	$app->get("/admin/forgot", function()
	{
		//pucha dados e anula cabeçalho padrão
		$page = new PageAdmin(
			[
				"header"=>false,
				"footer"=>false
			]
		);
		$page->setTpl("forgot");
		exit;
	});

	//Rota de recuperação de senha
	$app->post("/admin/forgot", function()
	{
		$users = User::getForgot( $_POST["email"]);
		header("Location: /admin/forgot/sent");
		exit;
	});
	
	//Rota de Email recuperação de senha
	$app->get("/admin/forgot/sent", function()
	{
		//pucha dados e anula cabeçalho padrão
		$page = new PageAdmin(
			[
				"header"=>false,
				"footer"=>false
			]
		);
		$page->setTpl("forgot-sent");
		exit;
	});

	$app->get("/admin/forgot/reset", function()
	{
		$user = User::validForgotdecrypt($_GET["code"]);
		//pucha dados e anula cabeçalho padrão
		$page = new PageAdmin(
			[
				"header"=>false,
				"footer"=>false
			]
		);
		$page->setTpl("forgot-sent");
		exit;
	});

	$app->run();
?>