<?php

/**
 * UsuariosController
 *
 * @package SystemMVC
 * @since 0.1
 */
class UsuariosController extends MainController
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
		// Carrega o model para este view
        $model = $this->load_model('usuarios/usuarios-model');

		// Título da página
		$this->title = 'System';

		// Adiciona o conteúdo da página
		require ABSPATH . '/views/_includes/header.php';
		require ABSPATH . '/views/_includes/nav.php';
		require ABSPATH . '/views/usuarios/listar-usuarios.php';
		require ABSPATH . '/views/_includes/footer.php';
	}

	/**
	 * inserir
	 *
	 * Carrega o layaut da página junto com o conteúdo
	 *
	 * @since 0.1
	 * @access public
	 */
	public function inserir()
	{
		// Carrega o model para este view
        $model = $this->load_model('usuarios/usuarios-model');

		// Título da página
		$this->title = 'System';

		// Adiciona o conteúdo da página
		require ABSPATH . '/views/_includes/header.php';
		require ABSPATH . '/views/_includes/nav.php';
		require ABSPATH . '/views/usuarios/cadastrar-usuario.php';
		require ABSPATH . '/views/_includes/footer.php';
	}

	/**
	 * visualizar
	 *
	 * Carrega o layaut da página junto com o conteúdo
	 *
	 * @since 0.1
	 * @access public
	 */
	public function visualizar()
	{
		// Carrega o model para este view
        $model = $this->load_model('usuarios/usuarios-model');

        // Inclui os parâmetros que são enviados ao método na classe SystemMVC
        $param = ( func_num_args() >= 1 ) ? func_get_args( 0 ) : array();

		// Título da página
		$this->title = 'System';

		// Adiciona o conteúdo da página
		require ABSPATH . '/views/_includes/header.php';
		require ABSPATH . '/views/_includes/nav.php';
		require ABSPATH . '/views/usuarios/visualizar-usuario.php';
		require ABSPATH . '/views/_includes/footer.php';
	}

	/**
	 * editar
	 *
	 * Carrega o layaut da página junto com o conteúdo
	 *
	 * @since 0.1
	 * @access public
	 */
	public function editar()
	{
		// Carrega o model para este view
        $model = $this->load_model('usuarios/usuarios-model');

        // Inclui os parâmetros que são enviados ao método na classe SystemMVC
        $param = ( func_num_args() >= 1 ) ? func_get_args( 0 ) : array();

		// Título da página
		$this->title = 'System';

		// Adiciona o conteúdo da página
		require ABSPATH . '/views/_includes/header.php';
		require ABSPATH . '/views/_includes/nav.php';
		require ABSPATH . '/views/usuarios/editar-usuario.php';
		require ABSPATH . '/views/_includes/footer.php';
	}
}