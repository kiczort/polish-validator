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
class PeselValidator implements ValidatorInterface
{
    /**
     * @param mixed $value
     * @param array $options
     * @return bool
     */
    public function isValid($value, $options = array())
    {
        if (! $this->fulfillBasicCriteria($value)) {
            return false;
        }

        if ($this->isStrict($options)) {
            return $this->hasProperChecksum($value);
        }

        return true;
    }

    /**
     * @param mixed $value
     * @return bool
     */
    private function fulfillBasicCriteria($value)
    {
        $pattern = '/^(?P<year>[\d]{2})(?P<month>[\d]{2})(?P<day>[\d]{2})[\d]{5}$/';
        if (! preg_match($pattern, $value, $matches)) {
            return false;
        }

        if ($matches['month'] >= 1 && $matches['month'] <= 12) {
            $year = 1900 + $matches['year'];
            $month = $matches['month'];
        } elseif ($matches['month'] >= 21 && $matches['month'] <= 32) {
            $year = 2000 + $matches['year'];
            $month = $matches['month'] - 20;
        } elseif ($matches['month'] >= 41 && $matches['month'] <= 52) {
            $year = 2100 + $matches['year'];
            $month = $matches['month'] - 40;
        } elseif ($matches['month'] >= 61 && $matches['month'] <= 72) {
            $year = 2200 + $matches['year'];
            $month = $matches['month'] - 60;
        } elseif ($matches['month'] >= 81 && $matches['month'] <= 92) {
            $year = 1800 + $matches['year'];
            $month = $matches['month'] - 80;
        } else {
            return false;
        }

        return checkdate($month, $matches['day'], $year);
    }

    /**
     * @param $options
     * @return bool
     */
    private function isStrict($options)
    {
        return isset($options['strict']) && $options['strict'];
    }

    /**
     * @param $value
     * @return bool
     */
    private function hasProperChecksum($value)
    {
        $chars = str_split($value);
        $sum = array_sum(array_map(function($weight, $digit) {
            return $weight * $digit;
        }, array(1,3,7,9,1,3,7,9,1,3), array_slice($chars, 0, 10)));

        $rest = $sum % 10;
        $checksum = ($rest == 0) ? $rest : 10 - $rest;

        return $checksum == $chars[10];
    }
}
