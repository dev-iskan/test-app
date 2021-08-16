<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;

use App\Domain\User\User;
use App\Domain\User\UserNotFoundException;
use App\Domain\User\UserRepository;

class InMemoryUserRepository implements UserRepository
{
    /**
     * @var User[]
     */
    private $users;

    /**
     * InMemoryUserRepository constructor.
     *
     * @param array|null $users
     */
    public function __construct(array $users = null)
    {
        $this->users = $users ?? [
                1 => new User(1, 'Bill', 'Gates', '444552223341', ['superadmin', 'admin']),
                2 => new User(2, 'Steve', 'Jobs', '444552223342', ['user']),
                3 => new User(3, 'Mark', 'Zuckerberg', '444552223343', ['admin', 'user']),
                4 => new User(4, 'Evan', 'Spiegel', '444552223344', ['user']),
                5 => new User(5, 'Jack', 'Dorsey', '444552223345', ['admin', 'user']),
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->users);
    }

    /**
     * {@inheritdoc}
     */
    public function findUserOfId(int $id): User
    {
        if (!isset($this->users[$id])) {
            throw new UserNotFoundException();
        }

        return $this->users[$id];
    }

    /**
     * {@inheritdoc}
     */
    public function findUserByPhone(string $phone): User
    {
        $found_users = array_filter($this->users, function ($user) use ($phone) {
            return $user->getPhone() === $phone;
        });

        if (empty($found_users)) {
            throw new UserNotFoundException();
        }

        return reset($found_users);
    }
}
