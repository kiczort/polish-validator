<?php

/*
 * This file is part of the Polish Validator package.
 *
 * (c) Grzegorz Koziński
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Kiczort\PolishValidator;

use Kiczort\PolishValidator\RegonValidator;
use Kiczort\PolishValidator\ValidatorInterface;

/**
 * @author Grzegorz Koziński <gkozinski@gmail.com>
 */
class RegonValidatorTest extends ValidatorTestCase
{
    protected function getValidator(): ValidatorInterface
    {
        return new RegonValidator();
    }

    protected function getData(): array
    {
        return [
            'too_short'         => [12345678, false],
            'too_long'          => [123456789012345, false],
            'wrong_lenght'      => [1234567890, false],
            'wrong_lenght2'     => [12345678901, false],
            'wrong_lenght3'     => [123456789012, false],
            'wrong_lenght4'     => [1234567890123, false],
            'none_digits_chars' => ['12345678a', false],
            'wrong_checksum'    => [123456786, false],
            'wrong_checksum2'   => [12345678512346, false],
            'wrong_checksum3'   => [12346678512347, false],
            'proper_checksum'   => [123456785, true],
            'proper_checksum2'  => [12345678512347, true],
            'proper_checksum3'  => [251890090, true],
            'proper_checksum4'  => [55678259078290, true],
        ];
    }
}
