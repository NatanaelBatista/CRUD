<?php

/**
 * MainModel
 *
 * Implementa as propriedades e métodos usados pelos models
 *
 * @package SystemMVC
 * @since 0.1
 */
class MainModel
{
	/**
	 * $form_data
	 *
	 * Dados do formulário de envio
	 *
	 * @access public
	 */
	public $form_data;

	/**
	 * $form_msg
	 *
	 * Mensagem de feedback para o usuário
	 *
	 * @access public
	 */
	public $form_msg;

	/**
	 * $db
	 *
	 * O objeto da conexão PDO
	 *
	 * @access public
	 */
	public $db;
}