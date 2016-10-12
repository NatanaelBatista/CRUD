<?php

/**
 * MainController
 *
 * @package SystemMVC
 * @since 0.1
 */
class MainController extends UserLogin
{
	/**
	 * $db
	 *
	 * A conexão com a base de dados. Manterá o objeto PDO
	 *
	 * @access public
	 */
	public $db;

	/**
	 * $title
	 *
	 * Título das páginas 
	 *
	 * @access public
	 */
	public $title;

	/**
	 * $parametros
	 *
	 * @access public
	 */
	public $parametros = array();

	/**
	 * Construtor da classe
	 *
	 * Configura as propriedades e métodos da classe.
	 *
	 * @since 0.1
	 * @access public
	 * @param Array $parametros Parâmetros obtidos na URL
	 */
	public function __construct ( $parametros = array() )
	{
		// Instancia do DB
		$this->db = new SystemDB();
		
		// Parâmetros
		$this->parametros = $parametros;
	}

	/**
	 * Load model
	 *
	 * Carrega os modelos presentes na pasta /models/.
	 *
	 * @since 0.1
	 * @access public
	 * @param String $odel_name 
	 */
	public function load_model( $model_name = false ) {
	
		// Um arquivo deverá ser passado como parâmetro
		if ( ! $model_name )
		{
			return;
		}
		else
		{
			// Garante que o nome do modelo tenha letras minúsculas
			$model_name =  strtolower( $model_name );
			
			// Inclui o arquivo
			$model_path = ABSPATH . '/models/' . $model_name . '.php';
			
			// Verifica se o arquivo existe
			if ( file_exists( $model_path ) )
			{
				// Inclui o arquivo
				require_once $model_path;
				
				// Remove os caminhos do arquivo (se tiver algum)
				$model_name = explode('/', $model_name);
				
				// Pega só o nome final do caminho
				$model_name = end( $model_name );
				
				// Remove caracteres inválidos do nome do arquivo
				$model_name = preg_replace( '/[^a-zA-Z0-9]/is', '', $model_name );
				
				// Verifica se a classe existe
				if ( class_exists( $model_name ) )
				{
					// Retorna um objeto da classe
					return new $model_name( $this->db );
				}
				
				return;
			}
		}
	}
}