
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('about_content', function (Blueprint $table) {
            $table->json('photos')->nullable()->after('content');
        });
    }

    public function down(): void
    {
        Schema::table('about_content', function (Blueprint $table) {
            $table->dropColumn('photos');
        });
    }
};
