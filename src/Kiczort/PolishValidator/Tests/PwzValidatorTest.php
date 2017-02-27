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

use Kiczort\PolishValidator\PwzValidator;

/**
 * @author Michał Mleczko <kontakt@michalmleczko.waw.pl>
 */
class PwzValidatorTest extends ValidatorTestCase
{
    /**
     * @return PwzValidator
     */
    protected function getValidator()
    {
        return new PwzValidator();
    }
}
