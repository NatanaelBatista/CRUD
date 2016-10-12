<?php

/**
 * HomeController
 *
 * @package SystemMVC
 * @since 0.1
 */
class HomeController extends MainController
{
	public function index()
	{
		// Título da página
		$this->title = 'Home';

		// Adiciona o conteúdo da página
		require ABSPATH . '/views/_includes/header.php';
		require ABSPATH . '/views/_includes/nav.php';
		require ABSPATH . '/views/home/home.php';
		require ABSPATH . '/views/_includes/footer.php';
	}
}