<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('general_settings', 'envato_token')) {
            Schema::table('general_settings', function (Blueprint $table) {
                $table->text('envato_token')->nullable()->after('site_name');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('general_settings', 'envato_token')) {
            Schema::table('general_settings', function (Blueprint $table) {
                $table->dropColumn('envato_token');
            });
        }
    }
};
