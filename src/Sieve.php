<?php declare(strict_types=1);

namespace Erathostenes;

use Erathostenes\Exception\SieveException;

final class Sieve
{
    /**
     * Array of prime numbers.
     *
     * @var int[]
     */
    private array $primes = [];

    /**
     * @param int $limit The superior limit of prime numbers to find.
     */
    public function __construct(private int $limit = 0)
    {
    }

    public function getPrimeNumbers(): array
    {
        if ($this->primes === []) {
            $this->populate();
        }

        return $this->primes;
    }

    public function setLimit(int $number): void
    {
        $this->limit = $number;
    }

    /**
     * Populates the prime numbers array.
     */
    private function populate(): void
    {
        for ($i = 2; $i <= $this->limit; $i++) {
            $found = false;
            foreach ($this->primes as $value) {
                if ($i % $value === 0) {
                    $found = true;
                    break;
                }
            }
            if ($found === false && !in_array($i, $this->primes)) {
                $this->primes[] = $i;
            }
        }
    }
}
