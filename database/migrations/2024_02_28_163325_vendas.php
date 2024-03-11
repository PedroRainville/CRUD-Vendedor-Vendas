<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_vendedor')->nullable();;
            $table->decimal('valor', 10, 2);
            $table->date('data_venda');
            $table->decimal('comissao', 8, 2)->nullable();
            $table->timestamps();

            $table->foreign('id_vendedor')->references('id')->on('vendedors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
