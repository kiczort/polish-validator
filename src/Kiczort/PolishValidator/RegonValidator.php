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
 * RegonValidator
 * @author Grzegorz Koziński <gkozinski@gmail.com>
 */
class RegonValidator implements ValidatorInterface
{
    /**
     * @param mixed $value
     * @param array $options
     * @return bool
     */
    public function isValid($value, $options = array())
    {
        if (! preg_match('/^([\d]{9}|[\d]{14})$/', $value)) {
            return false;
        }

        if (strlen($value) == 9) {
            return $this->hasProperChecksumForShort($value);
        } else {
            return $this->hasProperChecksumForLong($value);
        }
    }

    /**
     * @param $value
     * @return bool
     */
    private function hasProperChecksumForShort($value)
    {
        $chars = str_split($value);
        $sum = array_sum(array_map(function($weight, $digit) {
            return $weight * $digit;
        }, array(8, 9, 2, 3, 4, 5, 6, 7), array_slice($chars, 0, 8)));

        $checksum = $sum % 11;

        return $checksum % 10 == $chars[8];
    }

    /**
     * @param $value
     * @return bool
     */
    private function hasProperChecksumForLong($value)
    {
        $chars = str_split($value);
        $sum = array_sum(array_map(function($weight, $digit) {
            return $weight * $digit;
        }, array(2, 4, 8, 5, 0, 9, 7, 3, 6, 1, 2, 4, 8), array_slice($chars, 0, 13)));

        $checksum = $sum % 11;

        return $checksum % 10 == $chars[13];
    }
}
