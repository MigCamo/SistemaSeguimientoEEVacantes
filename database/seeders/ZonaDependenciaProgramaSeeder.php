<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Zona_Dependencia_Programa;


class ZonaDependenciaProgramaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //php artisan db:seed --class=ZonaDependenciaProgramaSeeder
    public function run()
    {
        $zonaDependenciaPrograma1 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma1->id_zona = 1;
        $zonaDependenciaPrograma1->nombre_zona = "Xalapa";
        $zonaDependenciaPrograma1->clave_dependencia = 11301;
        $zonaDependenciaPrograma1->nombre_dependencia = "FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN";
        $zonaDependenciaPrograma1->clave_programa = 14140;
        $zonaDependenciaPrograma1->nombre_programa = "CONTADURIA";
        $zonaDependenciaPrograma1->save();

        $zonaDependenciaPrograma2 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma2->id_zona = 1;
        $zonaDependenciaPrograma2->nombre_zona = "Xalapa";
        $zonaDependenciaPrograma2->clave_dependencia = 11301;
        $zonaDependenciaPrograma2->nombre_dependencia = "FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN";
        $zonaDependenciaPrograma2->clave_programa = 14141;
        $zonaDependenciaPrograma2->nombre_programa = "ADMINISTRACION";
        $zonaDependenciaPrograma2->save();

        $zonaDependenciaPrograma3 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma3->id_zona = 1;
        $zonaDependenciaPrograma3->nombre_zona = "Xalapa";
        $zonaDependenciaPrograma3->clave_dependencia = 11301;
        $zonaDependenciaPrograma3->nombre_dependencia = "FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN";
        $zonaDependenciaPrograma3->clave_programa = 14146;
        $zonaDependenciaPrograma3->nombre_programa = "SISTEMAS COMPUTACIONALES ADMINISTRATIVOS";
        $zonaDependenciaPrograma3->save();

        $zonaDependenciaPrograma4 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma4->id_zona = 1;
        $zonaDependenciaPrograma4->nombre_zona = "Xalapa";
        $zonaDependenciaPrograma4->clave_dependencia = 11301;
        $zonaDependenciaPrograma4->nombre_dependencia = "FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN";
        $zonaDependenciaPrograma4->clave_programa = 14148;
        $zonaDependenciaPrograma4->nombre_programa = "GESTION Y DIRECCION DE NEGOCIOS";
        $zonaDependenciaPrograma4->save();

        $zonaDependenciaPrograma5 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma5->id_zona = 1;
        $zonaDependenciaPrograma5->nombre_zona = "Xalapa";
        $zonaDependenciaPrograma5->clave_dependencia = 11303;
        $zonaDependenciaPrograma5->nombre_dependencia = "FACULTAD DE ECONOMIA";
        $zonaDependenciaPrograma5->clave_programa = 14142;
        $zonaDependenciaPrograma5->nombre_programa = "ECONOMIA";
        $zonaDependenciaPrograma5->save();

        $zonaDependenciaPrograma6 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma6->id_zona = 1;
        $zonaDependenciaPrograma6->nombre_zona = "Xalapa";
        $zonaDependenciaPrograma6->clave_dependencia = 11303;
        $zonaDependenciaPrograma6->nombre_dependencia = "FACULTAD DE ECONOMIA";
        $zonaDependenciaPrograma6->clave_programa = 14147;
        $zonaDependenciaPrograma6->nombre_programa = "GEOGRAFIA";
        $zonaDependenciaPrograma6->save();

        $zonaDependenciaPrograma7 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma7->id_zona = 1;
        $zonaDependenciaPrograma7->nombre_zona = "Xalapa";
        $zonaDependenciaPrograma7->clave_dependencia = 11304;
        $zonaDependenciaPrograma7->nombre_dependencia = "FACULTAD DE ESTADÍSTICA E INFORMÁTICA";
        $zonaDependenciaPrograma7->clave_programa = 14143;
        $zonaDependenciaPrograma7->nombre_programa = "ESTADISTICA";
        $zonaDependenciaPrograma7->save();

        $zonaDependenciaPrograma8 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma8->id_zona = 1;
        $zonaDependenciaPrograma8->nombre_zona = "Xalapa";
        $zonaDependenciaPrograma8->clave_dependencia = 11304;
        $zonaDependenciaPrograma8->nombre_dependencia = "FACULTAD DE ESTADÍSTICA E INFORMÁTICA";
        $zonaDependenciaPrograma8->clave_programa = 14145;
        $zonaDependenciaPrograma8->nombre_programa = "INFORMATICA";
        $zonaDependenciaPrograma8->save();

        $zonaDependenciaPrograma9 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma9->id_zona = 1;
        $zonaDependenciaPrograma9->nombre_zona = "Xalapa";
        $zonaDependenciaPrograma9->clave_dependencia = 11304;
        $zonaDependenciaPrograma9->nombre_dependencia = "FACULTAD DE ESTADÍSTICA E INFORMÁTICA";
        $zonaDependenciaPrograma9->clave_programa = 14149;
        $zonaDependenciaPrograma9->nombre_programa = "CIENCIAS Y TECNICAS ESTADISTICAS";
        $zonaDependenciaPrograma9->save();

        $zonaDependenciaPrograma10 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma10->id_zona = 1;
        $zonaDependenciaPrograma10->nombre_zona = "Xalapa";
        $zonaDependenciaPrograma10->clave_dependencia = 11304;
        $zonaDependenciaPrograma10->nombre_dependencia = "FACULTAD DE ESTADÍSTICA E INFORMÁTICA";
        $zonaDependenciaPrograma10->clave_programa = 14350;
        $zonaDependenciaPrograma10->nombre_programa = "LICENCIATURA EN TECNOLOGIAS COMPUTACIONALES";
        $zonaDependenciaPrograma10->save();

        $zonaDependenciaPrograma11 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma11->id_zona = 1;
        $zonaDependenciaPrograma11->nombre_zona = "Xalapa";
        $zonaDependenciaPrograma11->clave_dependencia = 11304;
        $zonaDependenciaPrograma11->nombre_dependencia = "FACULTAD DE ESTADÍSTICA E INFORMÁTICA";
        $zonaDependenciaPrograma11->clave_programa = 14351;
        $zonaDependenciaPrograma11->nombre_programa = "LICENCIATURA EN REDES Y SERVICIOS DE COMPUTO";
        $zonaDependenciaPrograma11->save();

        $zonaDependenciaPrograma12 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma12->id_zona = 1;
        $zonaDependenciaPrograma12->nombre_zona = "Xalapa";
        $zonaDependenciaPrograma12->clave_dependencia = 11304;
        $zonaDependenciaPrograma12->nombre_dependencia = "FACULTAD DE ESTADÍSTICA E INFORMÁTICA";
        $zonaDependenciaPrograma12->clave_programa = 14352;
        $zonaDependenciaPrograma12->nombre_programa = "LICENCIATURA EN INGENIERIA DE SOFTWARE";
        $zonaDependenciaPrograma12->save();

        $zonaDependenciaPrograma13 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma13->id_zona = 1;
        $zonaDependenciaPrograma13->nombre_zona = "Xalapa";
        $zonaDependenciaPrograma13->clave_dependencia = 11309;
        $zonaDependenciaPrograma13->nombre_dependencia = "FACULTAD DE CIENCIAS ADMINISTRATIVAS Y SOCIALES";
        $zonaDependenciaPrograma13->clave_programa = 14347;
        $zonaDependenciaPrograma13->nombre_programa = "PUBLICIDAD Y RELACIONES PUBLICAS";
        $zonaDependenciaPrograma13->save();

        $zonaDependenciaPrograma14 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma14->id_zona = 1;
        $zonaDependenciaPrograma14->nombre_zona = "Xalapa";
        $zonaDependenciaPrograma14->clave_dependencia = 11309;
        $zonaDependenciaPrograma14->nombre_dependencia = "FACULTAD DE CIENCIAS ADMINISTRATIVAS Y SOCIALES";
        $zonaDependenciaPrograma14->clave_programa = 14348;
        $zonaDependenciaPrograma14->nombre_programa = "RELACIONES INDUSTRIALES (CRED)";
        $zonaDependenciaPrograma14->save();

        $zonaDependenciaPrograma15 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma15->id_zona = 1;
        $zonaDependenciaPrograma15->nombre_zona = "Xalapa";
        $zonaDependenciaPrograma15->clave_dependencia = 11309;
        $zonaDependenciaPrograma15->nombre_dependencia = "FACULTAD DE CIENCIAS ADMINISTRATIVAS Y SOCIALES";
        $zonaDependenciaPrograma15->clave_programa = 14349;
        $zonaDependenciaPrograma15->nombre_programa = "ADMINISTRACION DE NEGOCIOS INTERNACIONALES (CRED)";
        $zonaDependenciaPrograma15->save();

        $zonaDependenciaPrograma16 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma16->id_zona = 1;
        $zonaDependenciaPrograma16->nombre_zona = "Xalapa";
        $zonaDependenciaPrograma16->clave_dependencia = 11309;
        $zonaDependenciaPrograma16->nombre_dependencia = "FACULTAD DE CIENCIAS ADMINISTRATIVAS Y SOCIALES";
        $zonaDependenciaPrograma16->clave_programa = 14353;
        $zonaDependenciaPrograma16->nombre_programa = "CIENCIAS POLITICAS Y GESTION PUBLICA";
        $zonaDependenciaPrograma16->save();

        $zonaDependenciaPrograma17 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma17->id_zona = 1;
        $zonaDependenciaPrograma17->nombre_zona = "Xalapa";
        $zonaDependenciaPrograma17->clave_dependencia = 11309;
        $zonaDependenciaPrograma17->nombre_dependencia = "FACULTAD DE CIENCIAS ADMINISTRATIVAS Y SOCIALES";
        $zonaDependenciaPrograma17->clave_programa = 14357;
        $zonaDependenciaPrograma17->nombre_programa = "DESARROLLO DEL TALENTO HUMANO EN LAS ORG";
        $zonaDependenciaPrograma17->save();

        $zonaDependenciaPrograma18 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma18->id_zona = 1;
        $zonaDependenciaPrograma18->nombre_zona = "Xalapa";
        $zonaDependenciaPrograma18->clave_dependencia = 11701;
        $zonaDependenciaPrograma18->nombre_dependencia = "DIRECCIÓN GENERAL DEL SISTEMA DE ENSEÑANZA ABIERTA";
        $zonaDependenciaPrograma18->clave_programa = 14240;
        $zonaDependenciaPrograma18->nombre_programa = "CONTADURIA (SEA)";
        $zonaDependenciaPrograma18->save();

        $zonaDependenciaPrograma19 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma19->id_zona = 1;
        $zonaDependenciaPrograma19->nombre_zona = "Xalapa";
        $zonaDependenciaPrograma19->clave_dependencia = 11701;
        $zonaDependenciaPrograma19->nombre_dependencia = "DIRECCIÓN GENERAL DEL SISTEMA DE ENSEÑANZA ABIERTA";
        $zonaDependenciaPrograma19->clave_programa = 14241;
        $zonaDependenciaPrograma19->nombre_programa = "ADMINISTRACION";
        $zonaDependenciaPrograma19->save();

        /*PROGRAMAS EN LA ZONA 2 (VERACRUZ)*/

        $zonaDependenciaPrograma20 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma20->id_zona = 2;
        $zonaDependenciaPrograma20->nombre_zona = "Veracruz";
        $zonaDependenciaPrograma20->clave_dependencia = 21301;
        $zonaDependenciaPrograma20->nombre_dependencia = "FACULTAD DE ADMINISTRACIÓN";
        $zonaDependenciaPrograma20->clave_programa = 14141;
        $zonaDependenciaPrograma20->nombre_programa = "ADMINISTRACION";
        $zonaDependenciaPrograma20->save();

        $zonaDependenciaPrograma21 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma21->id_zona = 2;
        $zonaDependenciaPrograma21->nombre_zona = "Veracruz";
        $zonaDependenciaPrograma21->clave_dependencia = 21301;
        $zonaDependenciaPrograma21->nombre_dependencia = "FACULTAD DE ADMINISTRACIÓN";
        $zonaDependenciaPrograma21->clave_programa = 14144;
        $zonaDependenciaPrograma21->nombre_programa = "ADMINISTRACION DE EMPRESAS TURISTICAS";
        $zonaDependenciaPrograma21->save();

        $zonaDependenciaPrograma22 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma22->id_zona = 2;
        $zonaDependenciaPrograma22->nombre_zona = "Veracruz";
        $zonaDependenciaPrograma22->clave_dependencia = 21301;
        $zonaDependenciaPrograma22->nombre_dependencia = "FACULTAD DE ADMINISTRACIÓN";
        $zonaDependenciaPrograma22->clave_programa = 14146;
        $zonaDependenciaPrograma22->nombre_programa = "SISTEMAS COMPUTACIONALES ADMINISTRATIVOS";
        $zonaDependenciaPrograma22->save();

        $zonaDependenciaPrograma23 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma23->id_zona = 2;
        $zonaDependenciaPrograma23->nombre_zona = "Veracruz";
        $zonaDependenciaPrograma23->clave_dependencia = 21301;
        $zonaDependenciaPrograma23->nombre_dependencia = "FACULTAD DE ADMINISTRACIÓN";
        $zonaDependenciaPrograma23->clave_programa = 14354;
        $zonaDependenciaPrograma23->nombre_programa = "LOGISTICA INTERNACIONAL Y ADUANAS";
        $zonaDependenciaPrograma23->save();

        $zonaDependenciaPrograma24 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma24->id_zona = 2;
        $zonaDependenciaPrograma24->nombre_zona = "Veracruz";
        $zonaDependenciaPrograma24->clave_dependencia = 21301;
        $zonaDependenciaPrograma24->nombre_dependencia = "FACULTAD DE ADMINISTRACIÓN";
        $zonaDependenciaPrograma24->clave_programa = 14356;
        $zonaDependenciaPrograma24->nombre_programa = "TECNOLOGIAS DE LA INFORMACION EN LAS ORGANIZACIONES";
        $zonaDependenciaPrograma24->save();

        $zonaDependenciaPrograma25 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma25->id_zona = 2;
        $zonaDependenciaPrograma25->nombre_zona = "Veracruz";
        $zonaDependenciaPrograma25->clave_dependencia = 22302;
        $zonaDependenciaPrograma25->nombre_dependencia = "FACULTAD DE CONTADURIA Y NEGOCIOS";
        $zonaDependenciaPrograma25->clave_programa = 14140;
        $zonaDependenciaPrograma25->nombre_programa = "CONTADURIA";
        $zonaDependenciaPrograma25->save();

        $zonaDependenciaPrograma26 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma26->id_zona = 2;
        $zonaDependenciaPrograma26->nombre_zona = "Veracruz";
        $zonaDependenciaPrograma26->clave_dependencia = 22302;
        $zonaDependenciaPrograma26->nombre_dependencia = "FACULTAD DE CONTADURIA Y NEGOCIOS";
        $zonaDependenciaPrograma26->clave_programa = 14148;
        $zonaDependenciaPrograma26->nombre_programa = "GESTION Y DIRECCION DE NEGOCIOS";
        $zonaDependenciaPrograma26->save();

        $zonaDependenciaPrograma27 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma27->id_zona = 2;
        $zonaDependenciaPrograma27->nombre_zona = "Veracruz";
        $zonaDependenciaPrograma27->clave_dependencia = 22701;
        $zonaDependenciaPrograma27->nombre_dependencia = "COORDINACION ACADEMICA REG. DE ENSEÑANZA ABIERTA";
        $zonaDependenciaPrograma27->clave_programa = 14240;
        $zonaDependenciaPrograma27->nombre_programa = "CONTADURIA (SEA)";
        $zonaDependenciaPrograma27->save();

        $zonaDependenciaPrograma28 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma28->id_zona = 2;
        $zonaDependenciaPrograma28->nombre_zona = "Veracruz";
        $zonaDependenciaPrograma28->clave_dependencia = 22701;
        $zonaDependenciaPrograma28->nombre_dependencia = "COORDINACION ACADEMICA REG. DE ENSEÑANZA ABIERTA";
        $zonaDependenciaPrograma28->clave_programa = 14241;
        $zonaDependenciaPrograma28->nombre_programa = "ADMINISTRACION";
        $zonaDependenciaPrograma28->save();

        /* PROGRAMAS EN LA ZONA 3 (ORIZABA CORDOBA) */

        $zonaDependenciaPrograma29 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma29->id_zona = 3 ;
        $zonaDependenciaPrograma29->nombre_zona = "Orizaba-Cordoba";
        $zonaDependenciaPrograma29->clave_dependencia = 31701;
        $zonaDependenciaPrograma29->nombre_dependencia = "COORDINACION ACADEMICA REG. DE ENSEÑANZA ABIERTA";
        $zonaDependenciaPrograma29->clave_programa = 14240;
        $zonaDependenciaPrograma29->nombre_programa = "CONTADURIA (SEA)";
        $zonaDependenciaPrograma29->save();

        $zonaDependenciaPrograma30 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma30->id_zona = 3 ;
        $zonaDependenciaPrograma30->nombre_zona = "Orizaba-Cordoba";
        $zonaDependenciaPrograma30->clave_dependencia = 31701;
        $zonaDependenciaPrograma30->nombre_dependencia = "COORDINACION ACADEMICA REG. DE ENSEÑANZA ABIERTA";
        $zonaDependenciaPrograma30->clave_programa = 14241;
        $zonaDependenciaPrograma30->nombre_programa = "ADMINISTRACION";
        $zonaDependenciaPrograma30->save();

        $zonaDependenciaPrograma31 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma31->id_zona = 3 ;
        $zonaDependenciaPrograma31->nombre_zona = "Orizaba-Cordoba";
        $zonaDependenciaPrograma31->clave_dependencia = 34301;
        $zonaDependenciaPrograma31->nombre_dependencia = "FACULTAD DE NEGOCIOS Y TECNOLOGÍAS";
        $zonaDependenciaPrograma31->clave_programa = 14140;
        $zonaDependenciaPrograma31->nombre_programa = "CONTADURIA";
        $zonaDependenciaPrograma31->save();

        $zonaDependenciaPrograma32 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma32->id_zona = 3 ;
        $zonaDependenciaPrograma32->nombre_zona = "Orizaba-Cordoba";
        $zonaDependenciaPrograma32->clave_dependencia = 34301;
        $zonaDependenciaPrograma32->nombre_dependencia = "FACULTAD DE NEGOCIOS Y TECNOLOGÍAS";
        $zonaDependenciaPrograma32->clave_programa = 14141;
        $zonaDependenciaPrograma32->nombre_programa = "ADMINISTRACION";
        $zonaDependenciaPrograma32->save();

        $zonaDependenciaPrograma33 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma33->id_zona = 3 ;
        $zonaDependenciaPrograma33->nombre_zona = "Orizaba-Cordoba";
        $zonaDependenciaPrograma33->clave_dependencia = 34301;
        $zonaDependenciaPrograma33->nombre_dependencia = "FACULTAD DE NEGOCIOS Y TECNOLOGÍAS";
        $zonaDependenciaPrograma33->clave_programa = 14145;
        $zonaDependenciaPrograma33->nombre_programa = "INFORMATICA";
        $zonaDependenciaPrograma33->save();

        $zonaDependenciaPrograma34 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma34->id_zona = 3 ;
        $zonaDependenciaPrograma34->nombre_zona = "Orizaba-Cordoba";
        $zonaDependenciaPrograma34->clave_dependencia = 34301;
        $zonaDependenciaPrograma34->nombre_dependencia = "FACULTAD DE NEGOCIOS Y TECNOLOGÍAS";
        $zonaDependenciaPrograma34->clave_programa = 14146;
        $zonaDependenciaPrograma34->nombre_programa = "SISTEMAS COMPUTACIONALES ADMINISTRATIVOS";
        $zonaDependenciaPrograma34->save();

        $zonaDependenciaPrograma35 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma35->id_zona = 3 ;
        $zonaDependenciaPrograma35->nombre_zona = "Orizaba-Cordoba";
        $zonaDependenciaPrograma35->clave_dependencia = 34301;
        $zonaDependenciaPrograma35->nombre_dependencia = "FACULTAD DE NEGOCIOS Y TECNOLOGÍAS";
        $zonaDependenciaPrograma35->clave_programa = 14148;
        $zonaDependenciaPrograma35->nombre_programa = "GESTION Y DIRECCION DE NEGOCIOS";
        $zonaDependenciaPrograma35->save();

        $zonaDependenciaPrograma36 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma36->id_zona = 3 ;
        $zonaDependenciaPrograma36->nombre_zona = "Orizaba-Cordoba";
        $zonaDependenciaPrograma36->clave_dependencia = 34301;
        $zonaDependenciaPrograma36->nombre_dependencia = "FACULTAD DE NEGOCIOS Y TECNOLOGÍAS";
        $zonaDependenciaPrograma36->clave_programa = 14352;
        $zonaDependenciaPrograma36->nombre_programa = "LICENCIATURA EN INGENIERIA DE SOFTWARE";
        $zonaDependenciaPrograma36->save();

        $zonaDependenciaPrograma37 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma37->id_zona = 3 ;
        $zonaDependenciaPrograma37->nombre_zona = "Orizaba-Cordoba";
        $zonaDependenciaPrograma37->clave_dependencia = 34301;
        $zonaDependenciaPrograma37->nombre_dependencia = "FACULTAD DE NEGOCIOS Y TECNOLOGÍAS";
        $zonaDependenciaPrograma37->clave_programa = 14356;
        $zonaDependenciaPrograma37->nombre_programa = "TECNOLOGIAS DE LA INFORMACION EN LAS ORGANIZACIONES";
        $zonaDependenciaPrograma37->save();

        /* PROGRAMAS EN LA ZONA 4 (POZA RICA - TUXPAN) */

        $zonaDependenciaPrograma38 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma38->id_zona =  4 ;
        $zonaDependenciaPrograma38->nombre_zona = "Poza Rica-Tuxpan";
        $zonaDependenciaPrograma38->clave_dependencia = 41701 ;
        $zonaDependenciaPrograma38->nombre_dependencia = "COORDINACION ACADEMICA REG. DE ENSEÑANZA ABIERTA";
        $zonaDependenciaPrograma38->clave_programa = 14240;
        $zonaDependenciaPrograma38->nombre_programa = "CONTADURIA (SEA)";
        $zonaDependenciaPrograma38->save();

        $zonaDependenciaPrograma39 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma39->id_zona =  4 ;
        $zonaDependenciaPrograma39->nombre_zona = "Poza Rica-Tuxpan";
        $zonaDependenciaPrograma39->clave_dependencia = 42301;
        $zonaDependenciaPrograma39->nombre_dependencia = "FACULTAD DE CONTADURIA";
        $zonaDependenciaPrograma39->clave_programa = 14140;
        $zonaDependenciaPrograma39->nombre_programa = "CONTADURIA";
        $zonaDependenciaPrograma39->save();

        $zonaDependenciaPrograma40 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma40->id_zona =  4 ;
        $zonaDependenciaPrograma40->nombre_zona = "Poza Rica-Tuxpan";
        $zonaDependenciaPrograma40->clave_dependencia = 42301;
        $zonaDependenciaPrograma40->nombre_dependencia = "FACULTAD DE CONTADURIA";
        $zonaDependenciaPrograma40->clave_programa = 14146;
        $zonaDependenciaPrograma40->nombre_programa = "SISTEMAS COMPUTACIONALES ADMINISTRATIVOS";
        $zonaDependenciaPrograma40->save();

        $zonaDependenciaPrograma41 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma41->id_zona =  4 ;
        $zonaDependenciaPrograma41->nombre_zona = "Poza Rica-Tuxpan";
        $zonaDependenciaPrograma41->clave_dependencia = 42301;
        $zonaDependenciaPrograma41->nombre_dependencia = "FACULTAD DE CONTADURIA";
        $zonaDependenciaPrograma41->clave_programa = 14148;
        $zonaDependenciaPrograma41->nombre_programa = "GESTION Y DIRECCION DE NEGOCIOS";
        $zonaDependenciaPrograma41->save();

        $zonaDependenciaPrograma42 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma42->id_zona =  4 ;
        $zonaDependenciaPrograma42->nombre_zona = "Poza Rica-Tuxpan";
        $zonaDependenciaPrograma42->clave_dependencia = 42301;
        $zonaDependenciaPrograma42->nombre_dependencia = "FACULTAD DE CONTADURIA";
        $zonaDependenciaPrograma42->clave_programa = 14355;
        $zonaDependenciaPrograma42->nombre_programa = "DIRECCION ESTRATEGICA DE RECURSOS HUMANOS";
        $zonaDependenciaPrograma42->save();

        /* PROGRAMAS EN LA ZONA 5 (COATZACOALCOS-MINATITLAN) */

        $zonaDependenciaPrograma43 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma43->id_zona = 5 ;
        $zonaDependenciaPrograma43->nombre_zona = "Coatzacoalcos-Minatitlan";
        $zonaDependenciaPrograma43->clave_dependencia = 51301;
        $zonaDependenciaPrograma43->nombre_dependencia = "FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN";
        $zonaDependenciaPrograma43->clave_programa = 14140;
        $zonaDependenciaPrograma43->nombre_programa = "CONTADURIA";
        $zonaDependenciaPrograma43->save();

        $zonaDependenciaPrograma44 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma44->id_zona = 5 ;
        $zonaDependenciaPrograma44->nombre_zona = "Coatzacoalcos-Minatitlan";
        $zonaDependenciaPrograma44->clave_dependencia = 51301;
        $zonaDependenciaPrograma44->nombre_dependencia = "FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN";
        $zonaDependenciaPrograma44->clave_programa = 14141;
        $zonaDependenciaPrograma44->nombre_programa = "ADMINISTRACION";
        $zonaDependenciaPrograma44->save();

        $zonaDependenciaPrograma45 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma45->id_zona = 5 ;
        $zonaDependenciaPrograma45->nombre_zona = "Coatzacoalcos-Minatitlan";
        $zonaDependenciaPrograma45->clave_dependencia = 51301;
        $zonaDependenciaPrograma45->nombre_dependencia = "FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN";
        $zonaDependenciaPrograma45->clave_programa = 14146;
        $zonaDependenciaPrograma45->nombre_programa = "SISTEMAS COMPUTACIONALES ADMINISTRATIVOS";
        $zonaDependenciaPrograma45->save();

        $zonaDependenciaPrograma46 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma46->id_zona = 5 ;
        $zonaDependenciaPrograma46->nombre_zona = "Coatzacoalcos-Minatitlan";
        $zonaDependenciaPrograma46->clave_dependencia = 51301;
        $zonaDependenciaPrograma46->nombre_dependencia = "FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN";
        $zonaDependenciaPrograma46->clave_programa = 14148;
        $zonaDependenciaPrograma46->nombre_programa = "GESTION Y DIRECCION DE NEGOCIOS";
        $zonaDependenciaPrograma46->save();

        $zonaDependenciaPrograma47 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma47->id_zona = 5 ;
        $zonaDependenciaPrograma47->nombre_zona = "Coatzacoalcos-Minatitlan";
        $zonaDependenciaPrograma47->clave_dependencia = 51301;
        $zonaDependenciaPrograma47->nombre_dependencia = "FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN";
        $zonaDependenciaPrograma47->clave_programa = 14352;
        $zonaDependenciaPrograma47->nombre_programa = "LICENCIATURA EN INGENIERIA DE SOFTWARE";
        $zonaDependenciaPrograma47->save();

        $zonaDependenciaPrograma48 = new Zona_Dependencia_Programa();
        $zonaDependenciaPrograma48->id_zona = 5 ;
        $zonaDependenciaPrograma48->nombre_zona = "Coatzacoalcos-Minatitlan";
        $zonaDependenciaPrograma48->clave_dependencia = 51701;
        $zonaDependenciaPrograma48->nombre_dependencia = "COORDINACION ACADEMICA REG. DE ENSEÑANZA ABIERTA";
        $zonaDependenciaPrograma48->clave_programa = 14240;
        $zonaDependenciaPrograma48->nombre_programa = "CONTADURIA (SEA)";
        $zonaDependenciaPrograma48->save();

    }
}
