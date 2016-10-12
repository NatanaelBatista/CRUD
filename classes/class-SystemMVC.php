<?php

/**
 * SystemMVC
 *
 * @package SystemMVC
 * @since 0.1
 */
class SystemMVC
{
	/**
	 * $controlador
	 *
	 * @access private
	 */	
	private $controller;

	/**
	 * $action
	 *
	 * @access private
	 */	
	private $action;
	
	/**
	 * $param
	 *
	 * @access private
	 */	
	private $param;
	
	/**
	 * $not_found
	 *
	 * @access private
	 */	
	private $not_found = '/includes/404.php';

	/**
	 * Construtor
	 *
	 * @since 0.1
	 * @access public
	 */
	public function __construct()
	{
		$this->get_url_data();

		// Se nenhum controller for especificado o método index do controller home é chamado
		if ( ! $this->controller )
		{
			require_once ABSPATH . '/controllers/home-controller.php';

			$this->controller = new HomeController();
			$this->controller->index();

			return;
		}

		// Se um controller for especificado e seu controller não existir a página not found é chamada
		if ( ! file_exists( ABSPATH . '/controllers/' . $this->controller . '.php' ) )
		{
			require_once ABSPATH . $this->not_found;

			return;
		}

		// Se o controller do controller especificado existir o mesmo é chamado
		require_once ABSPATH . '/controllers/' . $this->controller . '.php';

		// Remove caracteres inválidos do controller
		$this->controller = preg_replace( '/[^a-zA-Z]/i', '', $this->controller );

		// mas se sua classe não existir chame a página not found
		if ( ! class_exists( $this->controller ) )
		{
			require_once ABSPATH . $this->not_found;

			return;
		}

		// Se a classe existir um objeto é criado, e o atributo param é passado como parâmetro
		$this->controller = new $this->controller( $this->param );
		
		// Remove caracteres inválidos
		$this->action = preg_replace( '/[^a-zA-Z]/i', '', $this->action );

		// Se o método da ação existir o método é chamado e o aributo param é passado como parâmetros
		if ( method_exists( $this->controller, $this->action ) )
		{
			$this->controller->{ $this->action } ( $this->param );

			return;
		}

		// se nenhuma ação for especificada e o método index existir o método index é chamado
		if ( ! $this->action && method_exists( $this->controller, 'index' ) )
		{
			$this->controller->index( $this->param );

			return;
		}

		// se o método especificado não existir a página not found é chamada
		if ( ! method_exists( $this->controller, $this->action ) )
		{
			require_once ABSPATH . $this->not_found;

			return;
		}
	}

	/**
	 * get_url_data
	 *
	 * Obtém os dados da URL
	 *
	 * @since 0.1
	 * @access public
	 */
	public function get_url_data()
	{
		if ( isset( $_GET['path'] ) )
		{
			$path = $_GET['path'];

			// Remove a barra no final da string
			$path = rtrim( $path, '/' );

			// Filtra a string com o filtro de URL's
			$path = filter_var( $path, FILTER_SANITIZE_URL );

			// Cria um array com os dados
			$path = explode( '/', $path );

			// O primeiro valordo array será o controlador
			$this->controller = chk_array( $path, 0 );
			$this->controller .= '-controller';

			// O segundo valor será a ação
			$this->action = chk_array( $path, 1 );

			// todos os outros valores a partir do terceiro serão parâmetros 
			if ( chk_array( $path, 2 ) )
			{
				unset( $path[0] );
				unset( $path[1] );

				$this->param = array_values( $path );
			}

			// DEBUG
			/*
			echo 'controller: ' . $this->controller . '<hr>';
			echo 'action: ' . $this->action . '<hr>';
			echo 'param: <pre>';
			print_r( $this->param );
			echo '</pre>';
			*/
		}
	}
}