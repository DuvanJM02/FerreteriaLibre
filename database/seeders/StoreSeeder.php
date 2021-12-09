<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $store = new Store();

        $store->name = 'Ferrer';
        $store->description = 'La mejor ferreteria de tu vida';
        $store->location = 'El Pozón';
        $store->phone = 3124455454;
        $store->email = 'ferrer@ferreterialibre.com';

        $store->save();
    }
}
