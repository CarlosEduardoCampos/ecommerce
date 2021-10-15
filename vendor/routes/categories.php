<?php
	use \Hcode\Page;
    use \Hcode\PageAdmin;
    Use \Hcode\Model\Category;
    ////////////////////////////////////////////*** Category ***////////////////////////////////////////////
	//-> Listagem de Categorias
	$app->get("/admin/categories", function()
	{
		$categories = Category::listAll();
		$page = new PageAdmin();
		$page->setTpl("categories", array('categories' => $categories));
		exit;
	});

	//-> Formulário do cadastro de categorias
	$app->get("/admin/categories/create", function()
	{
		$page = new PageAdmin();
		$page->setTpl("categories-create");
		exit;
	});

	//-> Dados do cadastro de categorias
	$app->post("/admin/categories/create", function()
	{
		$category = new Category();
		$category->setDataForm($_POST);
		$category->save();
		//
		header('Location: /admin/categories');
		exit;
	});

	//-> Deletar cadatro de categorias
	$app->get('/admin/delete-categories/:id', function($id)
	{
		$category = new Category();
		$category->get((int)$id);
		$category->delete();
		//
		header('Location: /admin/categories');
		exit;
	});
?>