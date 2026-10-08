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
        Schema::create('autok', function (Blueprint $table) {
            $table->id("auto_id");
            $table->foreignId("kategoria_id")->references("kategoria_id")->on("kategoriak");
            $table->string("tipus",100);
            $table->string("rendszam",10)->unique();
            $table->integer("napi_ar");
            $table->boolean("elerheto")->default(1);
            $table->date("rogzites_datuma")->useCurrent();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autok');
    }
};
