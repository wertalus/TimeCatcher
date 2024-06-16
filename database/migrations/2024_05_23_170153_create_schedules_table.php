<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamp('start');
            $table->timestamp('end');
            $table->string('url');
            $table->string('range_of_control')->nullable();
            $table->string('component_number');
            $table->foreignId('component_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('cell_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('status_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade')->default(1);            
            $table->foreignId('ndt_list_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->nullable()->default(0);
            $table->text('notes')->nullable();
            $table->text('attachments')->nullable();
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
