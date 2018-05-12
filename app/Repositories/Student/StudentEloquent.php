<?php

namespace App\Repositories\Student;

use App\Student;

/**
 * Class StudentEloquent
 *
 * @package App\Repositories\Student
 * @author Hafiz Suhaimi <pisyek@gmail.com>
 * @copyright 2018 Pisyek Studios
 */
class StudentEloquent implements StudentRepository
{
    /**
     * @var Student
     */
    protected $model;

    /**
     * StudentServices constructor.
     *
     * @param Student $model
     */
    public function __construct(Student $model)
    {
        $this->model = $model;
    }

    /**
     * Get all record
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Get model by id
     *
     * @param int $id Student Id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Create a record
     *
     * @param array $attributes Student Data
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update a model
     *
     * @param int   $id         Student Id
     * @param array $attributes Student data
     * @return mixed
     */
    public function update($id, array $attributes)
    {
        $model = $this->getById($id);
        $model->update($attributes);
        return $model;
    }

    /**
     * Delete a model by id
     *
     * @param int $id Student Id
     * @return mixed
     */
    public function delete($id)
    {
        $model = $this->getById($id);
        $model->delete();
        return $model;
    }
}
