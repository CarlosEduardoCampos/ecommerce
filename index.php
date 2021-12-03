<?php 
	session_start();
	require_once("vendor/autoload.php");
	use \Slim\Slim;
	use \Hcode\Page;
    use \Hcode\PageAdmin;
    Use \Hcode\Model\User;
	Use \Hcode\Model\Products;
	Use \Hcode\Model\Category;

	$app = new Slim();

	$app->config('debug', true);

	//Rota templete do cliente
	$app->get('/', function()
	{
		//pucha dados e cabeçalho padrão
		$page = new Page();
		$page->setTpl("index",
		[//array
			'products' => Products::listAll()
		]);
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

	$app->get('/list-categories/:id', function($id)
	{
		$page = (isset($_GET['page'])) ?(int)$_GET['page'] : 1;
		$categories = new Category();
		$page = new Page;
		$categories->get((int)$id);
		$pagination = $category->getProductsPage($page);
		$pages = [];
		for($i=1; $i < $pagination['pages']; $i++)
		{
			array_push($pages,[
				'link' => '/categories'.$category->getIdcategory().'?page='.$i,
				'pages' => $i
			]);
		}

		$page->setTpl("category",
		[
			'category'=>$category->get(),
			'products'=> $pagination['date']
		]);
	});

	require_once('vendor/routes/routes.php');

	$app->run();
?>