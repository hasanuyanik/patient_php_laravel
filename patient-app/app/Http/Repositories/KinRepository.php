<?php
namespace App\Http\Repositories;

use App\Models\Kin;
use Illuminate\Database\Eloquent\Collection;

class KinRepository
{

    /**
     * @param array $datas
     * 
     * @return Kin
     */
    public function create(array $datas): Kin
    {
        return Kin::create($datas);
    }

    /**
     * @param int $id
     * @param array $datas
     * 
     * @return mixed
     */
    public function update(int $id, array $datas)
    {
        return Kin::where(['id' => $id])->update($datas);
    }

    /**
     * @param array $datas
     * 
     * @return bool
     */
    public function delete(array $datas): bool
    {
        return Kin::where($datas)->delete();
    }

    /**
     * @param string $idCard
     * 
     * @return Collection
     */
    public function byIdCard(string $idCard): Collection
    {
            return Kin::with(['person'])->where(['id_card' => $idCard])->get();        
    }

    /**
     * @param string $idCard
     * 
     * @return Collection
     */
    public function byKinIdCard(string $idCard): Collection
    {
            return Kin::with(['person'])->where(['kin_id_card' => $idCard])->get();        
    }

}