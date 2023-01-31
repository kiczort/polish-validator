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

use Kiczort\PolishValidator\NipValidator;
use Kiczort\PolishValidator\ValidatorInterface;

/**
 * @author Grzegorz Koziński <gkozinski@gmail.com>
 */
class NipValidatorTest extends ValidatorTestCase
{
    protected function getValidator(): ValidatorInterface
    {
        return new NipValidator();
    }

    protected function getData(): array
    {
        return [
            'too_short'         => [123456789, false],
            'too_long'          => [12345678901, false],
            'only_zeros'        => [0000000000, false],
            'none_digits_chars' => ['123456789a', false],
            'wrong_checksum'    => [1234563217, false],
            'proper_checksum'   => [1234563218, true],
        ];
    }
}
