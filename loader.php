<?php 

// Não deverá ser chamada diretamente
if ( ! defined( 'ABSPATH' ) ) exit;

session_start();

// Verifica se deverá ou não exibir mensagens de erro
if ( ! defined( 'DEBUG' ) || DEBUG === false )
{
	error_reporting( 0 );
	ini_set( 'display_errors', 0 );
}
else
{
	error_reporting( E_ALL );
	ini_set( 'display_errors', 1 );
}

// Funções que serão muito utilizadas
require_once ABSPATH . '/functions/global-functions.php';

// Chama o arquivo que irá através do modelo MVC carregar toda a página
$system_mvc = new SystemMVC();