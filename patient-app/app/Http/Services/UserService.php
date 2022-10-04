<?php
namespace App\Http\Services;

use App\Console\Contracts\IUserService;
use App\Http\Repositories\UserRepository;
use App\Models\User;

class UserService implements IUserService
{
    /**
     * @var UserRepository
     */
    private UserRepository $repository;

    /**
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $datas
     * 
     * @return User
     */
    public function create(array $datas): User
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