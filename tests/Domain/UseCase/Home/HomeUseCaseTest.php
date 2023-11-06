<?php

namespace Domain\UseCase\Home;

use Domain\UseCase\Home\Request\HomeRequestDto;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Clock\MockClock;

class HomeUseCaseTest extends TestCase
{
    public function testUseCaseHome()
    {
        $clock = new MockClock('2022-11-16 15:20:00');

        $HomeUseCase = new HomeUseCase($clock);
        $homeRequestDto = new HomeRequestDto('Il est %s');
        $homeResponseDto = $HomeUseCase->execute($homeRequestDto);
        $this->assertEquals('Il est 16/11/2022 15:20', $homeResponseDto->getMessage());
    }
}
