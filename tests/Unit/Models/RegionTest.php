<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\Support\EntitiesHelper;

class RegionTest extends TestCase
{
    use EntitiesHelper;

    public function testCanFind()
    {
        $this->initEntities();

        $this->assertTrue(!empty($this->regionModel->find(1)->toArray()));
    }

    public function testHasState()
    {
        $this->initEntities();

        $this->assertTrue(count($this->regionModel->find(1)->italian_states()->get())> 0);
    }

}