<?php namespace SimpleCms\User;

use Illuminate\Database\Eloquent\Model;
use SimpleCms\Core\AbstractEloquentRepository;

class EloquentRepository extends AbstractEloquentRepository implements RepositoryInterface {

  /**
   * @var Model
   */
  protected $model;

  /**
   * Construct
   *
   * @param Illuminate\Database\Eloquent\Model $model
   */
  public function __construct(Model $model)
  {
    $this->model = $model;
  }

}