<?php
namespace App\Console\Contracts;

use App\Models\Medical;

interface IMedicalService
{
    /**
     * @param array $datas
     * 
     * @return Medical
     */
    public function create(array $datas): Medical;

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