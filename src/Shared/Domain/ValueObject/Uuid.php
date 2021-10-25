<?php

declare(strict_types=1);

namespace Nemuru\Shared\Domain\ValueObject;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid extends StringValueObject
{
    public function __construct(protected string$value)
    {
        parent::__construct($value);
        $this->ensureIsValidUuid($value);
    }

    public static function random(): self
	{
		return new static(RamseyUuid::uuid4()->toString());
	}

	public static function from(string $value): static
	{
		return new static(RamseyUuid::fromString($value)->toString());
	}

	public static function v4(): static
	{
		return new static(RamseyUuid::uuid4()->toString());
	}

    private function ensureIsValidUuid(string $id): void
    {
        if (!RamseyUuid::isValid($id)) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $id));
        }
    }
}
