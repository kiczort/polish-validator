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

use Kiczort\PolishValidator\ValidatorInterface;
use Symfony\Component\Yaml\Parser;

/**
 * @author Grzegorz Koziński <gkozinski@gmail.com>
 */
abstract class ValidatorTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @return ValidatorInterface
     */
    protected abstract function getValidator();

    /**
     * @param mixed $input
     * @param bool $isValid
     * @param array $options
     *
     * @dataProvider getDataProviderFromYaml
     */
    public function testValidation($input, $isValid, $options = array())
    {
        $validator = $this->getValidator();
        $result = $validator->isValid($input, $options);

        $this->assertInternalType('bool', $result);
        $this->assertEquals($isValid, $result);
    }

    /**
     * @param string $rootName
     * @return array
     */
    public function getDataProviderFromYaml($rootName = '')
    {
        $yamlFile = $this->getDataProviderYamlPath() . $this->getYamlName();

        return $this->getDataFromYamlFile($yamlFile, $rootName);
    }

    /**
     * @return string
     */
    private function getDataProviderYamlPath()
    {
        $reflection = new \ReflectionClass(get_class($this));

        return dirname($reflection->getFileName()) . '/DataProvider/';
    }

    /**
     * @return string
     */
    private function getYamlName()
    {
        $class = get_class($this);
        preg_match('/^.+\\\([^\\\]+)Test$/', $class, $matches);
        $fileName = preg_replace(
            '/(?!^)[[:upper:]][[:lower:]]/', '$0',
            preg_replace('/(?!^)[[:upper:]]+/', '_$0', $matches[1])
        );

        return strtolower($fileName) . '.yml';
    }

    /**
     * @param string $yamlFile
     * @param string $rootName
     * @return array
     * @throws \Exception
     */
    private function getDataFromYamlFile($yamlFile, $rootName = '')
    {
        if (!file_exists($yamlFile)) {
            throw new \Exception('Yaml file "' . $yamlFile . '" doesn\'t exist!');
        }

        $yaml = new Parser();
        $data = $yaml->parse(file_get_contents($yamlFile));

        return empty($rootName) ? $data : $data[$rootName];
    }
}
