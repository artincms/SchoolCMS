// database/migrations/xxxx_create_students_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('nationality', ['iranian', 'foreign'])->default('iranian');
            $table->string('father_name');
            $table->text('address');
            $table->string('father_phone');
            $table->string('mother_phone')->nullable();
            $table->string('father_job')->nullable();
            $table->string('mother_job')->nullable();
            $table->integer('total_children')->default(1);
            $table->integer('total_boys')->default(0);
            $table->integer('total_girls')->default(0);
            $table->integer('child_order')->default(1);
            $table->boolean('parents_divorced')->default(false);
            $table->enum('guardian', ['father', 'mother', 'paternal_grandfather', 'maternal_grandfather'])->default('father');
            $table->string('shad_mobile')->nullable();
            $table->foreignId('class_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
