<?php
namespace App\Console\Contracts;

use App\Models\Kin;
use Illuminate\Database\Eloquent\Collection;

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
     * @param array $datas
     * 
     * @return bool
     */
    public function delete(array $datas): bool;

    /**
     * @param string $idCard
     * 
     * @return Collection
     */
    public function byIdCard(string $idCard): Collection;

    /**
     * @param string $idCard
     * 
     * @return Collection
     */
    public function byKinIdCard(string $idCard): Collection;
}