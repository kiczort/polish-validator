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

use Kiczort\PolishValidator\PwzValidator;
use Kiczort\PolishValidator\ValidatorInterface;

/**
 * @author Michał Mleczko <kontakt@michalmleczko.waw.pl>
 */
class PwzValidatorTest extends ValidatorTestCase
{
    /**
     * @return PwzValidator
     */
    protected function getValidator(): ValidatorInterface
    {
        return new PwzValidator();
    }

    protected function getData(): array
    {
        return [
            'empty'           => ['', true],
            'null'            => [null, true],
            'too_short'       => [123123, false],
            'too_long'        => [12312333, false],
            'wrong_checksum'  => [123456786, false],
            'proper_checksum' => [9559813, true],
        ];
    }
}
