<?php 

/**
 * UsuariosModel
 *
 * Classe para registros de usuários
 *
 * @package systemMVC
 * @since 0.1
 */
class UsuariosModel
{
	/**
	 * $form_data
	 *
	 * Os dados do formulário de envio.
	 *
	 * @access public
	 */	
	public $form_data;

	/**
	 * $form_msg
	 *
	 * As mensagens de feedback para o usuário.
	 *
	 * @access public
	 */	
	public $form_msg;

	/**
	 * $form_error
	 *
	 * As mensagens de feedback para o usuário.
	 *
	 * @access public
	 */	
	public $form_error;

	/**
	 * $db
	 *
	 * O objeto da nossa conexão PDO
	 *
	 * @access public
	 */
	public $db;

	/**
	 * Construtor
	 * 
	 * Carrega  o DB.
	 *
	 * @since 0.1
	 * @access public
	 * @param Object $db
	 */
	public function __construct( $db = false )
	{
		$this->db = $db;
	}

	/**
	 * validate_register_form
	 *
	 * Valida o formulário de envio e cadastra usuários
	 *
	 * @since 0.1
	 * @access public
	 */
	public function create_register_form()
	{
		// Define se a operação foi concluída com sucesso
		$success = false;

		// Configura os dados do formulário
		$this->form_data = array();

		// Verifica se algum dado foi enviado
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' && ! empty ( $_POST ) )
		{	
			// Faz o loop dos dados do post
			foreach ( $_POST as $key => $value )
			{
				// Insere os dados enviados na propriedade $form_data
				$this->form_data[$key] = $value;
			}

			// Valida os dados passados no formulário
			$this->validation( $this->form_data, false );
		}
		else
		{
			// Termina se o formulário não foi submetido
			return;
		}

		// Verifica se a propriedade $form_data foi preenchidas e se foram validadas
		if( $this->form_error == false )
		{
			// Verifica se o usuário existe
			$db_check_user = $this->db->query
			(
				'SELECT * FROM `users` WHERE `user` = ?', 
				array(
					chk_array( $this->form_data, 'user')
				) 
			);
			
			// Verifica se a consulta foi realizada com sucesso
			if ( ! $db_check_user )
			{
				$this->form_msg = '<div class="alert alert-danger fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Erro interno</div>';

				return;
			}
			else
			{
				// Obtém os dados da base de dados MySQL
				$fetch_user = $db_check_user->fetch();
				
				// Configura o ID do usuário
				$user_id = $fetch_user['user_id'];

				if ( ! empty( $user_id ) )
				{
					$this->form_msg = '<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Erro, usuário já cadastrado.</div>';
			
					return;
				}
				else
				{
					$query = $this->db->insert
					(
						'users',
						array(
							'user_name' => chk_array( $this->form_data, 'user_name'), 
							'user' => chk_array( $this->form_data, 'user'),
							'user_password' => chk_array( $this->form_data, 'user_password'),
							'user_permissions' => chk_array( $this->form_data, 'user_permissions'),
							'user_active' => chk_array( $this->form_data, 'user_active'),
						)
					);

					if ( ! $query )
					{
						$this->form_msg = '<div class="alert alert-danger fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Não foi possível cadastrar o usuário.</div>';
						
						return;
					}
					else
					{
						$this->form_msg = '<div class="alert alert-success fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Usuário cadastrado com sucesso!.</div>';

						return $success = true;
					}
				}
			}
		}

		return;
	}

	/**
	 * validate_register_form
	 *
	 * Valida o formulário de envio e cadastra usuários
	 *
	 * @since 0.1
	 * @access public
	 */
	public function edit_register_form( $user_id = false )
	{
		// Define se a operação foi concluída com sucesso
		$success = false;

		// Configura os dados do formulário
		$this->form_data = array();

		// Verifica se algum dado foi enviado
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' && ! empty ( $_POST ) )
		{	
			// Faz o loop dos dados do post
			foreach ( $_POST as $key => $value )
			{
				// Insere os dados enviados na propriedade $form_data
				$this->form_data[$key] = $value;
			}

			// Valida os dados passados no formulário
			$this->validation( $this->form_data, true );
		}
		else
		{
			// Termina se nada foi enviado
			return;
		}

		// Verifica se a propriedade $form_data foi preenchidas e se foram validadas
		if( $this->form_error == false )
		{
			// O ID de usuário que vamos pesquisar
			$s_user_id = false;
			
			// Verifica se você enviou algum ID para o método
			if ( ! empty( $user_id ) )
			{
				$s_user_id = $user_id[0];
			}
			
			// Verifica se existe um ID de usuário
			if ( empty( $s_user_id ) )
			{
				return;
			}
			else
			{
				// Verifica se o usuário existe
				$db_check_user = $this->db->query ('SELECT * FROM `users` WHERE `user_id` = ?', array( $s_user_id ) );

				// Verifica se a consulta foi realizada com sucesso
				if ( ! $db_check_user )
				{
					$this->form_msg = '<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Erro interno.</div>';

					return;
				}
				else
				{
					$query= $this->db->update
					(
						'users', 'user_id', $s_user_id, 
						array(
							'user_name' => chk_array( $this->form_data, 'user_name'), 
							'user' => chk_array( $this->form_data, 'user'),
							'user_permissions' => chk_array( $this->form_data, 'user_permissions'),
							'user_active' => chk_array( $this->form_data, 'user_active'),
						)
					);
					
					// Verifica se a consulta está OK e configura a mensagem
					if ( ! $query ) {
						$this->form_msg = '<div class="alert alert-danger fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Não foi possível editar o usuário.</div>';

						// Termina
						return;
					}
					else
					{
						$this->form_msg = '<div class="alert alert-success fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Usuário editado com sucesso!.</div>';

						// Termina
						return $success = true;;
					}
				}
			}
		}

		return;
	}

	/**
	 * get_register_form
	 *
	 * Obtém os dados do formulário
	 * 
	 * Obtém os dados para usuários registrados
	 *
	 * @since 0.1
	 * @access public
	 */
	public function get_register_form( $user_id = false )
	{
		// O ID de usuário que vamos pesquisar
		$s_user_id = false;
		
		// Verifica se você enviou algum ID para o método
		if ( ! empty( $user_id ) )
		{
			$s_user_id = $user_id[0];
		}
		
		// Verifica se existe um ID de usuário
		if ( empty( $s_user_id ) )
		{
			return;
		}
		else
		{
			// Verifica na base de dados
			$query = $this->db->query('SELECT * FROM `users` WHERE `user_id` = ?', array( $s_user_id ));
			
			// Verifica a consulta
			if ( ! $query )
			{
				$this->form_msg = '<div class="alert alert-danger fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Usuário não encontrado.</div>';

				return;
			}
			else
			{
				// Obtém os dados da consulta
				$fetch_userdata = $query->fetch();
				
				// Verifica se os dados da consulta estão vazios
				if ( empty( $fetch_userdata ) )
				{
					$this->form_msg = '<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Usuário não encontrado.</div>';

					return;
				}
				
				// Configura os dados do formulário
				foreach ( $fetch_userdata as $key => $value )
				{
					$this->form_data[$key] = $value;
				}
			}
		}

		return;
	}

	/**
	 * Obtém a lista de usuários
	 * 
	 * @since 0.1
	 * @access public
	 * @return Array
	 */
	public function get_user_list()
	{
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `users` ORDER BY user_id DESC');
		
		// Verifica se a consulta está OK
		if ( ! $query )
		{
			return array();
		}
		else
		{
			// Preenche a tabela com os dados do usuário
			return $query->fetchAll();
		}
	}

	/**
	 * Valida os dados do formulário
	 * 
	 * @since 0.1
	 * @access public
	 * @return Array
	 */
	public function validation( $form_data, $password_disabled )
	{
		$user_name = 		$form_data['user_name'];
		$user = 			$form_data['user'];
		$permissions = 		$form_data['user_permissions'];
		$user_password;
		$pwd;
  		$active;

  		if ( $password_disabled == false )
  		{
  			$user_password = $form_data['user_password'];
			$pwd = $form_data['pwd'];
  		}

  		if ( isset( $this->form_data['user_active'] ) )
  		 {
  		 	$active = $this->form_data['user_active'];
  		 	$this->form_data['user_active'] = 'yes';
  		 }
  		 else
  		 {
  		 	$active = 'no';
  		 	$this->form_data['user_active'] = $active;
  		 }

  		function inputs( $entrada )
  		{
  			$entrada = htmlentities( $entrada );
  			$entrada = strip_tags( $entrada );
  			$entrada = ltrim( $entrada );
  		}

  		// Validação do nome de usuário
  		
  		if ( strlen( $user_name ) <= 0 )
  		{
  			$this->form_msg = '<div class="alert alert-danger fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Insira o nome do usuário</div>';

			$this->form_error = true;

			return;
  		}

  		inputs( $user_name );

  		if ( !preg_match( "/^[a-zA-Z ]*$/",$user_name ) )
  		{
  			$this->form_msg = '<div class="alert alert-danger fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				O nome deve conter apenas letras</div>';

			$this->form_error = true;

			return;
  		}

  		// Validação do nome de login

  		if ( strlen( $user ) <= 0 )
  		{
  			$this->form_msg = '<div class="alert alert-danger fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Insira o login do usuário</div>';

			$this->form_error = true;

			return;
  		}
  		
  		inputs( $user );

  		if ( !preg_match( "/^[a-zA-Z ]*$/",$user ) )
  		{
  			$this->form_msg = '<div class="alert alert-danger fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				O login deve conter apenas letras</div>';

			$this->form_error = true;

			return;
  		}

  		if ( strlen( $user ) > 15 )
  		{
  			$this->form_msg = '<div class="alert alert-danger fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				O login deve conter até 15 caracteres</div>';
  		}

  		if ( $password_disabled == false )
  		{
	  		// Validação da senha

	  		if ( strlen( $user_password ) <= 0 )
	  		{
	  			$this->form_msg = '<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Insira a senha</div>';

				$this->form_error = true;

				return;
	  		}

	  		if ( strlen( $user ) > 15 )
	  		{
	  			$this->form_msg = '<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					A senha deve conter até 15 caracteres</div>';
	  		}
	  		
	  		inputs( $user_password );

	  		// Validação confirmação da senha

	  		if ( strlen( $pwd ) <= 0 )
	  		{
	  			$this->form_msg = '<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Confirme a senha</div>';

				$this->form_error = true;

				return;
	  		}
	  		
	  		inputs( $pwd );

	  		if ( $pwd != $user_password )
	  		{
	  			$this->form_msg = '<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					As senhas não conferem</div>';

				$this->form_error = true;

				return;
	  		}

	  		$this->form_error = false;

			return;
  		}
	}
}