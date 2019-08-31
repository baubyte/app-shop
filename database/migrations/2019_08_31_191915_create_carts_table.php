<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('order_date');//fecha para cuando se esta solicitando el pedido
            $table->date('arrived_date');//fecha para cuando llega por el Admin
            $table->string('status');//Actie(cuando esta en el carrito), Pending(cuando complero todos los detalles y pasa al Admin,Approved(Admin), Cancelled(Admin), Finished

            //FK user_id->Cliente
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('carts');
    }
}
