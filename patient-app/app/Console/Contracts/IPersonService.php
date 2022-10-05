<?php
namespace App\Console\Contracts;

use App\Models\Person;

interface IPersonService
{
    /**
     * @param array $datas
     * 
     * @return Person
     */
    public function create(array $datas): Person;

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

    /**
     * @param string $idCard
     * 
     * @return Person
     */
    public function byIdCard(string $idCard): Person;
}