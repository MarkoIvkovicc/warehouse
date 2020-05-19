<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterArrivalsForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('arrivals', function (Blueprint $table) {
            $table->dropForeign('arrivals_supplier_id_foreign');
            $table->dropForeign('arrivals_employee_id_foreign');
            $table->dropForeign('arrivals_product_id_foreign');
            $table->dropForeign('arrivals_warehouse_id_foreign');

            $table->foreign('supplier_id')->references('id')->on('suppliers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
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
    }
}
