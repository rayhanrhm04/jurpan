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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category_id");
            $table->string("service_name");
            $table->text("description");
            $table->string("price");
            $table->string("profit");
            $table->string("min");
            $table->string("max");
            $table->string("provider_sid");
            $table->string("type");
            $table->string("status");
            $table->timestamps();
            $table->foreign("category_id")->references("id")->on("categories")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
