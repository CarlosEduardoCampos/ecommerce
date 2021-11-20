<?php
	use \Hcode\Page;
    use \Hcode\PageAdmin;
    Use \Hcode\Model\Category;
	Use \Hcode\Model\Products;
	Use \Hcode\Model\User;
    ////////////////////////////////////////////*** Category ***////////////////////////////////////////////
	//lista itens da categoria
	$app->get("/category/:id", function($id)
	{
		$category = new Category();
		$page = new Page;
		$category->setIdCategory((int)$id);
		//
		$page->setTpl("category",
		[
			'category' => $category->get(),
			'products'  => $category->getProducts()
		]);
	});

	//-> Listagem de Categorias
	$app->get("/admin/categories", function()
	{
		User::verifyLogin();
		$categories = Category::listAll();
		$page = new PageAdmin();
		//
		$page->setTpl("categories", array('categories' => $categories));
		exit;
	});

	//-> Formulário do cadastro de categorias
	$app->get("/admin/categories/create", function()
	{
		User::verifyLogin();
		$page = new PageAdmin();
		//
		$page->setTpl("categories-create");
		exit;
	});

	//-> Dados do cadastro de categorias
	$app->post("/admin/categories/create", function()
	{
		User::verifyLogin();
		$category = new Category();
		$category->setDataForm($_POST);
		$category->save();
		//
		header('Location: /admin/categories');
		exit;
	});

	//-> Formulário do edição de categoria
	$app->get('/admin/editar-categories/:id', function($id)
	{
		User::verifyLogin();
		$category = new Category();
		$page = new PageAdmin();
		$category->setIdCategory((int)$id);
		//
		$page->setTpl("categories-update", array('category' => $category->get()));
		exit;
	});

	$app->post('/admin/editar-categories/:id', function($id)
	{
		User::verifyLogin();
		$category = new Category();
		$category->setIdcategory((int)$id);
		$category->setDataForm($_POST);
		$category->save();
		//
		header('Location: /admin/categories');
		exit;
	});

	//-> Deletar cadatro de categorias
	$app->get('/admin/delete-categories/:id', function($id)
	{
		User::verifyLogin();
		$category = new Category();
		$category->setIdcategory((int)$id);
		$category->delete();
		//
		header('Location: /admin/categories');
		exit;
	});

	$app->get('/admin/categories-products/:id', function($id)
	{
		User::verifyLogin();
		$categories = new Category();
		$page = new PageAdmin;
		$categories->setIdcategory((int)$id);
		$page->setTpl("categories-products",
		[
			'category'=> $categories->get(),
			'productsRelated'=> $categories->getProducts(),
			'productsNotRelated' => $categories->getProducts(false)
		]);
	});

	$app->get('/admin/categories/:idcategory/products/:idproducts/add', function($idcategory, $idproducts)
	{
		User::verifyLogin();
		$categories = new Category();
		$categories->setIdcategory((int)$idcategory);
		$categories->addProduct((int)$idproducts);
		//
		header("Location: /admin/categories-products/".$idcategory);
		exit;
	});

	$app->get('/admin/categories/:idcategory/products/:idproducts/remove', function($idcategory, $idproducts)
	{
		User::verifyLogin();
		$categories = new Category();
		$categories->setIdcategory((int)$idcategory);
		$categories->removeProduct((int)$idproducts);
		//
		header("Location: /admin/categories-products/".$idcategory);
		exit;
	});
?>