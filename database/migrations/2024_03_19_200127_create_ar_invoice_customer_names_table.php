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
        Schema::create('ar_invoice_customer_names', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id')->nullable()->index('customer_id');
            $table->string('customer_name')->nullable();
            $table->unsignedBigInteger('po_number')->nullable()->index('po_number');
            $table->date('date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('enable_tax')->nullable();
            $table->string('recurring_incoice')->nullable();
            $table->string('by_month')->nullable();
            $table->string('month')->nullable();
            $table->longText('invoice_from')->nullable();
            $table->longText('invoice_to')->nullable();
            $table->longText('status')->nullable();
            $table->timestamps();

            $table->index(['customer_id', 'po_number'], 'invoice_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ar_invoice_customer_names');
    }
};
