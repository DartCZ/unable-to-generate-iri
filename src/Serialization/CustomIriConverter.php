<?php

declare(strict_types=1);

namespace App\Serialization;

use ApiPlatform\Api\IriConverterInterface;
use ApiPlatform\Api\UrlGeneratorInterface;
use ApiPlatform\Metadata\Operation;

class CustomIriConverter implements IriConverterInterface
{
    public function __construct(private readonly IriConverterInterface $decorated)
    {
    }

    /**
     * @param array<mixed> $context
     */
    public function getResourceFromIri(string $iri, array $context = [], ?Operation $operation = null): object
    {
        return $this->decorated->getResourceFromIri($iri, $context, $operation);
    }

    /**
     * @param array<mixed> $context
     */
    public function getIriFromResource(mixed $resource, int $referenceType = UrlGeneratorInterface::ABS_PATH, ?Operation $operation = null, array $context = []): ?string
    {
        if (isset($context['operation'], $context['operation']->getExtraProperties()['iri']) && $context['operation']->getExtraProperties()['iri'] === false) {
            return null;
        }

        return $this->decorated->getIriFromResource($resource, $referenceType, $operation, $context);
    }
}
