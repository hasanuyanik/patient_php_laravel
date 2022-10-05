<?php
namespace App\Http\Repositories;

use App\Models\Kin;

class KinRepository
{

    /**
     * @param array $datas
     * 
     * @return Kin
     */
    public function create(array $datas): Kin
    {
        return Kin::create($datas);
    }

    /**
     * @param int $id
     * @param array $datas
     * 
     * @return mixed
     */
    public function update(int $id, array $datas)
    {
        return Kin::where(['id' => $id])->update($datas);
    }

    /**
     * @param int $id
     * 
     * @return bool
     */
    public function delete(int $id): bool
    {
        return Kin::where(['id' => $id])->delete();
    }

}