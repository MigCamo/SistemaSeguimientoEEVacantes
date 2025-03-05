php <?php

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
        Schema::create('assigned_vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('ee_vacancy_code');
            $table->string('lecturer_code');
            $table->integer('reason_code')->nullable();
            $table->unsignedBigInteger('type_asignation_code');
            $table->date('noticeDate');
            $table->date('assignmentDate');
            $table->text('notes');
            $table->date('openingDate');
            $table->date('closingDate');
            $table->timestamps();
            $table->string('type_contract', 20)->nullable();

            $table->foreign('ee_vacancy_code')->references('nrc')->on('educational_experience_vacancies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('lecturer_code')->references('staff_number')->on('lecturers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('reason_code')->references('code')->on('reasons');
            $table->foreign('type_asignation_code')->references('id')->on(table: 'type_asignations')->onDelete('cascade')->onUpdate('cascade');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigned_vacancies');
    }
};
