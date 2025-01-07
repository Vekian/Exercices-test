<?php

use PHPUnit\Framework\TestCase;

class WeatherMonitorTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testCorrectAverageIsReturned()
    {
        $service = new TemperatureService();
        $weatherMonitor = new WeatherMonitor($service);
        $this->assertEquals(20, $weatherMonitor->getAverageTemperature('12/02/2024', '24/12/2024'));
    }

    public function testCorrectAverageIsReturnedWithMockery()
    {
        $serviceMock = Mockery::mock(TemperatureService::class);
        $serviceMock->shouldReceive('getTemperature')->times(2)->andReturn(20, 30);
        $weatherMonitor = new WeatherMonitor($serviceMock);
        $this->assertEquals(25, $weatherMonitor->getAverageTemperature('12/02/2024', '24/12/2024'));
    }
}
