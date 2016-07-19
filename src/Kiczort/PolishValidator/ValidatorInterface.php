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
 * ValidatorInterface
 *
 * @author Grzegorz Koziński <gkozinski@gmail.com>
 */
interface ValidatorInterface
{
    /**
     * @param mixed $value
     * @param array $options
     * @return bool
     */
    public function isValid($value, $options = array());
}
