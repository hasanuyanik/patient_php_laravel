<?php
namespace App\Http\Repositories;

use App\Models\Medical;
use App\Models\Person;
use Exception;

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

    /**
     * @param string $idCard
     * 
     * @return Person
     */
    public function byIdCard(string $idCard): Person
    {
            return Person::where(['id_card' => $idCard])->first();        
    }

}