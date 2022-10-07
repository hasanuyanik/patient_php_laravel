<?php
namespace App\Http\Repositories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Collection;

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

    /**
     * @param int $id
     * 
     * @return Patient|null
     */
    public function byPatientId(int $id): ?Patient
    {
        return Patient::with(['person', 'kin', 'medical' => function ($query) { $query->orderBy('type'); }])->where(['id' => $id])->first();
    }

    /**
     * @param int $id
     * 
     * @return Collection
     */
    public function list(): Collection
    {
        return Patient::with(['person', 'kin', 'medical' => function ($query) { $query->orderBy('type'); }])->get();
    }
}