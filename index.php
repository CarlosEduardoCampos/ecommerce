<?php 

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
	});

	//Rota templete adiministrador
	$app->get('/admin/', function()
	{
		//pucha dados e cabeçalho padrão
		$page = new PageAdmin();
		$page->setTpl("index");
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
	});
	$app->run();

	//Rota login adiministrador Verificação
	$app->post('/admin/login', function()
	{
		//pucha dados e anula cabeçalho padrão
		User::login($_POST["login"], $_POST["password"]);
		header("Location: /admin/");
		exit;
	});
	$app->run();
	

?>