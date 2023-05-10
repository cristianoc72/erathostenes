<?php declare(strict_types=1);

use Erathostenes\Sieve;

test('getPrimeNumbers method', function () {
    $sieve = new Sieve(100);
    expect($sieve->getPrimeNumbers())->toBe(getPrimeNumbersArray());
});

test('Limit', function () {
    $sieve = new Sieve(97);
    expect($sieve->getPrimeNumbers())->toBe(getPrimeNumbersArray());
});

test('Test lower limnits', function (int $limit, array $result) {
    $sieve = new Sieve($limit);
    expect($sieve->getPrimeNumbers())->toBe($result);
})->with([
    [0, []],
    [1, []],
    [2, [2]],
    [3, [2, 3]]
]);
