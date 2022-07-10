<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Interface RepositoryInterface
 * @package App\Repositories
 */
interface RepositoryInterface
{
    /**
     * @return Model
     */
    public function getModel(): Model;

    /**
     * @param Model $model
     */
    public function setModel(Model $model);

    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id);

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int;

    /**
     * @param int $id
     * @return Model
     */
    public function find(int $id): Model;

    /**
     * @param int $pagination
     * @return array
     */
    public function paginate(int $pagination): array;

    /**
     * @param string $column
     * @param string $like
     * @return Collection
     */
    public function whereLike(string $column, string $like): Collection;
}
