<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Sepomex as SepomexModel;

class Sepomex extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exists = Storage::disk('public')->exists('sepomex.txt');
        if($exists) {
            $contents = Storage::disk('public')->get('sepomex.txt');
            $contentArray = explode("\n", $contents);
            unset($contentArray[0]);
            unset($contentArray[1]);
            echo "This gonna take some minutes... grab a cup of coffe \n";
            foreach($contentArray as $key => $row) {
                $row_array = explode("|", $row); 
                $sepomexModel = new SepomexModel;
                $sepomexModel->d_codigo = utf8_encode($row_array[0]);
                $sepomexModel->d_asenta = utf8_encode($row_array[1]);
                $sepomexModel->d_tipo_asenta = utf8_encode($row_array[2]);
                $sepomexModel->D_mnpio = utf8_encode($row_array[3]);
                $sepomexModel->d_estado = utf8_encode($row_array[4]);
                $sepomexModel->d_ciudad = utf8_encode($row_array[5]);
                $sepomexModel->c_estado = utf8_encode($row_array[6]);
                $sepomexModel->c_oficina = utf8_encode($row_array[7]);
                $sepomexModel->c_CP = utf8_encode($row_array[8]);
                $sepomexModel->c_tipo_asenta = utf8_encode($row_array[9]);
                $sepomexModel->c_mnpio = utf8_encode($row_array[10]);
                $sepomexModel->id_asenta_cpcons = utf8_encode($row_array[11]);
                $sepomexModel->d_zona = utf8_encode($row_array[12]);
                $sepomexModel->c_cve_ciudad = utf8_encode($row_array[13]);
                $sepomexModel->save();
            }
        }

    }
}
