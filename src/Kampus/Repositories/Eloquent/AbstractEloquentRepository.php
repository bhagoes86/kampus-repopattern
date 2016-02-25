<?php

/*
 * Step - 2
 */
namespace Odenktools\Kampus\Repositories\Eloquent;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Model;

use Odenktools\Kampus\Contracts\Repositories\BaseRepoInterface;

/**
 * Ini Class Encapsulasi agar model dapat dipanggil dari luar package
 *
 * Tambahkan fungsi disini...
 *
 * Class AbstractEloquentRepository
 * @package Odenktools\Kampus\Repositories\Eloquent
 */
abstract class AbstractEloquentRepository implements BaseRepoInterface
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var Model|\Illuminate\Database\Eloquent\Builder
     */
    protected $model;

    /**
     * @param Application $app
     * @param Model $model
     */
    public function __construct(Application $app, Model $model)
    {
        $this->app = $app;
        $this->model = $model;
    }

    /**
     * Returns all from the current model.
     *
     * @return static
     */
    public function selectAll()
    {
        return $this->model->selectAll();
    }
}