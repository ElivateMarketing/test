<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('spouse')->nullable();
            $table->string('will_type')->nullable();
            $table->string('name');
            $table->string('spouse_name')->nullable();
            $table->date('marriage_date')->nullable();
            $table->string('address')->nullable();
            $table->text('children_names')->nullable();
            $table->text('children_ages')->nullable();
            $table->boolean('special_needs')->default(false);
            $table->boolean('own_property')->default(false);
            $table->string('property_address')->nullable();
            $table->decimal('property_value', 15, 2)->nullable();
            $table->decimal('mortgage_amount', 15, 2)->nullable();
            $table->string('co_owners')->nullable();
            $table->boolean('has_business')->default(false);
            $table->decimal('business_value', 15, 2)->nullable();
            $table->string('business_partners')->nullable();
            $table->string('healthcare_agent')->nullable();
            $table->boolean('avoid_probate')->default(false);
            $table->text('special_asset_instructions')->nullable();
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
        Schema::dropIfExists('submissions');
    }
}