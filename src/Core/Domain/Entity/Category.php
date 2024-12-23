<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MethodsMagicsTrait as TraitsMethodsMagicsTrait;
use Core\Domain\Validation\DomainValidation;
use Core\Domain\ValueObject\Uuid;
use DateTime;

class Category
{
    use TraitsMethodsMagicsTrait;

    public function __construct(
        protected Uuid | string $id = '',
        protected string $name = '',
        protected string $description = '',
        protected bool $isActive = true,
        protected DateTime | string $createdAt = '',
    ){

        $this->id = $this->id ? new Uuid($this->id) : Uuid::random();

        $this->createdAt = $this->createdAt ? new Datetime($this->createdAt) : new DateTime();

        $this->validate();
    }

    public function activate(): void{
        $this->isActive = true;
    }

    public function disable(): void{
        $this->isActive = false;
    }

    public function update(string $name, string $description = ''): void{
        $this->name = $name;
        $this->description = $description;

        $this->validate();
    }

    private function validate(): void{
        DomainValidation::notNull($this->name);
        DomainValidation::strMaxLength($this->name);
        DomainValidation::strMinLength($this->name);
        
        DomainValidation::strCanNullAndMaxLength($this->description);
    }
}