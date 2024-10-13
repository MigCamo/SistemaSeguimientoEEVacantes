<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Regions_Departament_Programs;
use App\Models\EducationalProgram;


class EducationalProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $educationalProgram1 = new EducationalProgram();
        $educationalProgram1->program_code = "14140";  // Como string
        $educationalProgram1->name = "CONTADURIA";
        $educationalProgram1->initialhours = rand(1, 50);
        $educationalProgram1->usedhours = rand(1, 50);
        $educationalProgram1->availablehours = rand(1, 50);
        $educationalProgram1->save();

        $regionsDepartamentProgram1 = new Regions_Departament_Programs();
        $regionsDepartamentProgram1->region_code = "1";  // Como string
        $regionsDepartamentProgram1->departament_code = "11301";  // Como string
        $regionsDepartamentProgram1->educational_program_code = "14140";  // Como string
        $regionsDepartamentProgram1->save();

        $educationalProgram2 = new EducationalProgram();
        $educationalProgram2->program_code = "14141";  // Como string
        $educationalProgram2->name = "ADMINISTRACION";
        $educationalProgram2->initialhours = rand(1, 50);
        $educationalProgram2->usedhours = rand(1, 50);
        $educationalProgram2->availablehours = rand(1, 50);
        $educationalProgram2->save();

        $regionsDepartamentProgram2 = new Regions_Departament_Programs();
        $regionsDepartamentProgram2->region_code = "1";  // Como string
        $regionsDepartamentProgram2->departament_code = "11301";  // Como string
        $regionsDepartamentProgram2->educational_program_code = "14141";  // Como string
        $regionsDepartamentProgram2->save();

        $educationalProgram3 = new EducationalProgram();
        $educationalProgram3->program_code = "14146";  // Como string
        $educationalProgram3->name = "SISTEMAS COMPUTACIONALES ADMINISTRATIVOS";
        $educationalProgram3->initialhours = rand(1, 50);
        $educationalProgram3->usedhours = rand(1, 50);
        $educationalProgram3->availablehours = rand(1, 50);
        $educationalProgram3->save();

        $regionsDepartamentProgram3 = new Regions_Departament_Programs();
        $regionsDepartamentProgram3->region_code = "1";  // Como string
        $regionsDepartamentProgram3->departament_code = "11301";  // Como string
        $regionsDepartamentProgram3->educational_program_code = "14146";  // Como string
        $regionsDepartamentProgram3->save();

        $educationalProgram4 = new EducationalProgram();
        $educationalProgram4->program_code = "14148";  // Como string
        $educationalProgram4->name = "GESTION Y DIRECCION DE NEGOCIOS";
        $educationalProgram4->initialhours = rand(1, 50);
        $educationalProgram4->usedhours = rand(1, 50);
        $educationalProgram4->availablehours = rand(1, 50);
        $educationalProgram4->save();

        $regionsDepartamentProgram4 = new Regions_Departament_Programs();
        $regionsDepartamentProgram4->region_code = "1";  // Como string
        $regionsDepartamentProgram4->departament_code = "11301";  // Como string
        $regionsDepartamentProgram4->educational_program_code = "14148";  // Como string
        $regionsDepartamentProgram4->save();

        $educationalProgram5 = new EducationalProgram();
        $educationalProgram5->program_code = "14142";  // Como string
        $educationalProgram5->name = "ECONOMIA";
        $educationalProgram5->initialhours = rand(1, 50);
        $educationalProgram5->usedhours = rand(1, 50);
        $educationalProgram5->availablehours = rand(1, 50);
        $educationalProgram5->save();

        $regionsDepartamentProgram5 = new Regions_Departament_Programs();
        $regionsDepartamentProgram5->region_code = "1";  // Como string
        $regionsDepartamentProgram5->departament_code = "11303";  // Como string
        $regionsDepartamentProgram5->educational_program_code = "14142";  // Como string
        $regionsDepartamentProgram5->save();

        $educationalProgram6 = new EducationalProgram();
        $educationalProgram6->program_code = "14147";  // Como string
        $educationalProgram6->name = "GEOGRAFIA";
        $educationalProgram6->initialhours = rand(1, 50);
        $educationalProgram6->usedhours = rand(1, 50);
        $educationalProgram6->availablehours = rand(1, 50);
        $educationalProgram6->save();

        $regionsDepartamentProgram6 = new Regions_Departament_Programs();
        $regionsDepartamentProgram6->region_code = "1";  // Como string
        $regionsDepartamentProgram6->departament_code = "11303";  // Como string
        $regionsDepartamentProgram6->educational_program_code = "14147";  // Como string
        $regionsDepartamentProgram6->save();

        $educationalProgram7 = new EducationalProgram();
        $educationalProgram7->program_code = "14143";  // Como string
        $educationalProgram7->name = "ESTADISTICA";
        $educationalProgram7->initialhours = rand(1, 50);
        $educationalProgram7->usedhours = rand(1, 50);
        $educationalProgram7->availablehours = rand(1, 50);
        $educationalProgram7->save();

        $regionsDepartamentProgram7 = new Regions_Departament_Programs();
        $regionsDepartamentProgram7->region_code = "1";  // Como string
        $regionsDepartamentProgram7->departament_code = "11304";  // Como string
        $regionsDepartamentProgram7->educational_program_code = "14143";  // Como string
        $regionsDepartamentProgram7->save();

        $educationalProgram8 = new EducationalProgram();
        $educationalProgram8->program_code = "14145";  // Como string
        $educationalProgram8->name = "INFORMATICA";
        $educationalProgram8->initialhours = rand(1, 50);
        $educationalProgram8->usedhours = rand(1, 50);
        $educationalProgram8->availablehours = rand(1, 50);
        $educationalProgram8->save();

        $regionsDepartamentProgram8 = new Regions_Departament_Programs();
        $regionsDepartamentProgram8->region_code = "1";  // Como string
        $regionsDepartamentProgram8->departament_code = "11304";  // Como string
        $regionsDepartamentProgram8->educational_program_code = "14145";  // Como string
        $regionsDepartamentProgram8->save();

        $educationalProgram9 = new EducationalProgram();
        $educationalProgram9->program_code = "14149";
        $educationalProgram9->name = "CIENCIAS Y TECNICAS ESTADISTICAS";
        $educationalProgram9->initialhours = rand(1, 50);
        $educationalProgram9->usedhours = rand(1, 50);
        $educationalProgram9->availablehours = rand(1, 50);
        $educationalProgram9->save();

        $regionsDepartamentProgram9 = new Regions_Departament_Programs();
        $regionsDepartamentProgram9->region_code = "1";
        $regionsDepartamentProgram9->departament_code = "11304";
        $regionsDepartamentProgram9->educational_program_code = "14149";
        $regionsDepartamentProgram9->save();

        $educationalProgram10 = new EducationalProgram();
        $educationalProgram10->program_code = "14350";
        $educationalProgram10->name = "LICENCIATURA EN TECNOLOGIAS COMPUTACIONALES";
        $educationalProgram10->initialhours = rand(1, 50);
        $educationalProgram10->usedhours = rand(1, 50);
        $educationalProgram10->availablehours = rand(1, 50);
        $educationalProgram10->save();

        $regionsDepartamentProgram10 = new Regions_Departament_Programs();
        $regionsDepartamentProgram10->region_code = "1";
        $regionsDepartamentProgram10->departament_code = "11304";
        $regionsDepartamentProgram10->educational_program_code = "14350";
        $regionsDepartamentProgram10->save();

        $educationalProgram11 = new EducationalProgram();
        $educationalProgram11->program_code = "14351";
        $educationalProgram11->name = "LICENCIATURA EN REDES Y SERVICIOS DE COMPUTO";
        $educationalProgram11->initialhours = rand(1, 50);
        $educationalProgram11->usedhours = rand(1, 50);
        $educationalProgram11->availablehours = rand(1, 50);
        $educationalProgram11->save();

        $regionsDepartamentProgram11 = new Regions_Departament_Programs();
        $regionsDepartamentProgram11->region_code = "1";
        $regionsDepartamentProgram11->departament_code = "11304";
        $regionsDepartamentProgram11->educational_program_code = "14351";
        $regionsDepartamentProgram11->save();

        $educationalProgram12 = new EducationalProgram();
        $educationalProgram12->program_code = "14352";
        $educationalProgram12->name = "LICENCIATURA EN INGENIERIA DE SOFTWARE";
        $educationalProgram12->initialhours = rand(1, 50);
        $educationalProgram12->usedhours = rand(1, 50);
        $educationalProgram12->availablehours = rand(1, 50);
        $educationalProgram12->save();

        $regionsDepartamentProgram12 = new Regions_Departament_Programs();
        $regionsDepartamentProgram12->region_code = "1";
        $regionsDepartamentProgram12->departament_code = "11304";
        $regionsDepartamentProgram12->educational_program_code = "14352";
        $regionsDepartamentProgram12->save();

        $educationalProgram13 = new EducationalProgram();
        $educationalProgram13->program_code = "14347";
        $educationalProgram13->name = "PUBLICIDAD Y RELACIONES PUBLICAS";
        $educationalProgram13->initialhours = rand(1, 50);
        $educationalProgram13->usedhours = rand(1, 50);
        $educationalProgram13->availablehours = rand(1, 50);
        $educationalProgram13->save();

        $regionsDepartamentProgram13 = new Regions_Departament_Programs();
        $regionsDepartamentProgram13->region_code = "1";
        $regionsDepartamentProgram13->departament_code = "11309";
        $regionsDepartamentProgram13->educational_program_code = "14347";
        $regionsDepartamentProgram13->save();

        $educationalProgram14 = new EducationalProgram();
        $educationalProgram14->program_code = "14348";
        $educationalProgram14->name = "RELACIONES INDUSTRIALES (CRED)";
        $educationalProgram14->initialhours = rand(1, 50);
        $educationalProgram14->usedhours = rand(1, 50);
        $educationalProgram14->availablehours = rand(1, 50);
        $educationalProgram14->save();

        $regionsDepartamentProgram14 = new Regions_Departament_Programs();
        $regionsDepartamentProgram14->region_code = "1";
        $regionsDepartamentProgram14->departament_code = "11309";
        $regionsDepartamentProgram14->educational_program_code = "14348";
        $regionsDepartamentProgram14->save();

        $educationalProgram15 = new EducationalProgram();
        $educationalProgram15->program_code = "14349";
        $educationalProgram15->name = "ADMINISTRACION DE NEGOCIOS INTERNACIONALES (CRED)";
        $educationalProgram15->initialhours = rand(1, 50);
        $educationalProgram15->usedhours = rand(1, 50);
        $educationalProgram15->availablehours = rand(1, 50);
        $educationalProgram15->save();

        $regionsDepartamentProgram15 = new Regions_Departament_Programs();
        $regionsDepartamentProgram15->region_code = "1";
        $regionsDepartamentProgram15->departament_code = "11309";
        $regionsDepartamentProgram15->educational_program_code = "14349";
        $regionsDepartamentProgram15->save();

        $educationalProgram16 = new EducationalProgram();
        $educationalProgram16->program_code = "14353";
        $educationalProgram16->name = "CIENCIAS POLITICAS Y GESTION PUBLICA";
        $educationalProgram16->initialhours = rand(1, 50);
        $educationalProgram16->usedhours = rand(1, 50);
        $educationalProgram16->availablehours = rand(1, 50);
        $educationalProgram16->save();

        $regionsDepartamentProgram16 = new Regions_Departament_Programs();
        $regionsDepartamentProgram16->region_code = "1";
        $regionsDepartamentProgram16->departament_code = "11309";
        $regionsDepartamentProgram16->educational_program_code = "14353";
        $regionsDepartamentProgram16->save();

        $educationalProgram17 = new EducationalProgram();
        $educationalProgram17->program_code = "14357";
        $educationalProgram17->name = "DESARROLLO DEL TALENTO HUMANO EN LAS ORG";
        $educationalProgram17->initialhours = rand(1, 50);
        $educationalProgram17->usedhours = rand(1, 50);
        $educationalProgram17->availablehours = rand(1, 50);
        $educationalProgram17->save();

        $regionsDepartamentProgram17 = new Regions_Departament_Programs();
        $regionsDepartamentProgram17->region_code = "1";
        $regionsDepartamentProgram17->departament_code = "11309";
        $regionsDepartamentProgram17->educational_program_code = "14357";
        $regionsDepartamentProgram17->save();

        $educationalProgram18 = new EducationalProgram();
        $educationalProgram18->program_code = "14240";
        $educationalProgram18->name = "CONTADURIA (SEA)";
        $educationalProgram18->initialhours = rand(1, 50);
        $educationalProgram18->usedhours = rand(1, 50);
        $educationalProgram18->availablehours = rand(1, 50);
        $educationalProgram18->save();

        $regionsDepartamentProgram18 = new Regions_Departament_Programs();
        $regionsDepartamentProgram18->region_code = "1";
        $regionsDepartamentProgram18->departament_code = "11701";
        $regionsDepartamentProgram18->educational_program_code = "14240";
        $regionsDepartamentProgram18->save();

        $educationalProgram19 = new EducationalProgram();
        $educationalProgram19->program_code = "14241";
        $educationalProgram19->name = "ADMINISTRACION";
        $educationalProgram19->initialhours = rand(1, 50);
        $educationalProgram19->usedhours = rand(1, 50);
        $educationalProgram19->availablehours = rand(1, 50);
        $educationalProgram19->save();

        $regionsDepartamentProgram19 = new Regions_Departament_Programs();
        $regionsDepartamentProgram19->region_code = "1";
        $regionsDepartamentProgram19->departament_code = "11701";
        $regionsDepartamentProgram19->educational_program_code = "14241";
        $regionsDepartamentProgram19->save();



        /*PROGRAMAS EN LA ZONA 2 (VERACRUZ)*/

        $educationalProgram20 = new EducationalProgram();
        $educationalProgram20->program_code = "14949";
        $educationalProgram20->name = "ADMINISTRACION";
        $educationalProgram20->initialhours = rand(1, 50);
        $educationalProgram20->usedhours = rand(1, 50);
        $educationalProgram20->availablehours = rand(1, 50);
        $educationalProgram20->save();

        $regionsDepartamentProgram20 = new Regions_Departament_Programs();
        $regionsDepartamentProgram20->region_code = "2";
        $regionsDepartamentProgram20->departament_code = "21301";
        $regionsDepartamentProgram20->educational_program_code = "14949";
        $regionsDepartamentProgram20->save();

        $educationalProgram21 = new EducationalProgram();
        $educationalProgram21->program_code = "14144";
        $educationalProgram21->name = "ADMINISTRACION DE EMPRESAS TURISTICAS";
        $educationalProgram21->initialhours = rand(1, 50);
        $educationalProgram21->usedhours = rand(1, 50);
        $educationalProgram21->availablehours = rand(1, 50);
        $educationalProgram21->save();

        $regionsDepartamentProgram21 = new Regions_Departament_Programs();
        $regionsDepartamentProgram21->region_code = "2";
        $regionsDepartamentProgram21->departament_code = "21301";
        $regionsDepartamentProgram21->educational_program_code = "14144";
        $regionsDepartamentProgram21->save();

        $educationalProgram22 = new EducationalProgram();
        $educationalProgram22->program_code = "17146";
        $educationalProgram22->name = "SISTEMAS COMPUTACIONALES ADMINISTRATIVOS";
        $educationalProgram22->initialhours = rand(1, 50);
        $educationalProgram22->usedhours = rand(1, 50);
        $educationalProgram22->availablehours = rand(1, 50);
        $educationalProgram22->save();

        $regionsDepartamentProgram22 = new Regions_Departament_Programs();
        $regionsDepartamentProgram22->region_code = "2";
        $regionsDepartamentProgram22->departament_code = "21301";
        $regionsDepartamentProgram22->educational_program_code = "17146";
        $regionsDepartamentProgram22->save();

        $educationalProgram23 = new EducationalProgram();
        $educationalProgram23->program_code = "14354";
        $educationalProgram23->name = "LOGISTICA INTERNACIONAL Y ADUANAS";
        $educationalProgram23->initialhours = rand(1, 50);
        $educationalProgram23->usedhours = rand(1, 50);
        $educationalProgram23->availablehours = rand(1, 50);
        $educationalProgram23->save();

        $regionsDepartamentProgram23 = new Regions_Departament_Programs();
        $regionsDepartamentProgram23->region_code = "2";
        $regionsDepartamentProgram23->departament_code = "21301";
        $regionsDepartamentProgram23->educational_program_code = "14354";
        $regionsDepartamentProgram23->save();

        $educationalProgram24 = new EducationalProgram();
        $educationalProgram24->program_code = "14356";
        $educationalProgram24->name = "TECNOLOGIAS DE LA INFORMACION EN LAS ORGANIZACIONES";
        $educationalProgram24->initialhours = rand(1, 50);
        $educationalProgram24->usedhours = rand(1, 50);
        $educationalProgram24->availablehours = rand(1, 50);
        $educationalProgram24->save();

        $regionsDepartamentProgram24 = new Regions_Departament_Programs();
        $regionsDepartamentProgram24->region_code = "2";
        $regionsDepartamentProgram24->departament_code = "21301";
        $regionsDepartamentProgram24->educational_program_code = "14356";
        $regionsDepartamentProgram24->save();

        $educationalProgram25 = new EducationalProgram();
        $educationalProgram25->program_code = "14160";
        $educationalProgram25->name = "CONTADURIA";
        $educationalProgram25->initialhours = rand(1, 50);
        $educationalProgram25->usedhours = rand(1, 50);
        $educationalProgram25->availablehours = rand(1, 50);
        $educationalProgram25->save();

        $regionsDepartamentProgram25 = new Regions_Departament_Programs();
        $regionsDepartamentProgram25->region_code = "2";
        $regionsDepartamentProgram25->departament_code = "22302";
        $regionsDepartamentProgram25->educational_program_code = "14160";
        $regionsDepartamentProgram25->save();

        $educationalProgram26 = new EducationalProgram();
        $educationalProgram26->program_code = "40560";
        $educationalProgram26->name = "GESTION Y DIRECCION DE NEGOCIOS";
        $educationalProgram26->initialhours = rand(1, 50);
        $educationalProgram26->usedhours = rand(1, 50);
        $educationalProgram26->availablehours = rand(1, 50);
        $educationalProgram26->save();

        $regionsDepartamentProgram26 = new Regions_Departament_Programs();
        $regionsDepartamentProgram26->region_code = "2";
        $regionsDepartamentProgram26->departament_code = "22302";
        $regionsDepartamentProgram26->educational_program_code = "40560";
        $regionsDepartamentProgram26->save();

        $educationalProgram27 = new EducationalProgram();
        $educationalProgram27->program_code = "303030";
        $educationalProgram27->name = "CONTADURIA (SEA)";
        $educationalProgram27->initialhours = rand(1, 50);
        $educationalProgram27->usedhours = rand(1, 50);
        $educationalProgram27->availablehours = rand(1, 50);
        $educationalProgram27->save();

        $regionsDepartamentProgram27 = new Regions_Departament_Programs();
        $regionsDepartamentProgram27->region_code = "2";
        $regionsDepartamentProgram27->departament_code = "22701";
        $regionsDepartamentProgram27->educational_program_code = "303030";
        $regionsDepartamentProgram27->save();

        $educationalProgram28 = new EducationalProgram();
        $educationalProgram28->program_code = "23456";
        $educationalProgram28->name = "ADMINISTRACION";
        $educationalProgram28->initialhours = rand(1, 50);
        $educationalProgram28->usedhours = rand(1, 50);
        $educationalProgram28->availablehours = rand(1, 50);
        $educationalProgram28->save();

        $regionsDepartamentProgram28 = new Regions_Departament_Programs();
        $regionsDepartamentProgram28->region_code = "2";
        $regionsDepartamentProgram28->departament_code = "22701";
        $regionsDepartamentProgram28->educational_program_code = "23456";
        $regionsDepartamentProgram28->save();

        /* PROGRAMAS EN LA ZONA 3 (ORIZABA CORDOBA) */

        $educationalProgram29 = new EducationalProgram();
        $educationalProgram29->program_code = "99240";
        $educationalProgram29->name = "CONTADURIA (SEA)";
        $educationalProgram29->initialhours = rand(1, 50);
        $educationalProgram29->usedhours = rand(1, 50);
        $educationalProgram29->availablehours = rand(1, 50);
        $educationalProgram29->save();

        $regionDepProgram29 = new Regions_Departament_Programs();
        $regionDepProgram29->region_code = "3";
        $regionDepProgram29->departament_code = "31701";
        $regionDepProgram29->educational_program_code = $educationalProgram29->program_code;
        $regionDepProgram29->save();

        $educationalProgram30 = new EducationalProgram();
        $educationalProgram30->program_code = "55241";
        $educationalProgram30->name = "ADMINISTRACION";
        $educationalProgram30->initialhours = rand(1, 50);
        $educationalProgram30->usedhours = rand(1, 50);
        $educationalProgram30->availablehours = rand(1, 50);
        $educationalProgram30->save();

        $regionDepProgram30 = new Regions_Departament_Programs();
        $regionDepProgram30->region_code = "3";
        $regionDepProgram30->departament_code = "31701";
        $regionDepProgram30->educational_program_code = $educationalProgram30->program_code;
        $regionDepProgram30->save();

        $educationalProgram31 = new EducationalProgram();
        $educationalProgram31->program_code = "14450";
        $educationalProgram31->name = "CONTADURIA";
        $educationalProgram31->initialhours = rand(1, 50);
        $educationalProgram31->usedhours = rand(1, 50);
        $educationalProgram31->availablehours = rand(1, 50);
        $educationalProgram31->save();

        $regionDepProgram31 = new Regions_Departament_Programs();
        $regionDepProgram31->region_code = "3";
        $regionDepProgram31->departament_code = "34301";
        $regionDepProgram31->educational_program_code = $educationalProgram31->program_code;
        $regionDepProgram31->save();

        $educationalProgram32 = new EducationalProgram();
        $educationalProgram32->program_code = "19141";
        $educationalProgram32->name = "ADMINISTRACION";
        $educationalProgram32->initialhours = rand(1, 50);
        $educationalProgram32->usedhours = rand(1, 50);
        $educationalProgram32->availablehours = rand(1, 50);
        $educationalProgram32->save();

        $regionDepProgram32 = new Regions_Departament_Programs();
        $regionDepProgram32->region_code = "3";
        $regionDepProgram32->departament_code = "34301";
        $regionDepProgram32->educational_program_code = $educationalProgram32->program_code;
        $regionDepProgram32->save();

        $educationalProgram33 = new EducationalProgram();
        $educationalProgram33->program_code = "90005";
        $educationalProgram33->name = "INFORMATICA";
        $educationalProgram33->initialhours = rand(1, 50);
        $educationalProgram33->usedhours = rand(1, 50);
        $educationalProgram33->availablehours = rand(1, 50);
        $educationalProgram33->save();

        $regionDepProgram33 = new Regions_Departament_Programs();
        $regionDepProgram33->region_code = "3";
        $regionDepProgram33->departament_code = "34301";
        $regionDepProgram33->educational_program_code = $educationalProgram33->program_code;
        $regionDepProgram33->save();

        $educationalProgram34 = new EducationalProgram();
        $educationalProgram34->program_code = "21146";
        $educationalProgram34->name = "SISTEMAS COMPUTACIONALES ADMINISTRATIVOS";
        $educationalProgram34->initialhours = rand(1, 50);
        $educationalProgram34->usedhours = rand(1, 50);
        $educationalProgram34->availablehours = rand(1, 50);
        $educationalProgram34->save();

        $regionDepProgram34 = new Regions_Departament_Programs();
        $regionDepProgram34->region_code = "3";
        $regionDepProgram34->departament_code = "34301";
        $regionDepProgram34->educational_program_code = $educationalProgram34->program_code;
        $regionDepProgram34->save();

        $educationalProgram35 = new EducationalProgram();
        $educationalProgram35->program_code = "14500";
        $educationalProgram35->name = "GESTION Y DIRECCION DE NEGOCIOS";
        $educationalProgram35->initialhours = rand(1, 50);
        $educationalProgram35->usedhours = rand(1, 50);
        $educationalProgram35->availablehours = rand(1, 50);
        $educationalProgram35->save();

        $regionDepProgram35 = new Regions_Departament_Programs();
        $regionDepProgram35->region_code = "3";
        $regionDepProgram35->departament_code = "34301";
        $regionDepProgram35->educational_program_code = $educationalProgram35->program_code;
        $regionDepProgram35->save();

        $educationalProgram36 = new EducationalProgram();
        $educationalProgram36->program_code = "19352";
        $educationalProgram36->name = "LICENCIATURA EN INGENIERIA DE SOFTWARE";
        $educationalProgram36->initialhours = rand(1, 50);
        $educationalProgram36->usedhours = rand(1, 50);
        $educationalProgram36->availablehours = rand(1, 50);
        $educationalProgram36->save();

        $regionDepProgram36 = new Regions_Departament_Programs();
        $regionDepProgram36->region_code = "3";
        $regionDepProgram36->departament_code = "34301";
        $regionDepProgram36->educational_program_code = $educationalProgram36->program_code;
        $regionDepProgram36->save();

        $educationalProgram37 = new EducationalProgram();
        $educationalProgram37->program_code = "77756";
        $educationalProgram37->name = "TECNOLOGIAS DE LA INFORMACION EN LAS ORGANIZACIONES";
        $educationalProgram37->initialhours = rand(1, 50);
        $educationalProgram37->usedhours = rand(1, 50);
        $educationalProgram37->availablehours = rand(1, 50);
        $educationalProgram37->save();

        $regionDepProgram37 = new Regions_Departament_Programs();
        $regionDepProgram37->region_code = "3";
        $regionDepProgram37->departament_code = "34301";
        $regionDepProgram37->educational_program_code = $educationalProgram37->program_code;
        $regionDepProgram37->save();



        /* PROGRAMAS EN LA ZONA 4 (POZA RICA - TUXPAN) */

        $educationalProgram38 = new EducationalProgram();
        $educationalProgram38->program_code = "88840";
        $educationalProgram38->name = "CONTADURIA (SEA)";
        $educationalProgram38->initialhours = rand(1, 50);
        $educationalProgram38->usedhours = rand(1, 50);
        $educationalProgram38->availablehours = rand(1, 50);
        $educationalProgram38->save();

        $regionDepProgram38 = new Regions_Departament_Programs();
        $regionDepProgram38->region_code = "4";
        $regionDepProgram38->departament_code = "41701";
        $regionDepProgram38->educational_program_code = $educationalProgram38->program_code;
        $regionDepProgram38->save();

        $educationalProgram39 = new EducationalProgram();
        $educationalProgram39->program_code = "145030";
        $educationalProgram39->name = "CONTADURIA";
        $educationalProgram39->initialhours = rand(1, 50);
        $educationalProgram39->usedhours = rand(1, 50);
        $educationalProgram39->availablehours = rand(1, 50);
        $educationalProgram39->save();

        $regionDepProgram39 = new Regions_Departament_Programs();
        $regionDepProgram39->region_code = "4";
        $regionDepProgram39->departament_code = "42301";
        $regionDepProgram39->educational_program_code = $educationalProgram39->program_code;
        $regionDepProgram39->save();

        $educationalProgram40 = new EducationalProgram();
        $educationalProgram40->program_code = "22146";
        $educationalProgram40->name = "SISTEMAS COMPUTACIONALES ADMINISTRATIVOS";
        $educationalProgram40->initialhours = rand(1, 50);
        $educationalProgram40->usedhours = rand(1, 50);
        $educationalProgram40->availablehours = rand(1, 50);
        $educationalProgram40->save();

        $regionDepProgram40 = new Regions_Departament_Programs();
        $regionDepProgram40->region_code = "4";
        $regionDepProgram40->departament_code = "42301";
        $regionDepProgram40->educational_program_code = $educationalProgram40->program_code;
        $regionDepProgram40->save();

        $educationalProgram41 = new EducationalProgram();
        $educationalProgram41->program_code = "16008";
        $educationalProgram41->name = "GESTION Y DIRECCION DE NEGOCIOS";
        $educationalProgram41->initialhours = rand(1, 50);
        $educationalProgram41->usedhours = rand(1, 50);
        $educationalProgram41->availablehours = rand(1, 50);
        $educationalProgram41->save();

        $regionDepProgram41 = new Regions_Departament_Programs();
        $regionDepProgram41->region_code = "4";
        $regionDepProgram41->departament_code = "42301";
        $regionDepProgram41->educational_program_code = $educationalProgram41->program_code;
        $regionDepProgram41->save();

        $educationalProgram42 = new EducationalProgram();
        $educationalProgram42->program_code = "14355";
        $educationalProgram42->name = "DIRECCION ESTRATEGICA DE RECURSOS HUMANOS";
        $educationalProgram42->initialhours = rand(1, 50);
        $educationalProgram42->usedhours = rand(1, 50);
        $educationalProgram42->availablehours = rand(1, 50);
        $educationalProgram42->save();

        $regionDepProgram42 = new Regions_Departament_Programs();
        $regionDepProgram42->region_code = "4";
        $regionDepProgram42->departament_code = "42301";
        $regionDepProgram42->educational_program_code = $educationalProgram42->program_code;
        $regionDepProgram42->save();

        /* PROGRAMAS EN LA ZONA 5 (COATZACOALCOS-MINATITLAN) */

        $educationalProgram43 = new EducationalProgram();
        $educationalProgram43->program_code = "34567";
        $educationalProgram43->name = "CONTADURIA";
        $educationalProgram43->initialhours = rand(1, 50);
        $educationalProgram43->usedhours = rand(1, 50);
        $educationalProgram43->availablehours = rand(1, 50);
        $educationalProgram43->save();

        $regionDepProgram43 = new Regions_Departament_Programs();
        $regionDepProgram43->region_code = "5";
        $regionDepProgram43->departament_code = "51301";
        $regionDepProgram43->educational_program_code = $educationalProgram43->program_code;
        $regionDepProgram43->save();

        $educationalProgram44 = new EducationalProgram();
        $educationalProgram44->program_code = "14121";
        $educationalProgram44->name = "ADMINISTRACION";
        $educationalProgram44->initialhours = rand(1, 50);
        $educationalProgram44->usedhours = rand(1, 50);
        $educationalProgram44->availablehours = rand(1, 50);
        $educationalProgram44->save();

        $regionDepProgram44 = new Regions_Departament_Programs();
        $regionDepProgram44->region_code = "5";
        $regionDepProgram44->departament_code = "51301";
        $regionDepProgram44->educational_program_code = $educationalProgram44->program_code;
        $regionDepProgram44->save();

        $educationalProgram45 = new EducationalProgram();
        $educationalProgram45->program_code = "98146";
        $educationalProgram45->name = "SISTEMAS COMPUTACIONALES ADMINISTRATIVOS";
        $educationalProgram45->initialhours = rand(1, 50);
        $educationalProgram45->usedhours = rand(1, 50);
        $educationalProgram45->availablehours = rand(1, 50);
        $educationalProgram45->save();

        $regionDepProgram45 = new Regions_Departament_Programs();
        $regionDepProgram45->region_code = "5";
        $regionDepProgram45->departament_code = "51301";
        $regionDepProgram45->educational_program_code = $educationalProgram45->program_code;
        $regionDepProgram45->save();

        $educationalProgram46 = new EducationalProgram();
        $educationalProgram46->program_code = "14708";
        $educationalProgram46->name = "GESTION Y DIRECCION DE NEGOCIOS";
        $educationalProgram46->initialhours = rand(1, 50);
        $educationalProgram46->usedhours = rand(1, 50);
        $educationalProgram46->availablehours = rand(1, 50);
        $educationalProgram46->save();

        $regionDepProgram46 = new Regions_Departament_Programs();
        $regionDepProgram46->region_code = "5";
        $regionDepProgram46->departament_code = "51301";
        $regionDepProgram46->educational_program_code = $educationalProgram46->program_code;
        $regionDepProgram46->save();

        $educationalProgram47 = new EducationalProgram();
        $educationalProgram47->program_code = "42152";
        $educationalProgram47->name = "LICENCIATURA EN INGENIERIA DE SOFTWARE";
        $educationalProgram47->initialhours = rand(1, 50);
        $educationalProgram47->usedhours = rand(1, 50);
        $educationalProgram47->availablehours = rand(1, 50);
        $educationalProgram47->save();

        $regionDepProgram47 = new Regions_Departament_Programs();
        $regionDepProgram47->region_code = "5";
        $regionDepProgram47->departament_code = "51301";
        $regionDepProgram47->educational_program_code = $educationalProgram47->program_code;
        $regionDepProgram47->save();

        $educationalProgram48 = new EducationalProgram();
        $educationalProgram48->program_code = "19090";
        $educationalProgram48->name = "CONTADURIA (SEA)";
        $educationalProgram48->initialhours = rand(1, 50);
        $educationalProgram48->usedhours = rand(1, 50);
        $educationalProgram48->availablehours = rand(1, 50);
        $educationalProgram48->save();

        $regionDepProgram48 = new Regions_Departament_Programs();
        $regionDepProgram48->region_code = "5";
        $regionDepProgram48->departament_code = "51701";
        $regionDepProgram48->educational_program_code = $educationalProgram48->program_code;
        $regionDepProgram48->save();

    }
}
