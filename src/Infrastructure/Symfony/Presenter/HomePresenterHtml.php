<?php
declare(strict_types=1);

namespace Infrastructure\Symfony\Presenter;

use Domain\UseCase\Home\Presenter\HomePresenterInterface;
use Domain\UseCase\Home\Response\HomeResponseDto;
use Twig\Environment;

class HomePresenterHtml implements HomePresenterInterface
{
    public function __construct(private Environment $twig)
    {
    }

    public function present(HomeResponseDto $homeResponseDto)
    {
        return $this->twig->render('home/index.html.twig',[
            'homeResponseDto'=>$homeResponseDto
        ]);
    }
}