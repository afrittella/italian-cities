<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\Support\EntitiesHelper;

class StateTest extends TestCase
{
    use EntitiesHelper;

    public function testCanFind()
    {
        $this->initEntities();

        $this->assertTrue(!empty($this->stateModel->find(1)->toArray()));
    }

    public function testBelongsToRegion()
    {
        $this->initEntities();

        $this->assertTrue(!empty($this->stateModel->find(1)->italian_region()->get()));
    }

    public function testHasCities()
    {
        $this->initEntities();

        $this->assertTrue(!empty($this->stateModel->find(1)->italian_cities()->get()));
    }

}