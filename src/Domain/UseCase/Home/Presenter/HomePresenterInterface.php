<?php

namespace Domain\UseCase\Home\Presenter;

use Domain\UseCase\Home\Response\HomeResponseDto;

interface HomePresenterInterface
{
    public function present(HomeResponseDto $homeResponseDto);
}