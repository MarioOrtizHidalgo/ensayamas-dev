<?php

namespace Src\admin\band\domain\entities;

final class Band
{

    private ?int $id;
    private string $name;
    private string $location;
    private string $inviteCode;

    public function __construct(?int $id, string $name, string $location, string $inviteCode)
    {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
        $this->inviteCode = $inviteCode;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getInviteCode(): string
    {
        return $this->inviteCode;
    }

    public function setInviteCode(string $inviteCode): void
    {
        $this->inviteCode = $inviteCode;
    }

}