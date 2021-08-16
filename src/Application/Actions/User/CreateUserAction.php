<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;

class CreateUserAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
//        $this->logger->info("User of id `${userId}` was viewed.");
//
//        return $this->respondWithData($user);
    }
}
