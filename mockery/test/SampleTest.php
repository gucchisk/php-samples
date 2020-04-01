<?php

require_once('vendor/autoload.php');

use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
  public function tearDown(): void
  {
    \Mockery::close();
  }

  public function testPublicMethod()
  {
    $sample = new \MockerySample\Cls(1);
    $this->assertEquals(4, $sample->publicMethod(1, 2));

    $mock = \Mockery::mock('MockerySample\Cls');
    $mock->shouldReceive('publicMethod')->with(1, 2)->andReturn(5);
    $this->assertEquals(5, $mock->publicMethod(1, 2));

    // partial mock
    $partialMock = \Mockery::mock(\MockerySample\Cls::class)->makePartial();
    $this->assertEquals(4, $partialMock->callPublic());
  }

  public function testStaticMethod()
  {
    $mock = \Mockery::mock('alias:'.\MockerySample\ClsStatic::class);
    $mock->shouldReceive('publicStaticMethod')->andReturn(5);
    // cannot create static partial mock
    $mock->shouldReceive('publicStaticmethodSub')->andReturn(1);
    $sample = new \MockerySample\Cls(1);
    $this->assertEquals(6, $sample->callStatic());
  }
}
