<?php

namespace App\Service\Response;

use Symfony\Component\HttpFoundation\Response;
use App\Service\Contract\CustomResponseInterface;

final class ErrorResponse extends Response implements CustomResponseInterface
{
    /**
     * Formats given payload response into the standard AMCO error response.
     */
    public function formatResponse(array $payload): Response
    {
        $this->headers->set('Content-Type', 'application/json');
        $this->setStatusCode($payload['http_status_code']);

        $response = [
            'success' => false,
            'status' => $payload['http_status_code'],
            'message' => $this->statusText,
            'error' => $payload['message']
        ];

        $this->setContent(json_encode($response));
        return $this;
    }
}
