<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Domain\User\User;
use Psr\Http\Message\ResponseInterface as Response;

class CreateUserAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        //validate data

        $user = new User(
            id: $this->getFormData()->id,
            firstName: $this->getFormData()->firstName,
            lastName: $this->getFormData()->lastName,
            phone: $this->getFormData()->phone,
            roles: $this->getFormData()->roles
        );

//        $dm->persist($user);
//        $this->logger->info("User of id `${userId}` was viewed.");
//
//        return $this->respondWithData($user);
    }
}
