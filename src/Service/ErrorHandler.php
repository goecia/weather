<?php

namespace App\Service;

use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use App\Service\Contract\CustomResponseInterface;

class ErrorHandler
{
    private CustomResponseInterface $errorResponse;
    private ParameterBagInterface $config;

    public function __construct(CustomResponseInterface $errorResponse, ParameterBagInterface $config)
    {
        $this->errorResponse = $errorResponse;
        $this->config = $config;
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        // Initialize parameters.
        $exception = $event->getThrowable();
        $payload = [
            'message' => $exception->getMessage(),
            'http_status_code' => 400
        ];

        $response = $this->errorResponse->formatResponse($payload);
        $event->setResponse($response);
    }
}
