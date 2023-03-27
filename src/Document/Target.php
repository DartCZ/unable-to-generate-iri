<?php

declare(strict_types=1);

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
#[ODM\EmbeddedDocument]
class Target
{
    #[ODM\Field(type: 'string')]
    public string $type;

    #[ODM\ReferenceOne(nullable: true, storeAs: 'id', targetDocument: Section::class)]
    public ?Section $section = null;
}
