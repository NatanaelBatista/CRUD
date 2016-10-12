<?php

/**
 * LoginController
 *
 * @package SystemMVC
 * @since 0.1
 */
class LoginController extends MainController
{
	/**
	 * index
	 *
	 * Carrega o layaut da página junto com o conteúdo
	 *
	 * @since 0.1
	 * @access public
	 */
	public function index()
	{
		// Retorna um objeto do model
		$model = $this->load_model( 'login/login-model' );

		// Título da página
		$this->title = 'Login';

		// Adiciona o conteúdo da página
		require ABSPATH . '/views/login/login.php';
	}

	/**
	 * logout
	 *
	 * faz zo logout do usuário
	 *
	 * @since 0.1
	 * @access public
	 */
	public function logout()
	{
		// Retorna um objeto do model
		$model = $this->load_model( 'login/login-model' );

		// Método que faz o logout
		$model->user_logout();
	}
}