<?php

/*
 * This file is part of the Polish Validator package.
 *
 * (c) Grzegorz Koziński
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kiczort\PolishValidator\Tests;

use Kiczort\PolishValidator\NipValidator;

/**
 * @author Grzegorz Koziński <gkozinski@gmail.com>
 */
class NipValidatorTest extends ValidatorTestCase
{
    /**
     * @return NipValidator
     */
    protected function getValidator()
    {
        return new NipValidator();
    }
}
