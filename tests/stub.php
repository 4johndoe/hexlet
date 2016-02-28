<?php

// BEGIN
    private $builder;

    public function setUp()
    {
        $stub = $this->getMockBuilder('App\LoggerInterface')
            ->setMethods(['info', 'debug'])
            ->getMock();

        $this->builder = new Builder($stub);
    }

    public function testBuilderWithoutDebug()
    {
        $this->assertTrue($this->builder->build());
    }

    public function testBuilderWithDebug()
    {
        $this->assertTrue($this->builder->build(true));
    }
    // END
//
// $sender = new Sender();
// $worker = new Worker($sender);
// $worker->perform($data);

// namespace Theory;
//
// class Sender
// {
//   public function send() {
//     return false;
//   }
// }
// // stub
// // mock == stub + ...
// function setUp() {
//   $this->stub = $this->getMockBuilder('Sender')
//               ->setMethods(['send'])
//               ->getMock();
// }
// function testStub() {
//   $this->stub->method('send')
//         ->willReturn(true);
//   $this->assertTrue($this->stub->send());
// }
// function testStub2() {
//   $this->stub->method('send')
//         ->will($this->returnArgument(0));
//   $this->assertEquals('foo', $this->stub->send('foo'));
//   $this->assertEquals('bar', $this->stub->send('bar'));
// }
