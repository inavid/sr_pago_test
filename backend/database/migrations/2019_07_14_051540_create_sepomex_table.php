<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSepomexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sepomex', function (Blueprint $table) {
            $table->increments('id');
            $table->char('d_codigo', 100);	 
            $table->char('d_asenta', 100);	 
            $table->char('d_tipo_asenta', 100);	 
            $table->char('D_mnpio', 100);	 
            $table->char('d_estado', 100);
            $table->char('d_ciudad', 100);
            $table->char('c_estado', 100);
            $table->char('c_oficina', 100);
            $table->char('c_CP', 100);
            $table->char('c_tipo_asenta', 100);
            $table->char('c_mnpio', 100);
            $table->char('id_asenta_cpcons', 100);
            $table->char('d_zona', 100);
            $table->char('c_cve_ciudad', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sepomex');
    }
}
