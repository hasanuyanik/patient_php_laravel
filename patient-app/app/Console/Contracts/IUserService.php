<?php
namespace App\Console\Contracts;

use App\Models\User;

interface IUserService
{
    /**
     * @param array $datas
     * 
     * @return User
     */
    public function create(array $datas): User;

    /**
     * @param int $id
     * @param array $datas
     * 
     * @return mixed
     */
    public function update(int $id, array $datas);

    /**
     * @param int $id
     * 
     * @return bool
     */
    public function delete(int $id): bool;
}