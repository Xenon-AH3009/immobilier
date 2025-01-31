<?php


use app\controllers\ClientController;

use flight\Engine;
use flight\net\Router;
//use Flight;

/** 
 * @var Router $router 
 * @var Engine $app
 */
/*$router->get('/', function() use ($app) {
	$Welcome_Controller = new WelcomeController($app);
	$app->render('welcome', [ 'message' => 'It works!!' ]);
});*/
$Client_Controller=new ClientController();
//connection
$router->get('/',[$Client_Controller,'pageHome']);
$router->get('/loginClientByTel',[$Client_Controller,'loginByTelPage']);
$router->get('/loginClientByMail',[$Client_Controller,'loginByMailPage']);
$router->post('/traitementLogin',[$Client_Controller,'traitementLogin']);
$router->get('/signup',[$Client_Controller,'signupPage']);
$router->post('/traitementSignup',[$Client_Controller,'traitementSignup']);

//home
$router->get('/homeClient',[$Client_Controller,'pageHome']);
$router->get('/rechercheDescr',[$Client_Controller,'rechercheDescr']);
$router->get('/deconnect',[$Client_Controller,'deconnection']);

//detail
$router->get('/details/@id:[0-9]+',[$Client_Controller,'getDetails']);
$router->post('/insertionReservation/@idhabitation:[0-9]+',[$Client_Controller,'insertionReservation']);

/*$Welcome_Controller = new WelcomeController();
$router->get('/', [ $Welcome_Controller, 'home' ]); 
$router->get('/homedb', [ $Welcome_Controller, 'homedb' ]); 
$router->get('/testdb', [ $Welcome_Controller, 'testdb' ]); 
$router->get('/home-template', [ $Welcome_Controller, 'homeTemplate' ]); 
$router->get('/product-template', [ $Welcome_Controller, 'productTemplate' ]);*/ 


//$router->get('/', \app\controllers\WelcomeController::class.'->home'); 

