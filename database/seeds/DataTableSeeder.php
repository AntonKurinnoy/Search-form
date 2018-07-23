<?php

use App\Data;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = explode("\n",file_get_contents(resource_path()."/property-data.csv"));

        $n = count($a);
        for ($i=1;$i<$n;$i++){
            $line = explode("\t",$a[$i]);
            foreach ($line as $v)
                $data = explode(",",$v);

            $info = new Data;
            $info->Name = $data[0];
            $info->Price = $data[1];
            $info->Bedrooms = $data[2];
            $info->Bathrooms = $data[3];
            $info->Storeys = $data[4];
            $info->Garages = $data[5];

            $info->save();

        }
    }
}
