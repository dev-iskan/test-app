<?php
declare(strict_types=1);

namespace App\Domain\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

use JsonSerializable;

/** @ODM\Document */
class User implements JsonSerializable
{
    /**
     * @ODM\Id
     */
    private ?int $id;

    /**
     * @ODM\Field(type="string")
     */
    private string $firstName;

    /**
     * @ODM\Field(type="string")
     */
    private string $lastName;

    /**
     * @ODM\Field(type="string")
     */
    private string $phone;

    /**
     * @ODM\Field (type="collection")
     */
    private array $roles;

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $phone
     * @param array $roles
     */
    public function __construct(?int $id, string $firstName, string $lastName, string $phone, array $roles = [])
    {
        $this->id = $id;
        $this->firstName = ucfirst($firstName);
        $this->lastName = ucfirst($lastName);
        $this->phone = $phone;
        $this->roles = $roles;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'phone' => $this->phone,
            'roles' => $this->roles
        ];
    }
}
