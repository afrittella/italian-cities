<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\Support\EntitiesHelper;

class CityTest extends TestCase
{
    use EntitiesHelper;

    public function testCanFind()
    {
        $this->initEntities();

        $this->assertTrue(!empty($this->cityModel->find(1)->toArray()));
    }

    public function testbelongsToState()
    {
        $this->initEntities();

        $this->assertTrue(count($this->cityModel->find(1)->italian_state()->get()) > 0);
    }

    public function testFindByPostalCode()
    {
        $this->initEntities();

        $this->assertTrue(!empty($this->cityModel->getByItalianPostalCode('67039')->first()));
    }

}