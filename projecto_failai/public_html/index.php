<?php

use Mod\Controllers\KontaktaiController;
use Mod\Authenticator;
use Mod\Controllers\AdminController;
use Mod\Controllers\PradziaController;
use Mod\Exceptions\UnauthenticatedException;
use Mod\Exceptions\ElementNotFound;
use Mod\FS;
use Mod\Output;
use Mod\HtmlRender;
use Mod\Router;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Mod\Controllers\PortfolioController;


require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . "/../vendor/larapack/dd/src/helper.php";

//dd('asd');
$log = new Logger('Portfolios');
$log->pushHandler(new StreamHandler('../logs/klaidos.log', Logger::WARNING));

$output = new Output();

try {
    session_start();

//    // Autentifikuojam vartotoja, tikrinam jo prisijungimo busena
//    $authenticator = new Authenticator();
//    $authenticator->authenticate($_POST['username'] ?? null, $_POST['password'] ?? null);

    $router = new Router();
    $router->addRoute('GET', '', [new PradziaController(), 'index']);
    $router->addRoute('GET', 'admin', [new AdminController(), 'index']);
    $router->addRoute('GET', 'kontaktai', [new KontaktaiController(), 'index']);
    $router->addRoute('GET', 'portfolio', [new PortfolioController(), 'index']);
    $router->run();

} catch (\Mod\Exceptions\PageNotFoundException $e) {
    $output->store('Neradau puslapio');
    $log->warning($e->getMessage());
} catch (UnauthenticatedException $e) {
    $output->store('Neteisingi prisijungimo duomenys');
    $log->warning($e->getMessage());
} catch (ElementNotFound $e) {
        $output->store('Kilo klaida templeite.');
        $log->warning($e->getMessage());
} catch (Exception $e) {
    $output->store('Oi nutiko klaida! Bandyk vėliau dar karta.');
    $log->error($e->getMessage());
}

// Spausdinam viska kas buvo 'Storinta' Output klaseje
$output->print();