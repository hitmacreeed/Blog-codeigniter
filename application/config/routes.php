<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['(:any)'] = 'posts/view';//--> route para post ou seja basta chamar 

$route['post'] = 'posts/index'; //--> route para post ou seja basta chamar blog/post = post/index

//chamar pargina pages/view e trazer o index a frente paginal de introducao -index
$route['default_controller'] = "pages/view";

//codigo pata trazer a paginas up tipo cd/ para frente de todas main folder do site
$route['(:any)'] = 'pages/view/$1';

$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;


/* End of file routes.php */
/* Location: ./application/config/routes.php */
