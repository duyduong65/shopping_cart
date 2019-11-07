<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alcoholBottle = new Product();
        $alcoholBottle->name = "Nếp cái hoa vàng";
        $alcoholBottle->price = 5;
        $alcoholBottle->origin = "Dương'House";
        $alcoholBottle->description = "rượu ngon chất lượng, khử độc, uống không đau đầu";
        $alcoholBottle->image = "upload/nep_cai_hoa_vang.jpg";
        $alcoholBottle->save();

        $alcoholBottle = new Product();
        $alcoholBottle->name = "Chuối hột";
        $alcoholBottle->price = 6;
        $alcoholBottle->origin = "Dương'House";
        $alcoholBottle->description = "rượu ngon chất lượng, khử độc, uống không đau đầu";
        $alcoholBottle->image = "upload/chuoi_hot.jpg";
        $alcoholBottle->save();

        $alcoholBottle = new Product();
        $alcoholBottle->name = "Ba kích";
        $alcoholBottle->price = 6;
        $alcoholBottle->origin = "Dương'House";
        $alcoholBottle->description = "rượu ngon chất lượng, khử độc, uống không đau đầu";
        $alcoholBottle->image = "upload/ba-kich.jpg";
        $alcoholBottle->save();
    }
}
