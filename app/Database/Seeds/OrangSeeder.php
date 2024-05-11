<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class OrangSeeder extends Seeder
{
    public function run()
    {

        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 100; $i++) {
            $data = [
                'blog_title' => $faker->name,
                'blog_description' => $faker->address,
                'created_at' => Time::createFromDate($faker->unixTime()),
                'updated_at' => Time::now(),
            ];

            $this->db->table('orang')->insert($data);
        }
    }
}
