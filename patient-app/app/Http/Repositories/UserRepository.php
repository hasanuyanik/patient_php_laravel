<?php
namespace App\Http\Repositories;

use App\Models\User;

class UserRepository
{

    /**
     * @param array $datas
     * 
     * @return User
     */
    public function create(array $datas): User
    {
        return User::create($datas);
    }

    /**
     * @param int $id
     * @param array $datas
     * 
     * @return mixed
     */
    public function update(int $id, array $datas)
    {
        return User::where(['id' => $id])->update($datas);
    }

    /**
     * @param int $id
     * 
     * @return bool
     */
    public function delete(int $id): bool
    {
        return User::where(['id' => $id])->delete();
    }

}