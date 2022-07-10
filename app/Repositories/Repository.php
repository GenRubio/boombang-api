<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;

/**
 * Class Repository
 * @package App\Repositories
 */
class Repository implements RepositoryInterface
{
    /**
     * @var Model
     */
    private $model;

    /**
     * Repository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @param Model $model
     */
    public function setModel(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int
    {
        return $this->model->destroy($id);
    }

    /**
     * @param int $id
     * @return Model
     */
    public function find(int $id): Model
    {
        if (is_null($post = $this->model->find($id))) {
            throw new ModelNotFoundException('Model not found', 400);
        }

        return $post;
    }

    /**
     * @param int $pagination
     * @return array
     */
    public function paginate(int $pagination): array
    {
        return $this->model->paginate($pagination)->items();
    }

    /**
     * @param string $column
     * @param string $like
     * @return Collection
     */
    public function whereLike(string $column, string $like): Collection
    {
        return collect($this->model->all())->filter(function ($item) use ($column, $like) {
            return false !== stristr($item->{$column}, $like);
        });
    }
}
