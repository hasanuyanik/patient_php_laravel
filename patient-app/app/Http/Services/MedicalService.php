<?php
namespace App\Http\Services;

use App\Console\Contracts\IMedicalService;
use App\Http\Repositories\MedicalRepository;
use App\Models\Medical;

class MedicalService implements IMedicalService
{
    /**
     * @var MedicalRepository
     */
    private MedicalRepository $repository;

    /**
     * @param MedicalRepository $repository
     */
    public function __construct(MedicalRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $datas
     * 
     * @return Medical
     */
    public function create(array $datas): Medical
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
}