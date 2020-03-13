<?php

use Illuminate\Database\Seeder;
use App\M_Stock;
use Carbon\Carbon;
class M_StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        M_Stock::insert([
            'm_id' => '1',
            'qty_balance' => '100',
            'created_at' => Carbon::now(),
        ]);
        M_Stock::insert([
            'm_id' => '2',
            'qty_balance' => '200',
            'created_at' => Carbon::now(),
        ]);
        M_Stock::insert([
            'm_id' => '3',
            'qty_balance' => '300',
            'created_at' => Carbon::now(),
        ]);
        M_Stock::insert([
            'm_id' => '4',
            'qty_balance' => '400',
            'created_at' => Carbon::now(),
        ]);
        M_Stock::insert([
            'm_id' => '5',
            'qty_balance' => '500',
            'created_at' => Carbon::now(),
        ]);
        M_Stock::insert([
            'm_id' => '6',
            'qty_balance' => '342',
            'created_at' => Carbon::now(),
        ]);
        M_Stock::insert([
            'm_id' => '7',
            'qty_balance' => '432',
            'created_at' => Carbon::now(),
        ]);
        M_Stock::insert([
            'm_id' => '8',
            'qty_balance' => '515',
            'created_at' => Carbon::now(),
        ]);
        M_Stock::insert([
            'm_id' => '9',
            'qty_balance' => '674',
            'created_at' => Carbon::now(),
        ]);
        M_Stock::insert([
            'm_id' => '10',
            'qty_balance' => '956',
            'created_at' => Carbon::now(),
        ]);
        M_Stock::insert([
            'm_id' => '11',
            'qty_balance' => '709',
            'created_at' => Carbon::now(),
        ]);
        M_Stock::insert([
            'm_id' => '12',
            'qty_balance' => '406',
            'created_at' => Carbon::now(),
        ]);
        M_Stock::insert([
            'm_id' => '13',
            'qty_balance' => '459',
            'created_at' => Carbon::now(),
        ]);
        M_Stock::insert([
            'm_id' => '14',
            'qty_balance' => '247',
            'created_at' => Carbon::now(),
        ]);
        M_Stock::insert([
            'm_id' => '15',
            'qty_balance' => '124',
            'created_at' => Carbon::now(),
        ]);
        M_Stock::insert([
            'm_id' => '16',
            'qty_balance' => '251',
            'created_at' => Carbon::now(),
        ]);
        M_Stock::insert([
            'm_id' => '17',
            'qty_balance' => '102',
            'created_at' => Carbon::now(),
        ]);
        M_Stock::insert([
            'm_id' => '18',
            'qty_balance' => '190',
            'created_at' => Carbon::now(),
        ]);
        M_Stock::insert([
            'm_id' => '19',
            'qty_balance' => '199',
            'created_at' => Carbon::now(),
        ]);
        M_Stock::insert([
            'm_id' => '20',
            'qty_balance' => '154',
            'created_at' => Carbon::now(),
        ]);
    }
}
