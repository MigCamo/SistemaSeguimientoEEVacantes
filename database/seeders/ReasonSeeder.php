<?php

namespace Database\Seeders;

use App\Models\Reason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reason1 = new Reason();
        $reason1->code = 1;
        $reason1->name = "OCUPADA NORMAL";
        $reason1->concept = "Para dar de ALTA a los titulares de una plaza, a los ITD, a los IOD y para reincorporar al personal al término de  cualquier reason de separación temporal, así como los nombramientos.";
        $reason1->save();

        $reason2 = new Reason();
        $reason2->code = 2;
        $reason2->name = "AÑO SABÁTICO";
        $reason2->concept = "Para dar de ALTA a los Suplentes del personal académico que disfruta de Licencia con goce de sueldo durante  un año por habérsele otorgado el beneficio del Año Sabático.";
        $reason2->save();

        $reason3 = new Reason();
        $reason3->code = 3;
        $reason3->name = "EXTENSIÓN DE AÑO SABÁTICO";
        $reason3->concept = "Para dar de ALTA a los Suplentes del personal académico que disfruta de Licencia con goce de sueldo al  término del año sabático, cuando las actividades desempeñadas durante el mismo se prolongan por más del año.";
        $reason3->save();

        $reason4 = new Reason();
        $reason4->code = 4;
        $reason4->name = "DESCARGA ACADÉMICA TOTAL POR ESTUDIOS  DE POSGRADO";
        $reason4->concept = "Para dar de ALTA a los Suplentes del personal académico, que durante un tiempo definido deja de impartir  toda su carga académica, para dedicarse a estudios de Posgrado.";
        $reason4->save();

        $reason5 = new Reason();
        $reason5->code = 5;
        $reason5->name = "DESCARGA ACADÉMICA PARCIAL POR ESTUDIOS  DE POSGRADO";
        $reason5->concept = "Para dar de ALTA a los Suplentes del personal académico, que durante un tiempo definido deja de impartir  parte de su carga académica, para dedicarse a estudios de Posgrado.";
        $reason5->save();

        $reason6 = new Reason();
        $reason6->code = 6;
        $reason6->name = "DESCARGA ACADÉMICA TOTAL POR  FUNCIONES DIRECTIVAS";
        $reason6->concept = "Para dar de ALTA a los suplentes del personal académico, que es descargado en la totalidad de su carga  académica para desempeñar un puesto de funcionario, se utiliza únicamente cuando el empleado sigue cobrando  en su plaza de académico.";
        $reason6->save();

        $reason7 = new Reason();
        $reason7->code = 7;
        $reason7->name = "DESCARGA ACADÉMICA PARCIAL POR  FUNCIONES DIRECTIVAS";
        $reason7->concept = "Para dar de ALTA a los suplentes del personal académico, que es descargado en parte de su carga académica  para desempeñar un puesto de funcionario, se utiliza únicamente cuando el empleado sigue cobrando en su  plaza de académico.";
        $reason7->save();

        $reason8 = new Reason();
        $reason8->code = 8;
        $reason8->name = "DESCARGA ACADÉMICA TOTAL POR COMISIÓN  ACADÉMICA";
        $reason8->concept = "Para dar de ALTA a los suplentes del personal académico, que deja de impartir por un tiempo definido, toda su  carga académica, para dedicarse a actividades académicas relacionadas con el Modelo Educativo Integral y  Flexible.";
        $reason8->save();

        $reason9 = new Reason();
        $reason9->code = 9;
        $reason9->name = "DESCARGA ACADÉMICA PARCIAL POR  COMISIÓN ACADÉMICA";
        $reason9->concept = "Para dar de ALTA a los Suplentes del personal académico, que deja de impartir por un tiempo definido, parte  de su carga académica, para dedicarse a actividades académicas relacionadas con el Modelo Educativo Integral  y Flexible.";
        $reason9->save();

        $reason10 = new Reason();
        $reason10->code = 10;
        $reason10->name = "PERMISO EXTRAORDINARIO";
        $reason10->concept = "LICENCIA CON SUELDO.- Que se le concede al personal académico por periodos máximo de 2 días para  cumplir con cargos específicos como asistencia a toma de poseciones de funcionarios, eventos extraordinarios  promovidos por la rectoría, a maestros consejeros para asistir a los consejos universitarios, desfile del primero de  Mayo, en revisiones contractuales a los delegados sexenales de regiones foráneas, (solo se ocupa para  justificación de inasistencias, no se generan suplencias para estos reasons salvo en el caso de hospital escuela)  para la justificación de inasistencias requiere de la autorización del Director General de Recursos Humanos.";
        $reason10->save();

        $reason11 = new Reason();
        $reason11->code = 11;
        $reason11->name = "DESCARGA ACADÉMICA TOTAL POR  COMISION INSTITUCIONAL";
        $reason11->concept = "Para dar de ALTA a los Suplentes del personal académico, que deja de impartir por un tiempo determinado,  toda su carga académica, para realizar en la propia Institución, actividades distintas a las de su nombramiento.  Se utiliza para los casos en que no existe plaza presupuestada para la función encomendada por ejemplo:  Encargados de clínicas o laboratorio.";
        $reason11->save();

        $reason12 = new Reason();
        $reason12->code = 12;
        $reason12->name = "DESCARGA ACADEMICA PARCIAL POR  COMISION INSTITUCIONAL ACAD";
        $reason12->concept = "Para dar de ALTA a los Suplentes del personal académico de planta, que deja de impartir por un tiempo  determinado, parte de su carga académica, para realizar en la propia Institución, actividades distintas a las de su  nombramiento.";
        $reason12->save();

        $reason13 = new Reason();
        $reason13->code = 13;
        $reason13->name = "DESCARGA ACADEMICA PARCIAL POR  COMISION INSTITUCIONAL ACAD";
        $reason13->concept = "Para dar de ALTA a los Suplentes del personal de planta, que deja de laborar por un tiempo determinado, toda  su carga de trabajo, para que de acuerdo al Convenio firmado con el FESAPAUV el 7 de noviembre de 1986, y  contrato colectivo del SETSUV, se dedique a actividades propias del sindicato.";
        $reason13->save();

        $reason14 = new Reason();
        $reason14->code = 14;
        $reason14->name = "LICENCIAS CON GOCE DE SUELDO POR  COMISION SINDICAL TOTAL";
        $reason14->concept = "Para dar de ALTA a los Suplentes del personal de planta, que deja de laborar por un tiempo determinado, hasta  por medio tiempo de su carga de trabajo, para que de acuerdo al Convenio firmado con el FESAPAUV el 7 de  noviembre de 1986, y contrato colectivo del SETSUV se dedique a actividades propias del sindicato.";
        $reason14->save();

        $reason15 = new Reason();
        $reason15->code = 15;
        $reason15->name = "INCAPACIDAD MÉDICA";
        $reason15->concept = "Para dar de ALTA a los suplentes del personal académico ,confianza y administrativo, técnico y manual, que  deja de laborar su carga de trabajo, por el periodo que indique la constancia médica a los empleados que  padezcan alguna enfermedad, cualquiera que sea su naturaleza, siempre y cuando se justifique la necesidad y se  cuente con la autorización previa de la dirección general de recursos humanos para suplirlo.";
        $reason15->save();

        $reason16 = new Reason();
        $reason16->code = 16;
        $reason16->name = "LICENCIA POR TITULACIÓN";
        $reason16->concept = "Para dar de ALTA a los Suplentes del personal académico, que deja de impartir su carga académica hasta por  30 días, por tener licencia con goce de sueldo para titulación.";
        $reason16->save();

        $reason17 = new Reason();
        $reason17->code = 17;
        $reason17->name = "PERMISO ECONÓMICO";
        $reason17->concept = "Para dar de ALTA a los suplentes del personal académico, confianza y administrativo, técnico y manual, por  tener permiso con goce de sueldo para faltar a sus labores, siempre y cuando se justifique la necesidad y se  cuente con la autorización previa de la dirección general de recursos humanos para suplirlo.";
        $reason17->save();

        $reason18 = new Reason();
        $reason18->code = 18;
        $reason18->name = "ASISTENCIA A EVENTOS ACADÉMICOS";
        $reason18->concept = "Para dar de ALTA a los Suplentes del personal académico por licencia con goce de sueldo que se le otorga al  personal académico hasta por 10 días al año para asistir a eventos académicos, siempre y cuando se justifique la  necesidad y se cuente con la autorización previa de la Dirección General de Recursos Humanos para suplirlo.";
        $reason18->save();

        $reason19 = new Reason();
        $reason19->code = 19;
        $reason19->name = "REPOSICIÓN DE VACACIONES POR INCAPACIDAD MÉDICA";
        $reason19->concept = "Para dar de ALTA a los Suplentes del personal académico, confianza y administrativo, técnico y manual, al  término de la incapacidad médica del trabajador que se encuentre incapacitado en cualquiera de los períodos  vacacionales oficiales.";
        $reason19->save();

        $reason20 = new Reason();
        $reason20->code = 20;
        $reason20->name = "VACACIONES ADICIONALES";
        $reason20->concept = "Para dar de ALTA a los Suplentes, que cubren los días laborales adicionales de vacaciones que disfruta el  personal de Confianza y administrativo, técnico y manual, las cuales se conceden en razón de los años de  servicios, siempre y cuando se justifique la necesidad y se cuente con la autorización previa de la Dirección  General de Recursos Humanos para suplirlo.";
        $reason20->save();

        $reason21 = new Reason();
        $reason21->code = 21;
        $reason21->name = "CAPACITACIÓN AL PERSONAL NO ACADÉMICO";
        $reason21->concept = "Para dar de ALTA a los Suplentes, que cubren los días laborales adicionales de vacaciones que disfruta el  personal de Confianza y administrativo, técnico y manual, las cuales se conceden en razón de los años de  servicios, siempre y cuando se justifique la necesidad y se cuente con la autorización previa de la Dirección  General de Recursos Humanos para suplirlo.";
        $reason21->save();

        $reason22 = new Reason();
        $reason22->code = 22;
        $reason22->name = "VACACIONES NORMALES";
        $reason22->concept = "Para dar de ALTA a los Suplentes que cubren los períodos normales de vacaciones que se otorgan a los  trabajadores, que por las características especiales de ciertas dependencias, tienen que ser cubiertos, siempre y  cuando se justifique la necesidad y se cuente con la autorización previa de la Dirección General de Recursos  Humanos para suplirlo.";
        $reason22->save();

        $reason23 = new Reason();
        $reason23->code = 23;
        $reason23->name = "DIAS FESTIVOS";
        $reason23->concept = "Para dar de ALTA a los Suplentes del personal en sus descansos de días festivos, que por necesidades especiales de las dependencias, tienen que ser cubiertos por suplentes o por los mismos titulares, siempre y cuando se  justifique la necesidad y se cuente con la autorización previa de la Dirección General de Recursos Humanos  para suplirlo.";
        $reason23->save();

        $reason24 = new Reason();
        $reason24->code = 24;
        $reason24->name = "COMISIÓN ADMINISTRATIVA";
        $reason24->concept = "Para dar de ALTA a los Suplentes del personal de confianza, que por ausencia excepcional del trabajador de  confianza previa autorización de la autoridad competente para desempeñar temporalmente sus funciones en un  lugar diferente al de su adscripción, siempre y cuando se justifique la necesidad y se cuente con la autorización  previa de la Dirección General de Recursos Humanos para suplirlo.";
        $reason24->save();

        $reason25 = new Reason();
        $reason25->code = 25;
        $reason25->name = "PRORROGA PARA TITULACIÓN";
        $reason25->concept = "Para dar de ALTA a los Suplentes del personal académico, que deja de impartir su carga académica hasta por  15 días más como prorroga a la licencia con sueldo para titulación en casos justificados, para que se titulen.";
        $reason25->save();

        $reason26 = new Reason();
        $reason26->code = 26;
        $reason26->name = "PRACTICAS DE ESTUDIOS CLAUSULA 61.2 C.C.T. (S.E.T.S.U.V.)";
        $reason26->concept = "Licencia con goce de sueldo; la otorga la institución a los trabajadores del SETSUV que estudian en la UV  cuando tienen que efectuar viajes de prácticas escolares, por el tiempo que duren las prácticas.";
        $reason26->save();

        $reason27 = new Reason();
        $reason27->code = 27;
        $reason27->name = "PENDIENTE DE REUBICAR POR DICTAMEN  MÉDICO";
        $reason27->concept = "Para dar de ALTA a los suplentes que por dictamen médico permite que el titular pueda ser reubicado a realizar  funciones diferentes.";
        $reason27->save();

        $reason28 = new Reason();
        $reason28->code = 28;
        $reason28->name = "ASISTENCIA A EVENTOS SINDICALES  (FESAPAUV)";
        $reason28->concept = "La universidad concederá hasta 3 dias de permiso con goce de sueldo, para asistir a eventos sindicales, tales  como desfiles de primero de mayo, conmemoración día del maestro, aniversario de sindicato, etc.";
        $reason28->save();

        $reason29 = new Reason();
        $reason29->code = 29;
        $reason29->name = "CLAUSULA 68.35(SETSUV)";
        $reason29->concept = "La universidad concederá tres dias de permiso con goce de salario, en el caso de fallecimiento de conyuge,de la  concubina o concubino, padres o hijos del trabajador, quedando obligado este a justificar plenamente el hecho  en que en un plazo no mayor de 5 dias de la fecha de que ocurre el deceso, por conducto del sindicato; se  procederá a efectuar el descuento que corresponda.";
        $reason29->save();

        $reason30 = new Reason();
        $reason30->code = 30;
        $reason30->name = "LICENCIAS SIN GOCE DE SUELDO POR  DERECHO DE ANTIGÜEDAD.";
        $reason30->concept = "Para dar de BAJA al personal titular de una plaza y ALTA a los interinos del personal académico y de  confianza, al que se otorgan al personal para separarse temporalmente del servicio sin goce de sueldo, con base  en la normatividad, y el caso de personal del SETSUV y confianza será en licencias mayores a 15 días.";
        $reason30->save();

        $reason31 = new Reason();
        $reason31->code = 31;
        $reason31->name = "ARRESTO ADMINISTRATIVO.";
        $reason31->concept = "Para dar de BAJA al ocupante de una plaza y ALTA a los interinos del personal académico, confianza y  administrativo, técnico y manual que por detención de un trabajador derivada de violaciones cometidas al  reglamento de policía y buen gobierno, que origina la suspensión de la relación de trabajo por el tiempo que  permanezca privado de su libertad, (clausula 23.2) SETSUV.";
        $reason31->save();

        $reason32 = new Reason();
        $reason32->code = 32;
        $reason32->name = "BAJA ADMINISTRATIVA.";
        $reason32->concept = "Para dar de BAJA a los trabajadores que por haber dejado de concurrir a desempeñar sus labores, sin aviso y sin  causa justificada y la posibilidad de aplicar el procedimiento de rescisión se les da por terminada la relación de  trabajo. (ABANDONO). Este reason se utiliza como temporal hasta en tanto la baja definitiva no sea informada  a la Dirección de Personal por la Dirección de Relaciones Laborales, las personas que cubran la plaza vacante  por este reason, deberán de ser incorporadas al sistema sin excepción con tipo de contratación 3 interinos por  persona.";
        $reason32->save();

        $reason33 = new Reason();
        $reason33->code = 33;
        $reason33->name = "RESCISION HASTA RESOLUCION DEFINITIVA.";
        $reason33->concept = "Para dar de BAJA a los trabajadores a los que por causas imputables a ellos y sin responsabilidad para la  Universidad, se les da por terminada la relación de trabajo por alguna o algunas de las previstas en la Ley  Federal del Trabajo y en los contratos colectivos.Este reason se utiliza como temporal hasta en tanto la  rescisión no sea ratificada por la instancia correspondiente y notificada a la Dirección de Personal por la  Dirección de Relaciones Laborales, a quienes cubran la plaza vacante por este reason, sin excepción deberán de  ser incorporados al sistema con tipo de contratación 3 interinos por persona.";
        $reason33->save();

        $reason34 = new Reason();
        $reason34->code = 34;
        $reason34->name = "LICENCIA SIN GOCE DE SUELDO POR CARGO DE ELECCION POPULAR.";
        $reason34->concept = "Para dar de BAJA al titular de una plaza, que, como suspensión de la relación de trabajo, se le concede al  personal de la Universidad durante el tiempo que desempeñe el cargo de elección popular y para dar de ALTA a  los interinos. (clausula 62 insiso A).";
        $reason34->save();

        $reason35 = new Reason();
        $reason35->code = 35;
        $reason35->name = "LICENCIA SIN SUELDO POR FUNCIONES  DIRECTIVAS FUNCIONARIO ACA";
        $reason35->concept = "Para dar de BAJA al titular de una plaza con reason de una licencia sin goce de sueldo que la Institución le  concede a la persona que sea designada para ocupar un puesto de funcionario académico y para dar de ALTA a  sus interinos. Se ocupa cuando el empleado cobra en la plaza de funcionario.";
        $reason35->save();

        $reason36 = new Reason();
        $reason36->code = 36;
        $reason36->name = "LICENCIA SIN SUELDO POR FUNCIONES  DIRECTIVAS FUNCIONARIO ADM";
        $reason36->concept = "Para dar de BAJA al titular de una plaza con reason de una licencia sin goce de sueldo que la Institución le  concede a la persona que sea designada para ocupar un puesto de funcionario administrativo y para dar de  ALTA a sus interinos.";
        $reason36->save();

        $reason37 = new Reason();
        $reason37->code = 37;
        $reason37->name = "AUSENCIA O FALTA INJUSTIFICADA.";
        $reason37->concept = "Para dar de ALTA a los suplentes que cubren las inasistencias del personal no avalada por un justificante,  siempre y cuando el número de días no excedan de los marcados en los contratos colectivos de trabajo para  iniciar procedimiento de rescisión o proceder a baja administrativa.";
        $reason37->save();

        $reason38 = new Reason();
        $reason38->code = 38;
        $reason38->name = "LICENCIA SIN SUELDO CLÁUSULA 82 C.C.T.  FESAPAUV";
        $reason38->concept = "Para dar de BAJA al titular de una plaza con reason del otorgamiento de una licencia sin sueldo hasta por un  mes calendario durante un semestre lectivo, en casos plenamente justificados, siempre y cuando el trabajador  académico tenga un año de antigüedad y dar de ALTA a los suplentes.";
        $reason38->save();

        $reason39 = new Reason();
        $reason39->code = 39;
        $reason39->name = "SUSPENSION TEMPORAL POR SANCION";
        $reason39->concept = "Para dar de BAJA al empleado que es la suspensión de los derechos y obligaciones por un tiempo determinado  que se aplica después de concluidas las investigaciones prescritas en los Contratos por haber incurrido en alguna  irregularidad en el desempeño de su trabajo y para dar de ALTA a sus suplentes.";
        $reason39->save();

        $reason40 = new Reason();
        $reason40->code = 40;
        $reason40->name = "LICENCIA SIN GOCE DE SUELDO";
        $reason40->concept = "Para dar de BAJA de la nómina al personal de planta que se le otorga de manera especial una licencia sin goce  de sueldo por ocupar un puesto de funcionario o académico en el caso de personal de confianza, no derivado de  una elección popular y dar de ALTA al interino.";
        $reason40->save();

        $reason41 = new Reason();
        $reason41->code = 41;
        $reason41->name = "LICENCIA CONDICIONADA";
        $reason41->concept = "Para dar de BAJA de la nómina al personal académico de planta que se le otorga Licencia sin sueldo en su(s)  plaza(s) por el tiempo que requiriera para obtener el derecho a la contratación en otra plaza de mayor categoría  obtenida mediante concurso y/o asignada por consejo técnico.";
        $reason41->save();

        $reason42 = new Reason();
        $reason42->code = 42;
        $reason42->name = "SUPLENCIA";
        $reason42->concept = "Es la situacion de la ausencia de un empleado del setsuv, cuando se desconoce el reason real de ausencia del  titular, este reason es de utilizacion temporal y debera de ser sustituido por el reason real de ausencia.";
        $reason42->save();

        $reason43 = new Reason();
        $reason43->code = 43;
        $reason43->name = "LICENCIA SIN GOCE DE SUELDO POR  EXTENSION DE SABATICO";
        $reason43->concept = "Licencia sin goce de sueldo sin perjuicio de su antiguedad, que se otorga por autorizacion del rector al personal  academico al termino del año sabatico, y despues de haber disfrutado de la extension de sabatico con sueldo, las   actividades desempeñadas durante el mismo se prolongan por mas tiempo.";
        $reason43->save();

        $reason44 = new Reason();
        $reason44->code = 44;
        $reason44->name = "SUELDO DE EXCEPCION";
        $reason44->concept = "Sueldo que se le autoriza a un trabajador por convenio por el sindicato o una autorización superior y que no  coincide con el tabulador oficial.";
        $reason44->save();

        $reason45 = new Reason();
        $reason45->code = 45;
        $reason45->name = "MODIFICACIÓN DE INDICADOR DE CARGA";
        $reason45->concept = "Para modificar los indicadores de carga (normal, adicional,transitoria,excedente,obligatoria....etc).";
        $reason45->save();

        $reason46 = new Reason();
        $reason46->code = 46;
        $reason46->name = "MODIFICACIÓN DE INDICADOR DE TIPO DE INGRESO";
        $reason46->concept = "Para asignar el tipo de ingreso del personal académico (Asignada o concursada).";
        $reason46->save();

        $reason47 = new Reason();
        $reason47->code = 47;
        $reason47->name = "MODIFICACION DE INDICADOR DE PAGO";
        $reason47->concept = "Para modificar el indicador de pago.";
        $reason47->save();

        $reason48 = new Reason();
        $reason48->code = 48;
        $reason48->name = "MODIFICACION DE HORAS REALES";
        $reason48->concept = "Para modificar las horas reales del personal académico.";
        $reason48->save();

        $reason49 = new Reason();
        $reason49->code = 49;
        $reason49->name = "MODIFICACION DE VIGENCIA";
        $reason49->concept = "Para Modificar la vigencia de un ocupante.";
        $reason49->save();

        $reason50 = new Reason();
        $reason50->code = 50;
        $reason50->name = "RENUNCIA";
        $reason50->concept = "Para dar de BAJA de la nómina a los trabajadores que por voluntad expresa dan por terminada la relación de trabajo.";
        $reason50->save();

        $reason51 = new Reason();
        $reason51->code = 51;
        $reason51->name = "JUBILACION";
        $reason51->concept = "Para dar de BAJA de la nómina a los trabajadores que por voluntad expresa decidan separarse del servicio, para  someterse a los beneficios del Instituto de Pensiones del Estado.";
        $reason51->save();

        $reason52 = new Reason();
        $reason52->code = 52;
        $reason52->name = "DEFUNCION";
        $reason52->concept = "Para dar de BAJA de la nómina a los trabajadores por término de la relación de trabajo por fallecimiento.";
        $reason52->save();

        $reason53 = new Reason();
        $reason53->code = 53;
        $reason53->name = "RESCISION DEFINITIVA POR LAUDO O RECLAMO DE INDEMNIZACION";
        $reason53->concept = "Terminacion de la relacion de trabajo por causas imputables al trabajador y sin responsabilidad para la  universidad por alguna o algunas de las causas previstas en la ley federal del trabajo y en los contratos  colectivos que la junta de conciliacion haya resuelto que fueron debidamente probados.";
        $reason53->save();

        $reason54 = new Reason();
        $reason54->code = 54;
        $reason54->name = "INHABILIDAD DICTAMINADA POR INVALIDEZ MEDICA";
        $reason54->concept = "Para dar de BAJA de la nómina a los trabajadores, que por dictamen médico, se establece que queda impedido  para desempeñar cualquier tipo de trabajo por el resto de su vida y que origina la terminación de su relación  laboral.";
        $reason54->save();

        $reason55 = new Reason();
        $reason55->code = 55;
        $reason55->name = "BAJA ADMINISTRATIVA DEFINITIVA";
        $reason55->concept = "Terminacion de la relacion de trabajo por haber dejado de concurrir a desempeñar sus labores el trabajador, sin  aviso y sin causa justificada siempre que el trabajador no demande o en el juicio promovido quede aprobado el  abandono.";
        $reason55->save();

        $reason56 = new Reason();
        $reason56->code = 56;
        $reason56->name = "OBJECION A LA CAPACIDAD O DESEMPEÑO. TERMINO DE INTERINATO";
        $reason56->concept = "Para dar de BAJA de la nómina a los trabajadores que por la facultad que tiene la Institución para señalar las  irregularidades en el desempeño del personal de nuevo ingreso, en el término establecido por el Estatuto  respectivo, da lugar a la terminación de la relación de trabajo.";
        $reason56->save();

        $reason57 = new Reason();
        $reason57->code = 57;
        $reason57->name = "TERMINO DE INTERINATO";
        $reason57->concept = "Para dar de BAJA de la nómina a los trabajadores contratados como interinos, que por reincorporación  anticipada del titular a su plaza, la relación laboral se da por terminada antes de la fecha estipulada (renuncia  del titular a su licencia sin goce de sueldo).";
        $reason57->save();

        $reason58 = new Reason();
        $reason58->code = 58;
        $reason58->name = "TERMINO DE SUPLENCIA";
        $reason58->concept = "Para dar de BAJA de la nómina a los trabajadores contratados como suplentes, que por reincorporación  anticipada del titular a su plaza, la relación laboral se da por terminada antes de la fecha estipulada (renuncia  del titular a su licencia con goce de sueldo o descarga académica).";
        $reason58->save();

        $reason59 = new Reason();
        $reason59->code = 59;
        $reason59->name = "TERMINO DE EXCESO DE TRABAJO";
        $reason59->concept = "TERMINO DE LA RELACION LABORAL.- Cuando concluyen las necesidades eventuales que dieron lugar a  la contratación de Personal Administrativo, Ténnico y Manual, en la Dependencia en la que no existe personal  asignado con plaza definitiva para cubrir esa actividad.";
        $reason59->save();

        $reason60 = new Reason();
        $reason60->code = 60;
        $reason60->name = "REUBICACION DEFINTIVA";
        $reason60->concept = "Cuando un perosnal administrativo se reubica de manera definitiva o un maestro por reason de cambios de  planes de estudio deja una materia del anterior plan de estudios para reubicarse en la que corresponda del nuevo  plan. Este reason se refiere a la nueva conformacion de la carga del docente no esta referida a, la materia vacante del  plan anterior se convierte en temporal por el tiempo que se requiera impartir y se utiliza con reason 01 normal.";
        $reason60->save();

        $reason61 = new Reason();
        $reason61->code = 61;
        $reason61->name = "PERMUTA DEFINITIVA.";
        $reason61->concept = "Para MODIFICAR de manera definitiva la integración de la carga académica del personal docente por el  cambio de materias con igual número de horas entre 2 titulares de la misma entidad académica (previo dictamen  del área académica correspondiente), asi como para el personal Administrativo, técnico y Manual.";
        $reason61->save();

        $reason62 = new Reason();
        $reason62->code = 62;
        $reason62->name = "DESAPARICION DE CARGA POR PLAN DE  ESTUDIOS";
        $reason62->concept = "Cuando por falta de matricula se cierra de manera temporal o definitiva un grupo y el academico de base queda  temporalmente sin carga academica y se le sigue manteniendo su sueldo.";
        $reason62->save();

        $reason63 = new Reason();
        $reason63->code = 63;
        $reason63->name = "REUBICACIÓN TEMPORAL.";
        $reason63->concept = "Para MODIFICAR, de manera temporal, la integración de la carga académica del personal docente cuando por  tener horas pendientes de reubicar, se le asignan de manera provisional experiencias educativas vacantes.";
        $reason63->save();

        $reason64 = new Reason();
        $reason64->code = 64;
        $reason64->name = "RECATEGORIZACIÓN ACADÉMICA.";
        $reason64->concept = "Para dar de ALTA y BAJA, al académico de planta que en el proceso de promoción pasa a ocupar otra categoría  o nivel superior.";
        $reason64->save();

        $reason65 = new Reason();
        $reason65->code = 65;
        $reason65->name = "CAMBIO DE ADSCRIPCIÓN.";
        $reason65->concept = "Para dar de ALTA y BAJA a un empleado que por necesidades de la Institución, el titular de una plaza es  reubicado, de manera definitiva con su renglón presupuestal, a otra entidad académica o dependencia.";
        $reason65->save();

        $reason66 = new Reason();
        $reason66->code = 66;
        $reason66->name = "CAMBIO DE FUNCIONES.";
        $reason66->concept = "Para dar de ALTA y BAJA a un empleado académico, cuando se transforma de manera definitiva su plaza, por  modificación de la composición de la carga académica de su titular. (Ejemplos: de Investigador a Docente, de  Ejecutante a Investigador, etc.).";
        $reason66->save();

        $reason67 = new Reason();
        $reason67->code = 67;
        $reason67->name = "PROMOCION.";
        $reason67->concept = "Para dar de ALTA y BAJA a un empleado de confianza o académico de planta, que por proceso de  recategorización pasa a un nivel superior.";
        $reason67->save();

        $reason68 = new Reason();
        $reason68->code = 68;
        $reason68->name = "CAMBIO DE UBICACION TEMPORAL.";
        $reason68->concept = "Para MODIFICAR de manera temporal, la ubicación del pago a una dependencia distinta a la de adscripción de  la plaza.";
        $reason68->save();

        $reason69 = new Reason();
        $reason69->code = 69;
        $reason69->name = "PERMUTA TEMPORAL DE MATERIAS";
        $reason69->concept = "Modificacion temporal de la integracion de la carga academica de personal docente por el cambio de materias  con igual numero de horas entre 2 titulares de la misma entidad academica.";
        $reason69->save();

        $reason70 = new Reason();
        $reason70->code = 70;
        $reason70->name = "CREACION DE PLAZAS DEFINITIVAS";
        $reason70->concept = "Para identificar al ocupante de un renglon presupuestal de reciente creacion originado por la ampliacion de la  plantilla de plazas definitivas para cubrir nuevas necesidades permanentes de la institucion.";
        $reason70->save();

        $reason71 = new Reason();
        $reason71->code = 71;
        $reason71->name = "AMPLIACION DE GRUPO DEFINITIVO";
        $reason71->concept = "Para identificar y determinar el tipo de contratacion que le corresponde a los ocupantes de plazas de una nueva  creacion originadas por la autorizacion definitiva de un conjunto de materias que corresponden a un mismo  nivel, plan de estudios y programa, para cubrir las necesidades definitivas de una entidad academica.";
        $reason71->save();

        $reason72 = new Reason();
        $reason72->code = 72;
        $reason72->name = "AMPLIACION DE GRUPO TEMPORAL ";
        $reason72->concept = "Para identificar y determinar el tipo de contratacion que le corresponde a los ocupantes de plazas originadas por  la autorizacion por un periodo escolar de un conjunto de materias que corresponden a un mismo nivel, plan de  estudios y programa, para cubrir las necesidades temporales de una entidad academica.";
        $reason72->save();

        $reason73 = new Reason();
        $reason73->code = 73;
        $reason73->name = "MATERIA TEMPORAL";
        $reason73->concept = "Para identificar y limitar el tiempo de contratacion que le corresponde al ocupante de una plaza originada por la  autorizacion por un periodo escolar de una materia o experiencia educativa para cubrir la necesidad temporal  en una entidad academica.";
        $reason73->save();

        $reason74 = new Reason();
        $reason74->code = 74;
        $reason74->name = "EXCESO DE TRABAJO";
        $reason74->concept = "Para identificar y controlar los tiempos de ocupacion de las plazas temporales creadas para cubrir necesidades  eventuales del personal administrativo, tecnico y manual y que no es posible atender con el personal en plantilla.";
        $reason74->save();

        $reason75 = new Reason();
        $reason75->code = 75;
        $reason75->name = "PLAZA VACANTE";
        $reason75->concept = "Se ocupa para identificar a los ocupantes de las plazas definitivas del setsuv que se encuentran vacantes  definitivas y que son utilizadas de manera temporal por interinos.";
        $reason75->save();

        $reason76 = new Reason();
        $reason76->code = 76;
        $reason76->name = "AUTORIZACIÓN ACADÉMICA";
        $reason76->concept = "Para dar de ALTA a los suplentes del personal académico, que se reincorpora a sus actividades docentes y por  reasons plenamente justificados se le asigna al titular otra actividad y el suplente debe de continuar con la  suplencia.";
        $reason76->save();

        $reason77 = new Reason();
        $reason77->code = 77;
        $reason77->name = "TRANSFORMACION DE PLAZA";
        $reason77->concept = "Se ocupa para los casos en que por necesidades de la institucion se requiere que una plaza asignada a una  dependencia para cubrir una funcion sea convertida en otra con diferentes caracteristicas que le permitan cubrir  otra funcion especifica. siempre que las funciones correspondan al mismo tipo de personal.";
        $reason77->save();

        $reason78 = new Reason();
        $reason78->code = 78;
        $reason78->name = "DESCONGELAMIENTO TEMPORAL DE PLAZA";
        $reason78->concept = "Para descongelar de manera temporal una plaza.";
        $reason78->save();

        $reason79 = new Reason();
        $reason79->code = 79;
        $reason79->name = "ALTA DE PLAZA TEMPORAL";
        $reason79->concept = "Se ocupa para adicionar materias como complemento de carga a plazas de no docentes (inv. tecnicos y  ejecutantes).";
        $reason79->save();

        $reason80 = new Reason();
        $reason80->code = 80;
        $reason80->name = "ERROR EN CAPTURA";
        $reason80->concept = "Valida unicamente: en el modulo de plazas para efectuar las correcciones de los datos de una plaza capturados  con errores y, en el modulo de control de asistencia para capturar la justificacion de inasistencias y efectuar la  devolucion del importe descontado cuando este se debio a un error de captura del dato en el sistema de personal, en ambos casos se requiere para el uso de este reason de la clave especial al sistema.";
        $reason80->save();

        $reason81 = new Reason();
        $reason81->code = 81;
        $reason81->name = "ERROR EN REPORTE";
        $reason81->concept = "Válido unicamente para efectuar correcciones en el modulo de control de asistencia para capturar la  justificacion de la inasistencia y efectuar la devolucion del importe correspondiente cuando esta se debio a un  error del responsable del reporte de inasistencia en la entidad academica, en este caso se requiere de la clave de  acceso especial al sistema para el uso de este reason.";
        $reason81->save();

        $reason82 = new Reason();
        $reason82->code = 82;
        $reason82->name = "JUSTIFICACION EXTEMPORANEA";
        $reason82->concept = "Válido unicamente para efectuar correcciones en el modulo de control de asistencia para capturar la  justificacion de la inasistencia y efectuar la devolucion del importe correspondiente cuando esta se debio a un  error del responsable en la entidad academica de enviar el justificante de la inasistencia, en este caso se requiere  de la clave de la autorizacion del director general de recursos humanos y de la clave de acceso especial al  sistema para el uso de este reason.";
        $reason82->save();

        $reason83 = new Reason();
        $reason83->code = 83;
        $reason83->name = "JUSTIFICACION EXTRAORDINARIA";
        $reason83->concept = "Valido unicamente para efectuar correcciones en el modulo de control de inasistencias para casos especiales en  que se demuestre que por reasons de fuerza mayor no pudo ser entregada a tiempo la justificacion  correspondiente,lo autoriza unicamente el director general de recursos humanos y se requiere de la clave de  acceso especial al sistema para el uso de este reason.";
        $reason83->save();

        $reason84 = new Reason();
        $reason84->code = 84;
        $reason84->name = "CANCELACIÓN DE JUSTIFICANTE DE INASISTENCIAS";
        $reason84->concept = "Para la cancelación justificante de una Inasistencia (Personal Académico)";
        $reason84->save();

        $reason85 = new Reason();
        $reason85->code = 85;
        $reason85->name = "MODIFICACION DE PUESTO, CATEGORIA Y TIPO DE CONTRATACION";
        $reason85->concept = "Para modificar Puesto, Categoría y Contratación";
        $reason85->save();

        $reason86 = new Reason();
        $reason86->code = 86;
        $reason86->name = "TERMINO DE BECA";
        $reason86->concept = "Para dar de BAJA a los becarios, cuando la beca se da por terminada antes de la fecha estipulada en la propuesta";
        $reason86->save();

        $reason87 = new Reason();
        $reason87->code = 87;
        $reason87->name = "RESCISION POR FALTA DE PROBIDAD Y HONRADEZ";
        $reason87->concept = "Termino de la relacion laboral sin responsabilidad para la institucion cuando el trabajador incurra en alguna  falta que demuestre la falta de credibilidad sobre el.";
        $reason87->save();

        $reason88 = new Reason();
        $reason88->code = 88;
        $reason88->name = "LIQUIDACION CON RESPONSABILIDAD INDEMNIZACION";
        $reason88->concept = "Termino de la relacion laboral no imputable al trabajador en el que la universidad este obligada a pagar una  indeminizacion al trabajador.";
        $reason88->save();

        $reason89 = new Reason();
        $reason89->code = 89;
        $reason89->name = "TERMINO DE CONTRATO";
        $reason89->concept = "Para dar de BAJA al personal contratado por obra y tiempo determinado, se da por terminada la relación laboral  antes de la fecha estipulada en el contrato.";
        $reason89->save();

        $reason90 = new Reason();
        $reason90->code = 90;
        $reason90->name = "BASIFICACION";
        $reason90->concept = "Adquisicion de la titularidad en una plaza.";
        $reason90->save();

        $reason91 = new Reason();
        $reason91->code = 91;
        $reason91->name = "CATEGORIZACION";
        $reason91->concept = "Proceso academico para asignar la categoria que le corresponde al personal academico de nuevo ingreso de  acuerdo a su grado academico.";
        $reason91->save();

        $reason92 = new Reason();
        $reason92->code = 92;
        $reason92->name = "CAMBIO DE PLAN DE ESTUDIOS (H.P.R.)";
        $reason92->concept = "Son las horas no impartidas por un docente cuando por cambio de plan de estudios desaparece alguna de las  materias o reduce el numero de horas asignadas de base al empleado y sobre las cuales la universidad tiene la  obligacion de cubrir el sueldo correspondiente hasta en tanto no le sea asignada la carga que sustituya estas  horas.";
        $reason92->save();

        $reason93 = new Reason();
        $reason93->code = 93;
        $reason93->name = "ASCENSO ESCALAFONARIO DEFINITIVO";
        $reason93->concept = "Es la promocion definitiva a una categoria superior que recibe un empleado sindicalizado.";
        $reason93->save();

        $reason94 = new Reason();
        $reason94->code = 94;
        $reason94->name = "ASCENSO ESCALAFONARIO TEMPORAL";
        $reason94->concept = "Es la promocion temporal a una categoria superior que recibe un empleado sindicalizado.";
        $reason94->save();

        $reason95 = new Reason();
        $reason95->code = 95;
        $reason95->name = "REINSTALACION";
        $reason95->concept = "Reincorporacion de un empleado que fue rescindido y por dictamen condenatorio de la autoridad competente se  le tiene que reinstalar su trabajo.";
        $reason95->save();

        $reason96 = new Reason();
        $reason96->code = 96;
        $reason96->name = "PROMOCIÓN TEMPORAL.";
        $reason96->concept = "Para dar de ALTA y BAJA a un empleado de confianza, que de manera temporal pasa a ocupar otra categoría y/  o puesto";
        $reason96->save();

        $reason97 = new Reason();
        $reason97->code = 97;
        $reason97->name = "PERMUTA TEMPORAL";
        $reason97->concept = "Se utiliza para identificar a los ocupantes que efectuan un cambio temporal de dependencia entre dos  trabajadores con igual categoria y puesto. la plaza no se modifica, unicamente se cambia a los trabajadores de plaza.";
        $reason97->save();

        $reason98 = new Reason();
        $reason98->code = 98;
        $reason98->name = "REUBICACION CON TRANSFORMACION DE  PLAZA";
        $reason98->concept = "Es el cambio de adscripcion con modificacion de categoria y puesto que se efectua a traves de una negociacion  entre institucion y el sindicato que se le da a un empleado del setsuv, cuando se requiere para cubrir los datos de  la plaza.";
        $reason98->save();

        $reason99 = new Reason();
        $reason99->code = 99;
        $reason99->name = "MODIFICACIÓN DE SUELDO";
        $reason99->concept = "Para MODIFICAR temporalmente el pago del personal contratado como personal de eventual y honorarios  asimilados a salario.";
        $reason99->save();

        $reason100 = new Reason();
        $reason100->code = 100;
        $reason100->name = "MODIFICACION FECHA DE CONTRATACION";
        $reason100->concept = "Se usa para poder modificar el periodo de contratacion de las plazas temporales.";
        $reason100->save();

        $reason101 = new Reason();
        $reason101->code = 101;
        $reason101->name = "MODIFICACION DE HORARIOS";
        $reason101->concept = "Se usa para modificar los horarios del personal de confianza.";
        $reason101->save();

        $reason102 = new Reason();
        $reason102->code = 102;
        $reason102->name = "REPORTE MARCA PLAZAS PROMEP";
        $reason102->concept = "Se usa para modificar el campo de la plaza en donde se identifica como fue reportada una plaza a las entidades externas.";
        $reason102->save();

        $reason103 = new Reason();
        $reason103->code = 103;
        $reason103->name = "BAJA POR ERROR DE CAPTURA";
        $reason103->concept = "Se usa para todos los tipos de personal para dar de baja por algun error de captura.";
        $reason103->save();

        $reason104 = new Reason();
        $reason104->code = 104;
        $reason104->name = "CAMBIO DE ADSCRIPCION TEMPORAL DE LA  PERSONA";
        $reason104->concept = "Para dar de baja de manera temporal al ocupante que pasa a ocupar en otra dependencia la misma categoría.";
        $reason104->save();

        $reason105 = new Reason();
        $reason105->code = 105;
        $reason105->name = "CAMBIO DE ADSCRIPCION DEFINITIVA DE LA PERSONA";
        $reason105->concept = "Para dar de baja de manera definitiva al ocupante que pasa a ocupar en otra dependencia la misma categoría.";
        $reason105->save();

        $reason106 = new Reason();
        $reason106->code = 106;
        $reason106->name = "MODIFICAR HORAS ACADEMICO PLAN  ANTERIOR";
        $reason106->concept = "Modificar las horas del plan anterior.";
        $reason106->save();

        $reason107 = new Reason();
        $reason107->code = 107;
        $reason107->name = "MODIFICA INDICADOR SUELDO PARTIDO";
        $reason107->concept = "Para modificar el sueldo partido de un académico.";
        $reason107->save();

        $reason108 = new Reason();
        $reason108->code = 108;
        $reason108->name = "CAMBIO DE TIPO DE PERSONAL";
        $reason108->concept = "Para dar de baja al personal eventual o de honorarios asimilados a salario por cambio de tipo de personal.";
        $reason108->save();

        $reason109 = new Reason();
        $reason109->code = 109;
        $reason109->name = "DESCUENTO POR INASISTENCIAS PERSONAL  DE APOYO Y EVENTUAL";
        $reason109->concept = "Para realizar descuentos por inasistencia personal de apoyo y eventual";
        $reason109->save();

        $reason110 = new Reason();
        $reason110->code = 110;
        $reason110->name = "MODIFICACIÓN DE CARGA";
        $reason110->concept = "Para asignar carga faltante.";
        $reason110->save();

        $reason111 = new Reason();
        $reason111->code = 111;
        $reason111->name = "ALTA TEMPORAL PERSONAL EVENTAL Y DE  APOYO";
        $reason111->concept = "Para dar de alta al personal Eventual y de Apoyo en el formato de requerimientos.";
        $reason111->save();

        $reason112 = new Reason();
        $reason112->code = 112;
        $reason112->name = "BAJA ESPECIAL PERSONAL EVENTUAL";
        $reason112->concept = "Se usa para dar de baja al personal de Eventual y de Honorarios Asimilados a salario sin quita el registro de cargas.";
        $reason112->save();

        $reason113 = new Reason();
        $reason113->code = 113;
        $reason113->name = "MODIFICACION DE HORAS PENDIENTES";
        $reason113->concept = "Para modificar Horas pendientes.";
        $reason113->save();

        $reason114 = new Reason();
        $reason114->code = 114;
        $reason114->name = "BAJA POR CIERRE DE EXPERIENCIA EDUCATIVA";
        $reason114->concept = "Para dar de Baja a los academicos por cierre de una experiencia educativa.";
        $reason114->save();

        $reason115 = new Reason();
        $reason115->code = 115;
        $reason115->name = "MODIFICA INDICADOR DE FORMATO";
        $reason115->concept = "Para modificar el indicador de si la captura del formato de personal academico fue con formato original 'O' o con copia 'C'.";
        $reason115->save();

        $reason116 = new Reason();
        $reason116->code = 116;
        $reason116->name = "ACTUALIZACION DE FECHAS POR CAMBIO DE  SEMESTRE";
        $reason116->concept = "CAMBIO DE FECHAS EN PLAZAS, OCUPANTES Y SUPLENTES POR CAMBIO DE SEMESTRE  PROFESORES DE ASIGNATURA.";
        $reason116->save();

        $reason117 = new Reason();
        $reason117->code = 117;
        $reason117->name = "BAJAS Y CAMBIOS MOVIMIENTOS reason 112";
        $reason117->concept = "Para hacer cambios y bajas a los movimientos de personal de apoyo que tengan reason 112.";
        $reason117->save();

        $reason118 = new Reason();
        $reason118->code = 118;
        $reason118->name = "EXCESO DE TRABAJO E";
        $reason118->concept = "Para exceso de trabajo de plazas diferentes a las 90000.";
        $reason118->save();

        $reason119 = new Reason();
        $reason119->code = 119;
        $reason119->name = "MARCA AÑO Y OFICIO DE PLAZAS AUTORIZADAS";
        $reason119->concept = "Se usa para modificar en Plazas el año y el numero de oficio de las plazas autorizadas";
        $reason119->save();

        $reason120 = new Reason();
        $reason120->code = 120;
        $reason120->name = "OCUPADA NORMAL CONGELADA";
        $reason120->concept = "Para dar de alta a los titulares de una plaza que se mantendra congelada sin suplente o interino hasta que la  ocupe el tutular";
        $reason120->save();

        $reason121 = new Reason();
        $reason121->code = 121;
        $reason121->name = "FUNCIONARIOS COBRAN COMO ACADEMICO";
        $reason121->concept = "Para incorporar a los funcionarios que cobran como acacdemicos.";
        $reason121->save();

        $reason122 = new Reason();
        $reason122->code = 122;
        $reason122->name = "DESTITUCION DEL CARGO ";
        $reason122->concept = "Termino de la relacion laboralsin responsabilidad para la institucion cuando un funcionario incurra en alguna falta.";
        $reason122->save();

        $reason123 = new Reason();
        $reason123->code = 123;
        $reason123->name = "DESCARGA ACADEMICA TOTAL POR COMISION  INSTITUCIONAL ADMVA";
        $reason123->concept = "Para dar de ALTA a los suplentes del personal académico, que deja de impartir por un tiempo determinado, toda  su carga académica, para realizar en la propia institución, actividades distintas a las de su nombramiento. Se  utiliza para las funciones administrativas.";
        $reason123->save();

        $reason124 = new Reason();
        $reason124->code = 124;
        $reason124->name = "DESCARGA ACADEMICA PARCIAL POR  COMISION INSTITUCIONAL ADMVA";
        $reason124->concept = "Para dar de ALTA a los suplentes del personal académico, que deja de impartir por un tiempo determinado,  parte de su carga académica, para realizar en la propia institución, actividades distintas a las de su  nombramiento. Se utiliza para las funciones administrativas.";
        $reason124->save();

        $reason125 = new Reason();
        $reason125->code = 125;
        $reason125->name = "LICENCIA POR PATERNIDAD";
        $reason125->concept = "Para dar de ALTA a los suplentes del personal que se ausenta hasta por 5 dias a partir del nacimiento de su hijo (a).";
        $reason125->save();

        $reason126 = new Reason();
        $reason126->code = 126;
        $reason126->name = "REUBICACION TEMPORAL EN POSGRADO";
        $reason126->concept = "Para dar de ALTA a los suplentes del personal académico de planta, que deja de impartir temporalmente EE en  licenciatura para impartir en Posgrado.";
        $reason126->save();

        $reason127 = new Reason();
        $reason127->code = 127;
        $reason127->name = "CONCLUSION DE OBRA A TIEMPO DETERMINADO";
        $reason127->concept = "Para dar la Baja a los trabajadores eventuales y de honorarios asimilados a salario cuando se cloncluye un proyecto.";
        $reason127->save();

        $reason128 = new Reason();
        $reason128->code = 128;
        $reason128->name = "TERMINO DE VIGENCIA MIGRATORIA";
        $reason128->concept = "Para dar de Baja al personal extranjero que tine vencido su documento migratorio.";
        $reason128->save();

        $reason129 = new Reason();
        $reason129->code = 129;
        $reason129->name = "PAGO UNICO ANUAL HONORARIOS ASIMILADOS";
        $reason129->concept = "Para registrar el pago unico anual al personal de honorarios asimilados a salario.";
        $reason129->save();

        $reason130 = new Reason();
        $reason130->code = 130;
        $reason130->name = "RESCISION DE CONTRATO";
        $reason130->concept = "Termino de la relación laboral en la Institución.";
        $reason130->save();

        $reason131 = new Reason();
        $reason131->code = 131;
        $reason131->name = "LICENCIA SIN GOCE DE SUELDO POR  DESEMPEÑO DE CARGO PUBLICO";
        $reason131->concept = "Para dar de BAJA de la nómina al personal de planta que se le otorga una licencia sin goce de sueldo por ocupar  un puesto de funcionario público, no derivado de una elección popular y dar de alta al interino.";
        $reason131->save();

        $reason132 = new Reason();
        $reason132->code = 132;
        $reason132->name = "PROMOCION A PUESTO DIRECTIVO";
        $reason132->concept = "Para dar de ALTA y BAJA a un Personal Academico o de Mandos Medios y Superiores, que por proceso de  promoción se modifica su salario.";
        $reason132->save();

        $reason133 = new Reason();
        $reason133->code = 133;
        $reason133->name = "REGISTRO DE HORAS DE EXTRACLASE";
        $reason133->concept = "PARA REGISTRAR LAS HORAS DE EXTRACLASE (GENERACION Y APLICACION DEL  CONOCIMIENTO, GESTION ACADEMICA Y TUTORIAS).";
        $reason133->save();

        $reason134 = new Reason();
        $reason134->code = 134;
        $reason134->name = "ALTA TEMPORAL GRAT.EXT";
        $reason134->concept = "PARA DAR DE ALTA LA GRATIFICACIÓN EXTRAORDINARIA.";
        $reason134->save();

        $reason135 = new Reason();
        $reason135->code = 135;
        $reason135->name = "MODIFICACION DE FUNCIONES";
        $reason135->concept = "Modificar la clave y name del puesto funcional con el que fue creado el renglon presupuestal de personal  eventual de acuerdo a las actividades que desempeña el trabajador, sin que ello represente un cambio de sueldo  o total de horas.";
        $reason135->save();

        $reason999 = new Reason();
        $reason999->code = 999;
        $reason999->name = "NO PAGO";
        $reason999->concept = "No, pago para identificar que no es posible descontarle a esa persona ya que no percibe sueldo.";
        $reason999->save();

    }
}
