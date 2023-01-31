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

use Kiczort\PolishValidator\PeselValidator;
use Kiczort\PolishValidator\ValidatorInterface;

/**
 * @author Grzegorz Koziński <gkozinski@gmail.com>
 */
class PeselValidatorTest extends ValidatorTestCase
{
    protected function getValidator(): ValidatorInterface
    {
        return new PeselValidator();
    }

    protected function getData(): array
    {
        return [
            'too_short'           => [12314, false],
            'wrong_date'          => [12314111111, false],
            'wrong_date2'         => [55813211111, false],
            'none_digits_chars'   => ['123a41f1111', false],
            'proper_date'         => [55813111111, true],
            'wrong_checksum'      => [44051401358, false, ['strict' => true]],
            'wrong_checksum_pass' => [44051401358, true],
            'proper_checksum'     => [44051401359, true, ['strict' => true]],
        ];
    }
}
