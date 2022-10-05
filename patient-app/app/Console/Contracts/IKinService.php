<?php
namespace App\Console\Contracts;

use App\Models\Kin;

interface IKinService
{
    /**
     * @param array $datas
     * 
     * @return Kin
     */
    public function create(array $datas): Kin;

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