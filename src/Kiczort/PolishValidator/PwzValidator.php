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
 * @author Michał Mleczko <kontakt@michalmleczko.waw.pl>
 */
class PwzValidator implements ValidatorInterface
{

    /**
     * @param mixed $value
     * @param array $options
     * @return bool
     */
    public function isValid($value, $options = array())
    {
        if (null === $value || '' === $value) {
            return true;
        }

        $canonical = str_replace(' ', '', $value);

        if (strlen($canonical) != 7)
            return false;

        if (!preg_match('/^[1-9]\d+$/', $canonical))
            return false;

        preg_match('/^(?P<sum>[1-9])(?P<digits>\d{6})$/', $canonical, $matches);

        $sum = 0;
        foreach (str_split($matches['digits']) as $pos => $val) {
            $sum += $val * ($pos + 1);
        }

        $sum %= 11;

        if ($sum != $matches['sum']) {

            return false;
        }

        return true;
    }
}