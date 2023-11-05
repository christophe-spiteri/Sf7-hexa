<?php
declare(strict_types=1);

namespace Domain\UseCase\Home\Request;

class HomeRequestDto
{
    public function __construct(public string $message)
    {
    }
}