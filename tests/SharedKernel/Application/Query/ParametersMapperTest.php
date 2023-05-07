<?php

namespace SharedKernel\Application\Query;

use PHPUnit\Framework\TestCase;

class ParametersMapperTest extends TestCase
{

    public function testValidMapper()
    {
        $map = [
            'title' => 'blog.title.value',
            'author' => 'blog.author.name',
        ];
        $mapper = new ParametersMapper($map);
        static::assertEquals('blog.title.value', $mapper->getMappedField('title'));
        static::assertEquals('blog.author.name', $mapper->getMappedField('author'));
    }

    public function testInvalidMapperKey()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid map key');
        $map = [
            'title' => 'blog.title.value',
            '' => 'blog.author.name',
        ];
        new ParametersMapper($map);
    }

    public function testInvalidMapperValue()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid map value');
        $map = [
            'title' => '',
            'author' => 'blog.author.name',
        ];
        new ParametersMapper($map);
    }

    public function testInvalidField()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid map field');
        $map = [
            'title' => 'blog.title.value',
            'author' => 'blog.author.name',
        ];
        $mapper = new ParametersMapper($map);
        $mapper->getMappedField('movie');
    }
}
