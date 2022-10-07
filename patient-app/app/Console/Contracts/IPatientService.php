<?php
namespace App\Console\Contracts;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Collection;

interface IPatientService
{
    /**
     * @param array $datas
     * 
     * @return Patient
     */
    public function create(array $datas): Patient;

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
     * @return Patient|null
     */
    public function byPatientId(int $id): ?Patient;

    /**
     * @param int $id
     * 
     * @return Collection
     */
    public function list(): Collection;
}