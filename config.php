<?php 

// Diretório atual do arquivo
define( 'ABSPATH', dirname( __FILE__ ) );

// Endereço
define( 'HOME_URI', 'http://localhost/system' );

// Define se irá exibir as mensagens de erro
define( 'DEBUG', true );

// Chama o arquivo loader.php que irá carregar toda a página
require_once ABSPATH . '/loader.php';