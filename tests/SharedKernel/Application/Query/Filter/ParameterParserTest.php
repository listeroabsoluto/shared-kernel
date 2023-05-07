<?php

namespace SharedKernel\Application\Query\Filter;

use PHPUnit\Framework\TestCase;

/**
 *
 */
class ParameterParserTest extends TestCase
{

    public function testOperatorNotAllowed()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Operator not allowed');
        $subject = 'title{like}';
        $allowedOperators = ['title' => [Operator::Eq]];
        ParameterParser::extractFieldAndOperator($subject, $allowedOperators);
    }
}
