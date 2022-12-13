<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data=array(
            array(
                'title'=>'Computing',
                'description'=>'Computing',
                
                
            ),
            array(
                'title'=>'Graphic Design',
                'description'=>'Graphic Design',
                
                
            ),
            array(
                'title'=>'Business',
                'description'=>'Business',
                
                
            ),
            
        );
         DB::table('categories')->insert($data);
    }
}
