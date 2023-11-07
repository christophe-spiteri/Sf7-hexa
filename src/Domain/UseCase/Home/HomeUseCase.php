<?php
declare(strict_types=1);

namespace Domain\UseCase\Home;

use Domain\UseCase\Home\Request\HomeRequestDto;
use Domain\UseCase\Home\Response\HomeResponseDto;
use Symfony\Component\Clock\ClockInterface;
use Symfony\Component\Clock\DatePoint;

class HomeUseCase
{
    public function __construct(private ClockInterface $clock)
    {
    }

    public function execute(HomeRequestDto $homeRequestDto): HomeResponseDto
    {
        $laDate = new datePoint(reference: $this->clock->now());
        // $laDate =$this->clock->now();
        $response = new HomeResponseDto();
        try {
            $response->setMessage(sprintf($homeRequestDto->message, $laDate->format('d/m/Y H:i')));
            return $response;
        } catch (\Exception $exception) {
            $response->setError('Il y a une erreur');
            $response->setStatut($exception);
        }
        return $response;
    }
}