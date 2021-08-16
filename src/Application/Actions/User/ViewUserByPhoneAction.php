<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;

class ViewUserByPhoneAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $phone = (string)$this->resolveArg('phone');
        $user = $this->userRepository->findUserByPhone($phone);

        $this->logger->info("User of phone `${phone}` was viewed.");

        return $this->respondWithData($user);
    }
}
