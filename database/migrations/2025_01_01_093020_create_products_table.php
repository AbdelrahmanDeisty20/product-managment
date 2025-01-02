<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('description');
			$table->string('image');
			$table->decimal('price');
			$table->decimal('quantity');
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}