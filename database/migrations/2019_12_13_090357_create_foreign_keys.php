<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('arrivals', function (Blueprint $table) {
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
        });

        Schema::table('products_warehouses', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
        });

        Schema::table('arrivals', function (Blueprint $table) {
            $table->dropForeign('arrivals_supplier_id_foreign');
            $table->dropForeign('arrivals_employee_id_foreign');
            $table->dropForeign('arrivals_product_id_foreign');
            $table->dropForeign('arrivals_warehouse_id_foreign');
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign('employees_warehouse_id_foreign');
        });

        Schema::table('products_warehouses', function (Blueprint $table) {
            $table->dropForeign('product_warehouse_product_id_foreign');
            $table->dropForeign('product_warehouse_warehouse_id_foreign');
        });

    }
}
