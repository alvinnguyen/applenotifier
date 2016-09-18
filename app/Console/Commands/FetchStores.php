<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Store;

class FetchStores extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:stores';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Apple Stores';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Fetching Apple store from .env URL
        $url = env('STORE_URL');
        $fetchedStores = json_decode(file_get_contents($url))->stores;
        foreach ($fetchedStores as $fetchedStore) {
            $storeNotExist = sizeof(Store::where('store_code', $fetchedStore->storeNumber)) != 0;
            if ($storeNotExist) {
                Store::create([
                    'code' => $fetchedStore->storeNumber,
                    'name' => $fetchedStore->storeName,
                    'country' => $fetchedStore->storeCity,
                ]);
            }
        }
    }
}
