<?php

class IndexTest extends TestCase
{
    public function testIndexOk()
    {
        $modelMock = $this->getMockBuilder(\App\Poultry::class)->disableOriginalConstructor()->setMethods(["getAll", "photoUrl"])->getMock();
        $modelMock->expects($this->once())->method("getAll")->willReturn([]);
        $this->app->instance(\App\Poultry::class, $modelMock);

        $this->get('/');
        $this->assertResponseOk();
    }
}
