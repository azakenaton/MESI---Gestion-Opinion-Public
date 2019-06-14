<?php

namespace App\Tests;

use App\Controller\testController;
use PHPUnit\Framework\TestCase;


class TextConnexionTest extends TestCase
{
    public function testSomething()
    {
        $testController = new testController();
        $result = $testController->index();
        $this->assertFalse(empty($result));
    }
}
