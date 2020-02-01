<?php

use PHPUnit\Framework\TestCase;

final class TargomanTest extends TestCase
{
    public function testTargoman()
    {
        require_once __DIR__.'/../targoman.php';
        $this->assertEquals('گیلاس', targoman('cherry'));
    }
}
