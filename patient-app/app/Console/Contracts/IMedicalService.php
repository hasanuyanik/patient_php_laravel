<?php
namespace App\Console\Contracts;

use App\Models\Medical;
use Illuminate\Database\Eloquent\Collection;

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

    /**
     * @param int $id
     * 
     * @return Collection
     */
    public function byPatientId(int $id): Collection;
}