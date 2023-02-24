<?php

namespace App\Services\admin;

use App\Models\Store;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class StoreService
 * @package App\Services\admin
 */
class StoreService
{
    /**
     * @return Collection
     */
    public function getStores(): Collection
    {
        return Store::all();
    }

    /**
     * @param $request
     * @return Store
     */
    public function storeSave($request): Store
    {
        $store       = new Store;
        $store->name = $request->name;
        $store->save();

        return $store;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function storeUpdate($request): mixed
    {
        $store       = Store::find($request->store_id);
        $store->name = $request->name;
        $store->update();

        return $store;
    }

}
