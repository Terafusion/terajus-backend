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
        Schema::table('roles', function (Blueprint $table) {
            $table->unique(['tenant_id', 'name']);
        });

        Schema::table('role_has_permissions', function (Blueprint $table) {
            $table->unique(['tenant_id', 'role_id', 'permission_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropUnique(['tenant_id', 'name']);
        });

        Schema::table('role_has_permissions', function (Blueprint $table) {
            $table->dropUnique(['tenant_id', 'role_id', 'permission_id']);
        });
    }
};
