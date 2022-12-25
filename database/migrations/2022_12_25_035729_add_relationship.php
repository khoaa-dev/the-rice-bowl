<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->integer('villageId')->unsigned()->nullable();
            $table->foreign('villageId')->references('id')->on('villages');
        });

        Schema::table('food', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('food_categories');
        });

        Schema::table('menu_food', function (Blueprint $table) {
            $table->foreign('foodId')->references('id')->on('food');
            $table->foreign('menuId')->references('id')->on('menus');
        });

        Schema::table('menus', function (Blueprint $table) {
            $table->foreign('serviceId')->references('id')->on('services');
        });

        Schema::table('package_criterias', function (Blueprint $table) {
            $table->foreign('packageId')->references('id')->on('packages');
            $table->foreign('criteriaId')->references('id')->on('criterias');
        });

        Schema::table('packages', function (Blueprint $table) {
            $table->foreign('serviceId')->references('id')->on('services');
            $table->foreign('menuId')->references('id')->on('menus');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('roleId')->references('id')->on('roles');
            $table->foreign('villageId')->references('id')->on('villages');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('serviceId')->references('id')->on('services');
            $table->foreign('paymentId')->references('id')->on('payment_methods');
            $table->foreign('packageId')->references('id')->on('packages');
            $table->foreign('userId')->references('id')->on('users');

            // $table->renameColumn('status', 'statusId');
            $table->foreign('status')->references('id')->on('order_statuses');
        });

        Schema::table('order_food', function (Blueprint $table) {
            $table->foreign('orderId')->references('id')->on('orders');
            $table->foreign('foodId')->references('id')->on('food');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropConstrainedForeignId('villageId');
        });

        Schema::table('food', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });

        Schema::table('menu_food', function (Blueprint $table) {
            $table->dropForeign(['foodId']);
            $table->dropForeign(['menuId']);
        });

        Schema::table('menus', function (Blueprint $table) {
            $table->dropForeign(['serviceId']);
        });

        Schema::table('package_criterias', function (Blueprint $table) {
            $table->dropForeign(['packageId']);
            $table->dropForeign(['criteriaId']);
        });

        Schema::table('packages', function (Blueprint $table) {
            $table->dropForeign(['serviceId']);
            $table->dropForeign(['menuId']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['roleId']);
            $table->dropForeign(['villageId']);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['serviceId']);
            $table->dropForeign(['paymentId']);
            $table->dropForeign(['packageId']);
            $table->dropForeign(['status']);
            $table->dropForeign(['userId']);
        });

        Schema::table('order_food', function (Blueprint $table) {
            $table->dropForeign(['orderId']);
            $table->dropForeign(['foodId']);
        });
    }
};
