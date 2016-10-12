<?php 

// Verifica se a chave do array existe
function chk_array( $array, $kay )
{
	if ( isset( $array[ $kay ] ) && ! empty( $array[ $kay ] ) )
	{
		return $array[ $kay ];
	}

	return null;
}

// Carrega todas as classes localizadas na pasta classes
function __autoload( $class_name )
{
	$file = ABSPATH . '/classes/class-' . $class_name . '.php';

	if ( ! file_exists( $file ) )
	{
		require_once ABSPATH . '/includes/404.php';
		return;
	}

	require_once $file;
}