<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code');
            $table->enum('status', ['draft', 'trash', 'published']);
            $table->string('imported_t')->nullable();
            $table->text('url')->nullable();
            $table->string('creator')->nullable();
            $table->string('created_t')->nullable();
            $table->string('last_modified_t')->nullable();
            $table->string('product_name')->nullable();
            $table->string('quantity')->nullable();
            $table->string('brands')->nullable();
            $table->text('categories')->nullable();
            $table->string('labels')->nullable();
            $table->string('cities')->nullable();
            $table->text('purchase_places')->nullable();
            $table->string('stores')->nullable();
            $table->text('ingredients_text')->nullable();
            $table->text('traces')->nullable();
            $table->string('serving_size')->nullable();
            $table->float('serving_quantity')->nullable();
            $table->integer('nutriscore_score')->nullable();
            $table->string('nutriscore_grade')->nullable();
            $table->string('main_category')->nullable();
            $table->string('image_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
