<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Store;
use App\Product;
use App\Inventory;

class FetchInventories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:inventories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Apple inventories';

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
        // Fetching Apple inventory from .env URL
        $url = env('STOCK_URL');
        $fetchedStock = json_decode(file_get_contents($url));
        foreach ($fetchedStock as $storeCode => $productStocks) {
            $_store = Store::where('code', $storeCode)->first();

            // if we don't have store code for this stock, we ignore it
            if (!$_store) {
                continue;
            }
            foreach ($productStocks as $productCode => $productStock) {
                $_product = Product::where('code', $productCode)->first();
                if (!$_product) {
                    continue;
                }
                $productStock = $productStock == 'ALL' ? 1 : 0;

                $_inventory = Inventory::where([
                    ['store_id', '=', $_store->id],
                    ['product_id', '=', $_product->id],
                ])->get()->first();

                if ($_inventory) {
                    // inventory already exist
                    if ($_inventory->inventory != $productStock) {
                        // update stock
                        $_inventory->inventory = $productStock;
                        // notify subscriber

                    }
                } else {
                    // create new inventory
                    Inventory::create([
                        'product_id' => $_product->id,
                        'store_id'   => $_store->id,
                        'inventory'  => $productStock,
                    ]);

                    if ($productStock) {
                        // notify subscriber
                        // not sure if we need to do this
                    }
                }
            }
        }
    }
}
