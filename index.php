<?php

/**
 * MINI-CLASSROOM ... 
 * PHP Project using MVC Design Pattern
 * For educationnal purpose!
 * 
 * ESTI Antanimena || Licence 1
 * 
 * Contributor :
 *     @Ryuka25 (lovanirina.ran@gmail.com)
 * 
 */

/** Some init for the web app */
require_once('global/init.php');

// ! ALL THINGS HAPPEN IN THE ROUTER

require_once('controllers/Router.php');

$router = new Router;
$router->routeRequest();