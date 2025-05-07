<?php
session_start();
// Define constantes para o caminho
define('BASE_PATH', __DIR__);
define('APP_PATH', BASE_PATH . '/app');

// Captura a URL e divide em partes
$url = isset($_GET['url']) ? $_GET['url'] : 'princesa/list';
$urlParts = explode('/', trim($url, '/'));

// Define o controlador e a ação padrão
$controllerName = ucfirst($urlParts[0]) . 'Controller';
$action = $urlParts[1] ?? 'list';

// Verifica se o controlador existe
$controllerFile = APP_PATH . '/controllers/' . $controllerName . '.php';
if (!file_exists($controllerFile)) {
    die('Controlador não encontrado.');
}

// Carrega o controlador e executa a ação
require_once $controllerFile;
$controller = new $controllerName();
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    die('Ação não encontrada.');
}
