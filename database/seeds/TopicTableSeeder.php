<?php

use Illuminate\Database\Seeder;

class TopicTableSeeder extends Seeder
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
                'name'=>'Programming',
                'note'=>'Programming',
                
                
            ),
            array(
                'title'=>'Networking',
                'description'=>'Networking',
                
                
            ),
            array(
                'title'=>'Professional Practice',
                'Professional Practice',
                
                
            ),
            array(
                'title'=>'Database Design & Development',
                'description'=>'Database Design & Development',
               
               
            ),
            array(
                'title'=>'Security',
                'description'=>'Security',
               
               
            ),
            array(
                'title'=>'Managing a Successful Computing Project',
                'description'=>'Managing a Successful Computing Project',
               
               
            ),
            array(
                'title'=>'Software Development Life Cycle',
                'description'=>'Software Development Life Cycle',
               
               
            ),
            array(
                'title'=>'Business Intelligence',
                'description'=>'Business Intelligence',
               
               
            ),
            array(
                'title'=>'Cloud computing',
                'description'=>'Cloud computing',
               
               
            ),
            array(
                'title'=>'Data Structures & Algorithms',
                'description'=>'Data Structures & Algorithms',
               
               
            ),
            array(
                'title'=>'Advanced Programming',
                'description'=>'Advanced Programming',
               
               
            ),
            array(
                'title'=>'Cloud computing',
                'description'=>'Cloud computing',
               
               
            ),
            array(
                'title'=>'Internet of Things',
                'description'=>'Internet of Things',
               
               
            ),
            array(
                'title'=>'Application Development',
                'description'=>'Application DevelopmentCloud computing',
               
               
            ),
            array(
                'title'=>'Computing Research Project',
                'description'=>'Computing Research Project',
               
               
            ),
        );
         DB::table('topics')->insert($data);
    }
}
