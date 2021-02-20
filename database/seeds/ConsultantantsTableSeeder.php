<?php

use Illuminate\Database\Seeder;

class ConsultantantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1 ;$i < 100; $i++){
            $data = [
                'ar' => [
                    'name' => 'Consaltunt '.$i,
                    'address' => 'address address address '.$i,
                    'bio' => 'bio bio bio bio bio bio '.$i,
                ],
                'en' => [
                    'name' => 'Consaltunt '.$i,
                    'address' => 'address address address '.$i,
                    'bio' => 'bio bio bio bio bio bio '.$i,
                ],

                'image' => 'default.pmg',
                'phone' => '01015960452'.$i,
                'experince' => 'experince experince experince ',
                'lat' => '123'.$i,
                'lng' => '321'.$i,
                'badge' => 'selected',
                'cost' => $i*3,
                'comession' => $i,
            ];
            \App\Consultantant::create($data);
        }

    }
}
