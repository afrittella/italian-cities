<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\Support\EntitiesHelper;

class PostalCodeTest extends TestCase
{
    use EntitiesHelper;

    public function testCanFind()
    {
        $this->initEntities();

        $this->assertTrue(!empty($this->postalCodeModel->find(1)->toArray()));
    }

    public function testBelongsToCity()
    {
        $this->initEntities();

        $this->assertTrue(!empty($this->postalCodeModel->find(1)->italian_city()->get()));
    }

}