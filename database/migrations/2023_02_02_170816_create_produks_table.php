<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_barang');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('satuan_id');
            $table->unsignedBigInteger('supplier_id');
            $table->string('pcs')->nullable();
            $table->integer('stok')->nullable();
            $table->integer('harga')->nullable();
            $table->string('gambar')->nullable();
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('Cascade');
            $table->foreign('satuan_id')->references('id')->on('satuans')->onDelete('Cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('Cascade');
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
        Schema::dropIfExists('produks');
    }
}
