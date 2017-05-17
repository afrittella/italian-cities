<?php

namespace Tests\Unit\Support;

trait EntitiesHelper
{
    protected $regionModel = 'Afrittella\ItalianCities\Domain\Models\ItalianRegion';
    protected $stateModel = 'Afrittella\ItalianCities\Domain\Models\ItalianState';
    protected $cityModel = 'Afrittella\ItalianCities\Domain\Models\ItalianCity';
    protected $postalCodeModel = 'Afrittella\ItalianCities\Domain\Models\ItalianPostalCode';

    public function setUp()
    {
        parent::setUp();

        $this->regionModel = app()->make($this->regionModel);
        $this->stateModel = app()->make($this->stateModel);
        $this->cityModel = app()->make($this->cityModel);
        $this->postalCodeModel = app()->make($this->postalCodeModel);
    }

    protected function createRegion()
    {
        return $this->regionModel->create([
            'code' => '001',
            'name' => 'Abruzzo'
        ]);
    }

    protected function createState()
    {
        return $this->stateModel->create([
            'italian_region_id' => 1,
            'code' => 'AQ',
            'code_metro' => '001',
            'is_metropolitan' => 0,
            'name' => "L'Aquila",
            'abbreviation' => 'AQ'
        ]);
    }

    protected function createCity()
    {
        return $this->cityModel->create([
            'italian_state_id' => 1,
            'is_chieftown' => 1,
            'code_istat' => '012345',
            'code_cadastre' => 'I804',
            'name' => 'Sulmona'
        ]);
    }

    protected function createPostalCode()
    {
        return $this->postalCodeModel->create([
           'italian_city_id' => 1,
            'code' => '67039'
        ]);
    }

    protected function initEntities()
    {
        $this->createRegion();
        $this->createState();
        $this->createCity();
        $this->createPostalCode();
    }
}