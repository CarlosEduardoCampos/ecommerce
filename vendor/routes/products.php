<?php
	use \Hcode\Page;
    use \Hcode\PageAdmin;
    Use \Hcode\Model\Products;
	Use \Hcode\Model\User;
    ////////////////////////////////////////////*** Products ***////////////////////////////////////////////
	//lista itens da categoria
	$app->get("/products/:id", function($id)
	{
		$Products = new Products();
		$page = new Page;
		$Products->setIdProducts((int)$id);
		//
		$page->setTpl("Products",['Products' => $Products->get()]);
	});

	//-> Listagem de Categorias
	$app->get("/admin/products", function()
	{
		User::verifyLogin();
		$products = Products::listAll();
		$page = new PageAdmin();
		//
		$page->setTpl("products", array('products' => $products));
		exit;
	});

	//-> Formulário do cadastro de categorias
	$app->get("/admin/products/create", function()
	{
		User::verifyLogin();
		$page = new PageAdmin();
		//
		$page->setTpl("products-create");
		exit;
	});

	//-> Dados do cadastro de categorias
	$app->post("/admin/products/create", function()
	{
		User::verifyLogin();
		$Products = new Products();
		$Products->setDataForm($_POST);
		$Products->save();
		//
		header('Location: /admin/products');
		exit;
	});

	//-> Formulário do edição de categoria
	$app->get('/admin/editar-products/:id', function($id)
	{
		User::verifyLogin();
		$Products = new Products();
		$page = new PageAdmin();
		$Products->setIdProduct((int)$id);
		//
		$page->setTpl("products-update", array('products' => $Products->get()));
		exit;
	});

	//->Dados editados
	$app->post('/admin/editar-products/:id', function($id)
	{
		User::verifyLogin();
		$Products = new Products();
		$Products->setIdProduct((int)$id);
		$Products->setPhoto($_FILES);
		$Products->setDesurl($_FILES['file']['name']);
		$Products->setDataForm($_POST);
		$Products->save();
		//
		header('Location: /admin/products');
		exit;
	});

	//-> Deletar cadatro de categorias
	$app->get('/admin/delete-products/:id', function($id)
	{
		User::verifyLogin();
		$Products = new Products();
		$Products->setIdProduct((int)$id);
		$Products->delete();
		//
		header('Location: /admin/products');
		exit;
	});

	$app->get('/list-products/:id', function($id)
	{
		$products = new Products();
		$page = new Page;
		$products->get((int)$id);
		$page->setTpl("Products",
		[
			'Products'=>$Products->get(),
			'products'=>[]
		]);
	});
?>