<?php
    use \Hcode\Page;
    use \Hcode\PageAdmin;
    Use \Hcode\Model\User;
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
?>