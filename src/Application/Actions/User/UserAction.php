<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Application\Actions\Action;
use App\Domain\User\UserRepository;
use Doctrine\ODM\MongoDB\DocumentManager;
use Psr\Log\LoggerInterface;

abstract class UserAction extends Action
{
    protected UserRepository $userRepository;

    protected DocumentManager $dm;

    /**
     * @param LoggerInterface $logger
     * @param UserRepository $userRepository
     * @param DocumentManager $dm
     */
    public function __construct(LoggerInterface $logger,
                                UserRepository $userRepository,
                                DocumentManager $dm
    )
    {
        parent::__construct($logger);
        $this->userRepository = $userRepository;
        $this->dm = $dm;
    }
}
