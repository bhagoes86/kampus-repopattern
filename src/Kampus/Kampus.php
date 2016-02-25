<?php

/*
 * Step - 5
 */
namespace Odenktools\Kampus;

use Illuminate\Support\Facades\Config;
use Odenktools\Kampus\Contracts\Repositories\MahasiswaRepository;

/**
 * Kampus Singleton Class
 */
class Kampus
{
    /**
     * Laravel application
     *
     * @var \Illuminate\Foundation\Application
     */
    public $app;

    /**
     * \Odenktools\Kampus\Contracts\Repositories\MahasiswaRepository
     */
    protected $mahasiswaRepository;

    /**
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     * @param \Odenktools\Kampus\Contracts\Repositories\MahasiswaRepository $mahasiswaRepository
     */
    public function __construct($app, MahasiswaRepository $mahasiswaRepository = null)
    {
        $this->app = $app;
        $this->mahasiswaRepository = $mahasiswaRepository;
    }

    /**
     * @param $class
     * @return mixed
     */
    protected function createModel($class)
    {
        $model = new $class;
        return $model;
    }

    /**
     * @todo
     *
     * @return \Odenktools\Kampus\Repositories\Eloquent\AbstractEloquentRepository
     */
    public function getMahasiswaModel()
    {
        return $this->mahasiswaRepository;
    }
}