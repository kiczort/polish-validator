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

use Kiczort\PolishValidator\ValidatorInterface;
use PHPUnit\Framework\TestCase;

/**
 * @author Grzegorz Koziński <gkozinski@gmail.com>
 */
abstract class ValidatorTestCase extends TestCase
{
    abstract protected function getValidator(): ValidatorInterface;
    abstract protected function getData(): array;

    /**
     * @param mixed $input
     * @param bool $isValid
     * @param array $options
     *
     * @dataProvider getData
     */
    public function testValidation($input, $isValid, $options = array()): void
    {
        $validator = $this->getValidator();
        $result = $validator->isValid($input, $options);

        $this->assertSame($isValid, $result);
    }
}
