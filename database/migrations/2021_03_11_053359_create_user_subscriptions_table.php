<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('stripe_subscription_id');
            $table->string('stripe_customer_id');
            $table->string('stripe_plan_id');
            $table->integer('plan_amount');
            $table->string('plan_amount_currency');
            $table->string('plan_interval');
            $table->string('plan_interval_count');
            $table->string('payer_email');
            $table->string('created');
            $table->string('plan_period_start');
            $table->string('plan_period_end');
            $table->string('status');
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('user_subscriptions');
    }
}
