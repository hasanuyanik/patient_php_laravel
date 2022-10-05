<?php
namespace App\Http\Repositories;

use App\Models\Patient;

class PatientRepository
{

    /**
     * @param array $datas
     * 
     * @return Patient
     */
    public function create(array $datas): Patient
    {
        return Patient::create($datas);
    }

    /**
     * @param int $id
     * @param array $datas
     * 
     * @return mixed
     */
    public function update(int $id, array $datas)
    {
        return Patient::where(['id' => $id])->update($datas);
    }

    /**
     * @param int $id
     * 
     * @return bool
     */
    public function delete(int $id): bool
    {
        return Patient::where(['id' => $id])->delete();
    }

}