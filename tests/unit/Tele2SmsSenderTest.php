<?php

use Mockery as m;

class Tele2SmsSenderTest extends \PHPUnit\Framework\TestCase
{
    public function testCanCreateInstanceOfTele2SmsSenderTest(): void
    {
        $this->assertInstanceOf(
            'Tele2SmsSender',
            new Tele2SmsSender('test', 'secret', 'sender')
        );
    }

    public function testThrowErrorWhenCantSendSms(): void
    {
        $this->expectException(\Tele2SmsSender\Exceptions\NotSent::class);
        (new Tele2SmsSender('test', 'test', 'test'))->message('test', 'text');
    }
}
