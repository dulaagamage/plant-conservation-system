<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('plants', function (Blueprint $table) {

            // Conservation & Ecology
            $table->string('conservation_status')->nullable();
            $table->boolean('is_endemic')->default(false);
            $table->string('habitat')->nullable();

            // Ayurveda / Traditional Knowledge
            $table->text('ayurveda_uses')->nullable();
            $table->text('cultural_significance')->nullable();

            // Scientific Research Layer
            $table->text('active_compounds')->nullable();
            $table->text('research_notes')->nullable();
            $table->string('studied_by')->nullable();

            // Biodiversity Interaction
            $table->text('ecological_role')->nullable();
            $table->text('associated_wildlife')->nullable();

            // Location / Arboretum Mapping
            $table->string('garden_zone')->nullable();
            $table->string('gps_coordinates')->nullable();
        });
    }

    public function down()
    {
        Schema::table('plants', function (Blueprint $table) {

            $table->dropColumn([
                'conservation_status',
                'is_endemic',
                'habitat',
                'ayurveda_uses',
                'cultural_significance',
                'active_compounds',
                'research_notes',
                'studied_by',
                'ecological_role',
                'associated_wildlife',
                'garden_zone',
                'gps_coordinates'
            ]);
        });
    }
};
