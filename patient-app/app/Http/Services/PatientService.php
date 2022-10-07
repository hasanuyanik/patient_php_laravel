<?php
namespace App\Http\Services;

use App\Console\Contracts\IPatientService;
use App\Http\Repositories\PatientRepository;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Collection;

class PatientService implements IPatientService
{
    /**
     * @var PatientRepository
     */
    private PatientRepository $repository;

    /**
     * @param PatientRepository $repository
     */
    public function __construct(PatientRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $datas
     * 
     * @return Patient
     */
    public function create(array $datas): Patient
    {
        return $this->repository->create($datas);
    }

    /**
     * @param int $id
     * @param array $datas
     * 
     * @return mixed
     */
    public function update(int $id, array $datas)
    {
        return $this->repository->update($id, $datas);
    }

    /**
     * @param int $id
     * 
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

    /**
     * @param int $id
     * 
     * @return Patient|null
     */
    public function byPatientId(int $id): ?Patient
    {
        return $this->repository->byPatientId($id);
    }

    /**
     * @param int $id
     * 
     * @return Collection
     */
    public function list(): Collection
    {
        return $this->repository->list();
    }
}