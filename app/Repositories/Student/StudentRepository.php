<?php

namespace App\Repositories\Student;

/**
 * Interface StudentRepository
 *
 * @package App\Repositories\Student
 * @author Hafiz Suhaimi <pisyek@gmail.com>
 * @copyright 2018 Pisyek Studios
 */
interface StudentRepository
{
    public function getAll();

    public function getById($id);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);
}
