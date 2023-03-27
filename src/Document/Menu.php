<?php

declare(strict_types=1);

namespace App\Document;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\Document(
    collection: 'MenuTest'
)]
#[ApiResource(
    operations: [
        new Get(extraProperties: ['iri' => false]),
        new GetCollection(),
        new Post(),
    ]
)]
class Menu
{
    #[ODM\Id(type: 'int', strategy: 'INCREMENT')]
    public int $id;

    #[ODM\Field(type: 'string')]
    public string $name;

    #[ODM\EmbedOne(targetDocument: Target::class)]
    public Target $target;
}
