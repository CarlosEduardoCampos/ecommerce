<?php
    use \Hcode\Page;
    use \Hcode\PageAdmin;
    Use \Hcode\Model\User;
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
?>