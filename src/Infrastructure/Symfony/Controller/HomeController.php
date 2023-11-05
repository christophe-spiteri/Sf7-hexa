<?php

namespace Infrastructure\Symfony\Controller;

use Domain\UseCase\Home\HomeUseCase;
use Domain\UseCase\Home\Request\HomeRequestDto;
use Infrastructure\Symfony\Presenter\Home\HomePresenterHtml;
use Infrastructure\Symfony\Presenter\Home\HomePresenterJson;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/html', name: 'app_home')]
    public function home_html(HomeUseCase $homeUseCase,HomePresenterHtml $homePresenter): Response
    {
        $homeRequestDto=new HomeRequestDto('Nous sommes le %s');
        $homeResponseDto=$homeUseCase->execute($homeRequestDto);

        return new Response($homePresenter->present($homeResponseDto));
    }

    #[Route('/json', name: 'app_homeJson')]
    public function home_json(HomeUseCase $homeUseCase,HomePresenterJson $homePresenter): JsonResponse
    {
        $homeRequestDto=new HomeRequestDto('Nous sommes le %s');
        $homeResponseDto=$homeUseCase->execute($homeRequestDto);

        return new JsonResponse($homePresenter->present($homeResponseDto));
    }
}
