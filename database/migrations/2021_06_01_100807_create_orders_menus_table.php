<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_menus', function (Blueprint $table) {
            // $table->id();
            $table->primary(['order_id', 'menu_id']);
            $table->foreignId('order_id')->reference('id')->on('orders')
                    ->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('menu_id')->reference('id')->on('menus')
                    ->onUpdate('cascade')->onDelete('set null');
            $table->integer('quantity')->unsigned();
                            
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
        Schema::dropIfExists('orders_menus');
    }
}
