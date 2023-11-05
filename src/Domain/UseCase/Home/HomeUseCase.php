<?php
declare(strict_types=1);

namespace Domain\UseCase\Home;

use Domain\UseCase\Home\Request\HomeRequestDto;
use Domain\UseCase\Home\Response\HomeResponseDto;

class HomeUseCase
{
    public function execute(HomeRequestDto $homeRequestDto): HomeResponseDto
    {
        $laDate = new \DateTimeImmutable();

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