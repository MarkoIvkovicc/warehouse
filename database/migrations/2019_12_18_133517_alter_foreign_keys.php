<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('arrivals', function (Blueprint $table) {
            $table->dropForeign('arrivals_supplier_id_foreign');
            $table->dropForeign('arrivals_employee_id_foreign');
            $table->dropForeign('arrivals_product_id_foreign');
            $table->dropForeign('arrivals_warehouse_id_foreign');

            $table->foreign('supplier_id')->references('id')->on('suppliers')->onUpdate('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade');
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onUpdate('cascade');
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign('employees_warehouse_id_foreign');

            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('product_warehouse', function (Blueprint $table) {
            $table->dropForeign('products_warehouses_product_id_foreign');
            $table->dropForeign('products_warehouses_warehouse_id_foreign');

            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onUpdate('cascade')->onDelete('cascade');
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
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('arrivals', function (Blueprint $table) {
            $table->dropForeign('arrivals_supplier_id_foreign');
            $table->dropForeign('arrivals_employee_id_foreign');
            $table->dropForeign('arrivals_product_id_foreign');
            $table->dropForeign('arrivals_warehouse_id_foreign');

            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign('employees_warehouse_id_foreign');

            $table->foreign('warehouse_id')->references('id')->on('warehouses');
        });

        Schema::table('product_warehouse', function (Blueprint $table) {
            $table->dropForeign('product_warehouse_product_id_foreign');
            $table->dropForeign('product_warehouse_warehouse_id_foreign');

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
        });
    }
}
