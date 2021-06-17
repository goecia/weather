<?php

namespace App\Service\Contract;

use Symfony\Component\HttpFoundation\Response;

interface CustomResponseInterface
{
    public function formatResponse(array $payload): Response;
}
