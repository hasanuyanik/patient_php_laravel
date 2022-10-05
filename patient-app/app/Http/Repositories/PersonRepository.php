<?php
namespace App\Http\Repositories;

use App\Models\Person;

class PersonRepository
{

    /**
     * @param array $datas
     * 
     * @return Person
     */
    public function create(array $datas): Person
    {
        return Person::create($datas);
    }

    /**
     * @param int $id
     * @param array $datas
     * 
     * @return mixed
     */
    public function update(int $id, array $datas)
    {
        return Person::where(['id' => $id])->update($datas);
    }

    /**
     * @param int $id
     * 
     * @return bool
     */
    public function delete(int $id): bool
    {
        return Person::where(['id' => $id])->delete();
    }

}