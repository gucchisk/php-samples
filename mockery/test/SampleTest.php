<?php
require_once('vendor/autoload.php');
use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase {
    public function testHello() {
        $sample = new MockerySample\Cls();
        $this->assertEquals('hello', $sample->hello());
    }
    public function testWorld() {
        $sample = new MockerySample\ClsA();
        $this->assertEquals('hello', $sample->world());
    }
}

