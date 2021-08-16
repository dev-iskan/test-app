<?php
declare(strict_types=1);

use App\Application\Actions\User\CreateUserAction;
use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserByIdAction;
use App\Application\Actions\User\ViewUserByPhoneAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->post('', CreateUserAction::class);
        $group->get('', ListUsersAction::class);
        $group->get('/by-phone/{phone}', ViewUserByPhoneAction::class);
        $group->get('/{id}', ViewUserByIdAction::class);
    });
};
