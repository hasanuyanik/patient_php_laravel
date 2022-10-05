<?php
namespace App\Http\Services;

use App\Console\Contracts\IPersonService;
use App\Http\Repositories\PersonRepository;
use App\Models\Person;

class PersonService implements IPersonService
{
    /**
     * @var PersonRepository
     */
    private PersonRepository $repository;

    /**
     * @param PersonRepository $repository
     */
    public function __construct(PersonRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $datas
     * 
     * @return Person
     */
    public function create(array $datas): Person
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