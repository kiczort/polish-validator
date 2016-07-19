<?php

/*
 * This file is part of the Polish Validator package.
 *
 * (c) Grzegorz Koziński
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kiczort\PolishValidator;

/**
 * @author Grzegorz Koziński <gkozinski@gmail.com>
 */
class NipValidator implements ValidatorInterface
{
    /**
     * @param mixed $value
     * @param array $options
     * @return bool
     */
    public function isValid($value, $options = array())
    {
        if (! preg_match('/^[\d]{10}$/', $value) || '0000000000' == $value) {
            return false;
        }

        $chars = str_split($value);
        $sum = array_sum(array_map(function($weight, $digit) {
            return $weight * $digit;
        }, array(6, 5, 7, 2, 3, 4, 5, 6, 7), array_slice($chars, 0, 9)));

        $checksum = $sum % 11;

        return $checksum == $chars[9];
    }
}
