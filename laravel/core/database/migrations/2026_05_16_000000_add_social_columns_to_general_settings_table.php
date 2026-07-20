<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_settings', function (Blueprint $table) {
            if (!Schema::hasColumn('general_settings', 'whatsapp_channel')) {
                $table->text('whatsapp_channel')->nullable();
            }
            if (!Schema::hasColumn('general_settings', 'whatsapp_support_1')) {
                $table->text('whatsapp_support_1')->nullable();
            }
            if (!Schema::hasColumn('general_settings', 'whatsapp_support_2')) {
                $table->text('whatsapp_support_2')->nullable();
            }
            if (!Schema::hasColumn('general_settings', 'telegram_group')) {
                $table->text('telegram_group')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('general_settings', function (Blueprint $table) {
            $table->dropColumn(['whatsapp_channel', 'whatsapp_support_1', 'whatsapp_support_2', 'telegram_group']);
        });
    }
};
