// database/migrations/xxxx_create_attendances_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->integer('period'); // 1 to 5
            $table->enum('status', ['present', 'absent', 'late'])->default('present');
            $table->integer('late_minutes')->nullable();
            $table->foreignId('recorded_by')->constrained('users');
            $table->timestamps();

            $table->unique(['student_id', 'date', 'period']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
