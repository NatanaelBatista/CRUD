<?php

/**
 * LoginModel
 *
 * Realiza o login do usuário
 *
 * @package Sysytem
 * @since 0.1
 */
class LoginModel extends MainModel
{
	/**
	 * Construtor
	 *
	 * Carrega o a conexão com o banco de dados
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
	 * user_login 
	 *
	 * Faz o login do usuário
	 *
	 * @since 0.1
	 * @access public
	 */
	public function user_login()
	{
		// DEBUG
		/*
		echo 'request method';
		var_dump( $_SERVER['REQUEST_METHOD'] );

		echo 'post';
		var_dump( $_POST );
		*/
		if (  'POST' == $_SERVER['REQUEST_METHOD'] && ! empty( $_POST ) )
		{
			foreach ( $_POST as $key => $value)
			{
				$this->form_data[$key] = $value;

				// Se algum campo estiver vazio retorne uma mensagem de erro
				if ( empty( $value ) )
				{
					$this->form_msg = '<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
					É necessário inserir o login e a senha</div>';

					return;
				}
			}

			// Se não houver nenhuma informação na propriedade $form_data encerra o código
			if ( empty( $this->form_data ) )
			{
				return;
			}

			$user = $this->form_data['user'];
			
			// DEBUG
			/*
			echo 'user';
			var_dump( $user );
			*/

			if ( ! empty( $user ) )
			{
				$db_check_user = $this->db->query( 'SELECT * FROM `users` WHERE `user` = ?', array( $user ) );

				// Verifica se a consulta foi realizada com sucesso
				if ( ! $db_check_user )
				{
					$this->form_msg = '<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Erro interno, Entre em contato com o administrador.</div>';
				
					return;
				}
				else
				{
					$fetch_user = $db_check_user->fetch();

					if ( $this->form_data['user_password'] == $fetch_user['user_password'] )
					{
						//$_SESSION['user_name'] = $this->form_data['user_name'];
						$_SESSION['user_name'] = $user;

						// Redireciona para a página home
						$path = HOME_URI . '/home';
						header( "Location: {$path}" );
					}
					else
					{
						$this->form_msg = '<div class="alert alert-danger fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Dados de login incorretos.</div>';

						return;
					}
				}
			}
		}
	}

	/**
	 * user_logout
	 *
	 * Faz o logout do usuário
	 *
	 * @since 0.1
	 * @access public
	 */
	public function user_logout()
	{
		session_destroy();

		$path = HOME_URI . '/login';
		header( "Location: {$path}" );
	}
}