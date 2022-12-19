<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('alumnos', function (Blueprint $table) {
                $table->id()->autoIncrement();
                $table->string('nombre', 32)->nullable(false);
                $table->string('telefono', 16)->nullable();
                $table->integer('edad')->nullable();
                $table->string('password')->nullable(false);
                $table->string('email')->unique();
                $table->string('sexo');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('alumnos');
        }
    };
