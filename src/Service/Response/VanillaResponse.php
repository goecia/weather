<?php

namespace App\Service\Response;

use Symfony\Component\HttpFoundation\Response;
use App\Service\Contract\CustomResponseInterface;

final class VanillaResponse extends Response implements CustomResponseInterface
{
    public function formatResponse(array $payload): Response
    {
        $this->headers->set('Content-Type', 'application/json');
        $this->setStatusCode(200);

        $response = [
            'success' => true,
            'status' => $this->getStatusCode(),
            'message' => $this->statusText,
            'response' => $payload
        ];

        $this->setContent(json_encode($response));
        return $this;
    }
}
