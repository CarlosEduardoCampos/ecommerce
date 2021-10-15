<?php 
    use \Hcode\Page;
    use \Hcode\PageAdmin;
    Use \Hcode\Model\User;
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
?>