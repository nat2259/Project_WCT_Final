<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

public function up()
{
    Schema::table('billing_details', function (Blueprint $table) {
        if (!Schema::hasColumn('billing_details', 'first_name')) {
            $table->string('first_name')->after('user_id');
        }
        if (!Schema::hasColumn('billing_details', 'last_name')) {
            $table->string('last_name')->after('first_name');
        }
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('billing_details', function (Blueprint $table) {
            //
        });
    }
};
