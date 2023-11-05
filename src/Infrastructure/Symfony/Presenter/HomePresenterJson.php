<?php
declare(strict_types=1);

namespace Infrastructure\Symfony\Presenter;

use Domain\UseCase\Home\Presenter\HomePresenterInterface;
use Domain\UseCase\Home\Response\HomeResponseDto;

class HomePresenterJson implements HomePresenterInterface
{
    public function present(HomeResponseDto $homeResponseDto)
    {
        return json_encode(['message'=>$homeResponseDto->getMessage(),'statut'=>$homeResponseDto->getStatut(),'error'=>$homeResponseDto->getError()]);
    }
}