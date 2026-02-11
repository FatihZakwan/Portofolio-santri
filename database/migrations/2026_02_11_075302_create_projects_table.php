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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            
            // 1. Info Kategori
            $table->string('title');
            $table->string('category');       // Kategori Utama (Programming, DKV, dll)
            $table->string('sub_category');   // Sub Kategori (Web Dev, Logo, dll)
            
            // 2. Tim Pengembang
            $table->json('authors');          
            
            // 3. Deskripsi
            $table->text('description')->nullable(); 
            
            // 4. Media
            $table->string('thumbnail');      
            $table->json('gallery')->nullable(); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};