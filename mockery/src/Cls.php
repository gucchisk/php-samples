<?php
namespace MockerySample;

class Cls
{
  private int $i;
  public function __construct(int $arg)
  {
    $i = $arg;
  }
  public function callStatic(): int
  {
    return ClsStatic::publicStaticMethod() + ClsStatic::publicStaticMethodSub();
  }
  public function callPrivate(): int
  {
    return privateMethod() + 1;
  }
  public function callPublic(): int
  {
    return $this->publicMethod(1, 2);
  }
  public function publicMethod(int $a, int $b): int
  {
    return $a * 2 + $b;
  }
  private function privateMethod(): int
  {
    return 4;
  }
}

class ClsA
{
  public function world(): string
  {
    return "world";
  }
}
