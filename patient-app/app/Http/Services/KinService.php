<?php
namespace App\Http\Services;

use App\Console\Contracts\IKinService;
use App\Http\Repositories\KinRepository;
use App\Models\Kin;

class KinService implements IKinService
{
    /**
     * @var KinRepository
     */
    private KinRepository $repository;

    /**
     * @param KinRepository $repository
     */
    public function __construct(KinRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $datas
     * 
     * @return Kin
     */
    public function create(array $datas): Kin
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