<?php
namespace Test;
use PHPUnit\Framework\TestCase;
use Src\Foo;
class FooTest extends TestCase
{
    public function test1()
    {
        $objFoo = new Foo();
        $output = $objFoo->sum( 2,3 );
        $expected_output = 5;

        //assertEquals: so sánh bằng nhau
        $this->assertEquals($output,$expected_output);
    }

    public function test2()
    {
        $objFoo = new Foo();
        $output = $objFoo->sum( 100,1000 );
        $expected_output = 1100;

        //assertEquals: so sánh bằng nhau
        $this->assertEquals($output,$expected_output);
    }
}