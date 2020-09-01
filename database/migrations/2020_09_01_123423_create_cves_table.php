<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cves', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('assigner');
            $table->string('cvss');
            $table->string('cwe');
            $table->text('information');
            $table->text('link');
            $table->date('publie');
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
        Schema::dropIfExists('cves');
    }
}
