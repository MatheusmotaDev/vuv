<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetItemTable extends Migration
{
    public function up(): void
    {
        Schema::create('budget_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('budget_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('price', 10, 2); // Definindo precisão de 10 dígitos e 2 casas decimais para o preço
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('budget_item');
    }
}
