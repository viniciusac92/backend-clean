<?php

namespace Tests\Unit\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Validation\DomainValidation;
use PHPUnit\Framework\TestCase;
use Throwable;

class DomainValidationUnitTest extends TestCase 
{
    public function testNotNull (): void {
        try {

            $value = '';
            DomainValidation::notNull($value);
        } catch (Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);
        }
    }

    public function testNotNullCustomMessageException (): void {
        try {
            /**
             * @var string $message
             */
            $message = 'custom message';

            $value = '';
            DomainValidation::notNull($value, $message);
        } catch (Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th, $message);
        }
    }

    public function testStrMaxLength (): void {
        try {
            /**
             * @var string $message
             */
            $message = 'custom message';
            $value = 'Teste';
            DomainValidation::strMaxLength($value, 3, $message);
        } catch (Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th, $message);
        }
    }

    public function testStrMinLength (): void {
        try {
            /**
             * @var string $message
             */
            $message = 'custom message';
            $value = 'Teste';
            DomainValidation::strMinLength($value, 8, $message);
        } catch (Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th, $message);
        }
    }

    public function testStrCanNullAndMaxLength (): void {
        try {
            /**
             * @const string $message
             */
            $message = 'custom message';
            $value = 'Teste';
            DomainValidation::strCanNullAndMaxLength($value, 3, $message);
        } catch (Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th, $message);
        }
    }
}