<?php
namespace App\Http\Repositories;

use App\Models\Medical;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\ErrorHandler\Collecting;

class MedicalRepository
{

    /**
     * @param array $datas
     * 
     * @return Medical
     */
    public function create(array $datas): Medical
    {
        return Medical::create($datas);
    }

    /**
     * @param int $id
     * @param array $datas
     * 
     * @return mixed
     */
    public function update(int $id, array $datas)
    {
        return Medical::where(['id' => $id])->update($datas);
    }

    /**
     * @param int $id
     * 
     * @return bool
     */
    public function delete(int $id): bool
    {
        return Medical::where(['id' => $id])->delete();
    }

    /**
     * @param int $id
     * 
     * @return Collection
     */
    public function byPatientId(int $id): Collection
    {
        return Medical::where(['patient_id' => $id])->get()->groupBy('type');
    }

}