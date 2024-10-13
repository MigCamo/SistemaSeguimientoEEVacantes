<?php

namespace Database\Seeders;

use App\Models\Motivo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $motivo1 = new Motivo();
        $motivo1->numeroMotivo = 1;
        $motivo1->nombre = "OCUPADA NORMAL";
        $motivo1->concepto = "Para dar de ALTA a los titulares de una plaza, a los ITD, a los IOD y para reincorporar al personal al término de  cualquier motivo de separación temporal, así como los nombramientos.";
        $motivo1->save();

        $motivo2 = new Motivo();
        $motivo2->numeroMotivo = 2;
        $motivo2->nombre = "AÑO SABÁTICO";
        $motivo2->concepto = "Para dar de ALTA a los Suplentes del personal académico que disfruta de Licencia con goce de sueldo durante  un año por habérsele otorgado el beneficio del Año Sabático.";
        $motivo2->save();

        $motivo3 = new Motivo();
        $motivo3->numeroMotivo = 3;
        $motivo3->nombre = "EXTENSIÓN DE AÑO SABÁTICO";
        $motivo3->concepto = "Para dar de ALTA a los Suplentes del personal académico que disfruta de Licencia con goce de sueldo al  término del año sabático, cuando las actividades desempeñadas durante el mismo se prolongan por más del año.";
        $motivo3->save();

        $motivo4 = new Motivo();
        $motivo4->numeroMotivo = 4;
        $motivo4->nombre = "DESCARGA ACADÉMICA TOTAL POR ESTUDIOS  DE POSGRADO";
        $motivo4->concepto = "Para dar de ALTA a los Suplentes del personal académico, que durante un tiempo definido deja de impartir  toda su carga académica, para dedicarse a estudios de Posgrado.";
        $motivo4->save();

        $motivo5 = new Motivo();
        $motivo5->numeroMotivo = 5;
        $motivo5->nombre = "DESCARGA ACADÉMICA PARCIAL POR ESTUDIOS  DE POSGRADO";
        $motivo5->concepto = "Para dar de ALTA a los Suplentes del personal académico, que durante un tiempo definido deja de impartir  parte de su carga académica, para dedicarse a estudios de Posgrado.";
        $motivo5->save();

        $motivo6 = new Motivo();
        $motivo6->numeroMotivo = 6;
        $motivo6->nombre = "DESCARGA ACADÉMICA TOTAL POR  FUNCIONES DIRECTIVAS";
        $motivo6->concepto = "Para dar de ALTA a los suplentes del personal académico, que es descargado en la totalidad de su carga  académica para desempeñar un puesto de funcionario, se utiliza únicamente cuando el empleado sigue cobrando  en su plaza de académico.";
        $motivo6->save();

        $motivo7 = new Motivo();
        $motivo7->numeroMotivo = 7;
        $motivo7->nombre = "DESCARGA ACADÉMICA PARCIAL POR  FUNCIONES DIRECTIVAS";
        $motivo7->concepto = "Para dar de ALTA a los suplentes del personal académico, que es descargado en parte de su carga académica  para desempeñar un puesto de funcionario, se utiliza únicamente cuando el empleado sigue cobrando en su  plaza de académico.";
        $motivo7->save();

        $motivo8 = new Motivo();
        $motivo8->numeroMotivo = 8;
        $motivo8->nombre = "DESCARGA ACADÉMICA TOTAL POR COMISIÓN  ACADÉMICA";
        $motivo8->concepto = "Para dar de ALTA a los suplentes del personal académico, que deja de impartir por un tiempo definido, toda su  carga académica, para dedicarse a actividades académicas relacionadas con el Modelo Educativo Integral y  Flexible.";
        $motivo8->save();

        $motivo9 = new Motivo();
        $motivo9->numeroMotivo = 9;
        $motivo9->nombre = "DESCARGA ACADÉMICA PARCIAL POR  COMISIÓN ACADÉMICA";
        $motivo9->concepto = "Para dar de ALTA a los Suplentes del personal académico, que deja de impartir por un tiempo definido, parte  de su carga académica, para dedicarse a actividades académicas relacionadas con el Modelo Educativo Integral  y Flexible.";
        $motivo9->save();

        $motivo10 = new Motivo();
        $motivo10->numeroMotivo = 10;
        $motivo10->nombre = "PERMISO EXTRAORDINARIO";
        $motivo10->concepto = "LICENCIA CON SUELDO.- Que se le concede al personal académico por periodos máximo de 2 días para  cumplir con cargos específicos como asistencia a toma de poseciones de funcionarios, eventos extraordinarios  promovidos por la rectoría, a maestros consejeros para asistir a los consejos universitarios, desfile del primero de  Mayo, en revisiones contractuales a los delegados sexenales de regiones foráneas, (solo se ocupa para  justificación de inasistencias, no se generan suplencias para estos motivos salvo en el caso de hospital escuela)  para la justificación de inasistencias requiere de la autorización del Director General de Recursos Humanos.";
        $motivo10->save();

        $motivo11 = new Motivo();
        $motivo11->numeroMotivo = 11;
        $motivo11->nombre = "DESCARGA ACADÉMICA TOTAL POR  COMISION INSTITUCIONAL";
        $motivo11->concepto = "Para dar de ALTA a los Suplentes del personal académico, que deja de impartir por un tiempo determinado,  toda su carga académica, para realizar en la propia Institución, actividades distintas a las de su nombramiento.  Se utiliza para los casos en que no existe plaza presupuestada para la función encomendada por ejemplo:  Encargados de clínicas o laboratorio.";
        $motivo11->save();

        $motivo12 = new Motivo();
        $motivo12->numeroMotivo = 12;
        $motivo12->nombre = "DESCARGA ACADEMICA PARCIAL POR  COMISION INSTITUCIONAL ACAD";
        $motivo12->concepto = "Para dar de ALTA a los Suplentes del personal académico de planta, que deja de impartir por un tiempo  determinado, parte de su carga académica, para realizar en la propia Institución, actividades distintas a las de su  nombramiento.";
        $motivo12->save();

        $motivo13 = new Motivo();
        $motivo13->numeroMotivo = 13;
        $motivo13->nombre = "DESCARGA ACADEMICA PARCIAL POR  COMISION INSTITUCIONAL ACAD";
        $motivo13->concepto = "Para dar de ALTA a los Suplentes del personal de planta, que deja de laborar por un tiempo determinado, toda  su carga de trabajo, para que de acuerdo al Convenio firmado con el FESAPAUV el 7 de noviembre de 1986, y  contrato colectivo del SETSUV, se dedique a actividades propias del sindicato.";
        $motivo13->save();

        $motivo14 = new Motivo();
        $motivo14->numeroMotivo = 14;
        $motivo14->nombre = "LICENCIAS CON GOCE DE SUELDO POR  COMISION SINDICAL TOTAL";
        $motivo14->concepto = "Para dar de ALTA a los Suplentes del personal de planta, que deja de laborar por un tiempo determinado, hasta  por medio tiempo de su carga de trabajo, para que de acuerdo al Convenio firmado con el FESAPAUV el 7 de  noviembre de 1986, y contrato colectivo del SETSUV se dedique a actividades propias del sindicato.";
        $motivo14->save();

        $motivo15 = new Motivo();
        $motivo15->numeroMotivo = 15;
        $motivo15->nombre = "INCAPACIDAD MÉDICA";
        $motivo15->concepto = "Para dar de ALTA a los suplentes del personal académico ,confianza y administrativo, técnico y manual, que  deja de laborar su carga de trabajo, por el periodo que indique la constancia médica a los empleados que  padezcan alguna enfermedad, cualquiera que sea su naturaleza, siempre y cuando se justifique la necesidad y se  cuente con la autorización previa de la dirección general de recursos humanos para suplirlo.";
        $motivo15->save();

        $motivo16 = new Motivo();
        $motivo16->numeroMotivo = 16;
        $motivo16->nombre = "LICENCIA POR TITULACIÓN";
        $motivo16->concepto = "Para dar de ALTA a los Suplentes del personal académico, que deja de impartir su carga académica hasta por  30 días, por tener licencia con goce de sueldo para titulación.";
        $motivo16->save();

        $motivo17 = new Motivo();
        $motivo17->numeroMotivo = 17;
        $motivo17->nombre = "PERMISO ECONÓMICO";
        $motivo17->concepto = "Para dar de ALTA a los suplentes del personal académico, confianza y administrativo, técnico y manual, por  tener permiso con goce de sueldo para faltar a sus labores, siempre y cuando se justifique la necesidad y se  cuente con la autorización previa de la dirección general de recursos humanos para suplirlo.";
        $motivo17->save();

        $motivo18 = new Motivo();
        $motivo18->numeroMotivo = 18;
        $motivo18->nombre = "ASISTENCIA A EVENTOS ACADÉMICOS";
        $motivo18->concepto = "Para dar de ALTA a los Suplentes del personal académico por licencia con goce de sueldo que se le otorga al  personal académico hasta por 10 días al año para asistir a eventos académicos, siempre y cuando se justifique la  necesidad y se cuente con la autorización previa de la Dirección General de Recursos Humanos para suplirlo.";
        $motivo18->save();

        $motivo19 = new Motivo();
        $motivo19->numeroMotivo = 19;
        $motivo19->nombre = "REPOSICIÓN DE VACACIONES POR INCAPACIDAD MÉDICA";
        $motivo19->concepto = "Para dar de ALTA a los Suplentes del personal académico, confianza y administrativo, técnico y manual, al  término de la incapacidad médica del trabajador que se encuentre incapacitado en cualquiera de los períodos  vacacionales oficiales.";
        $motivo19->save();

        $motivo20 = new Motivo();
        $motivo20->numeroMotivo = 20;
        $motivo20->nombre = "VACACIONES ADICIONALES";
        $motivo20->concepto = "Para dar de ALTA a los Suplentes, que cubren los días laborales adicionales de vacaciones que disfruta el  personal de Confianza y administrativo, técnico y manual, las cuales se conceden en razón de los años de  servicios, siempre y cuando se justifique la necesidad y se cuente con la autorización previa de la Dirección  General de Recursos Humanos para suplirlo.";
        $motivo20->save();

        $motivo21 = new Motivo();
        $motivo21->numeroMotivo = 21;
        $motivo21->nombre = "CAPACITACIÓN AL PERSONAL NO ACADÉMICO";
        $motivo21->concepto = "Para dar de ALTA a los Suplentes, que cubren los días laborales adicionales de vacaciones que disfruta el  personal de Confianza y administrativo, técnico y manual, las cuales se conceden en razón de los años de  servicios, siempre y cuando se justifique la necesidad y se cuente con la autorización previa de la Dirección  General de Recursos Humanos para suplirlo.";
        $motivo21->save();

        $motivo22 = new Motivo();
        $motivo22->numeroMotivo = 22;
        $motivo22->nombre = "VACACIONES NORMALES";
        $motivo22->concepto = "Para dar de ALTA a los Suplentes que cubren los períodos normales de vacaciones que se otorgan a los  trabajadores, que por las características especiales de ciertas dependencias, tienen que ser cubiertos, siempre y  cuando se justifique la necesidad y se cuente con la autorización previa de la Dirección General de Recursos  Humanos para suplirlo.";
        $motivo22->save();

        $motivo23 = new Motivo();
        $motivo23->numeroMotivo = 23;
        $motivo23->nombre = "DIAS FESTIVOS";
        $motivo23->concepto = "Para dar de ALTA a los Suplentes del personal en sus descansos de días festivos, que por necesidades especiales de las dependencias, tienen que ser cubiertos por suplentes o por los mismos titulares, siempre y cuando se  justifique la necesidad y se cuente con la autorización previa de la Dirección General de Recursos Humanos  para suplirlo.";
        $motivo23->save();

        $motivo24 = new Motivo();
        $motivo24->numeroMotivo = 24;
        $motivo24->nombre = "COMISIÓN ADMINISTRATIVA";
        $motivo24->concepto = "Para dar de ALTA a los Suplentes del personal de confianza, que por ausencia excepcional del trabajador de  confianza previa autorización de la autoridad competente para desempeñar temporalmente sus funciones en un  lugar diferente al de su adscripción, siempre y cuando se justifique la necesidad y se cuente con la autorización  previa de la Dirección General de Recursos Humanos para suplirlo.";
        $motivo24->save();

        $motivo25 = new Motivo();
        $motivo25->numeroMotivo = 25;
        $motivo25->nombre = "PRORROGA PARA TITULACIÓN";
        $motivo25->concepto = "Para dar de ALTA a los Suplentes del personal académico, que deja de impartir su carga académica hasta por  15 días más como prorroga a la licencia con sueldo para titulación en casos justificados, para que se titulen.";
        $motivo25->save();

        $motivo26 = new Motivo();
        $motivo26->numeroMotivo = 26;
        $motivo26->nombre = "PRACTICAS DE ESTUDIOS CLAUSULA 61.2 C.C.T. (S.E.T.S.U.V.)";
        $motivo26->concepto = "Licencia con goce de sueldo; la otorga la institución a los trabajadores del SETSUV que estudian en la UV  cuando tienen que efectuar viajes de prácticas escolares, por el tiempo que duren las prácticas.";
        $motivo26->save();

        $motivo27 = new Motivo();
        $motivo27->numeroMotivo = 27;
        $motivo27->nombre = "PENDIENTE DE REUBICAR POR DICTAMEN  MÉDICO";
        $motivo27->concepto = "Para dar de ALTA a los suplentes que por dictamen médico permite que el titular pueda ser reubicado a realizar  funciones diferentes.";
        $motivo27->save();

        $motivo28 = new Motivo();
        $motivo28->numeroMotivo = 28;
        $motivo28->nombre = "ASISTENCIA A EVENTOS SINDICALES  (FESAPAUV)";
        $motivo28->concepto = "La universidad concederá hasta 3 dias de permiso con goce de sueldo, para asistir a eventos sindicales, tales  como desfiles de primero de mayo, conmemoración día del maestro, aniversario de sindicato, etc.";
        $motivo28->save();

        $motivo29 = new Motivo();
        $motivo29->numeroMotivo = 29;
        $motivo29->nombre = "CLAUSULA 68.35(SETSUV)";
        $motivo29->concepto = "La universidad concederá tres dias de permiso con goce de salario, en el caso de fallecimiento de conyuge,de la  concubina o concubino, padres o hijos del trabajador, quedando obligado este a justificar plenamente el hecho  en que en un plazo no mayor de 5 dias de la fecha de que ocurre el deceso, por conducto del sindicato; se  procederá a efectuar el descuento que corresponda.";
        $motivo29->save();

        $motivo30 = new Motivo();
        $motivo30->numeroMotivo = 30;
        $motivo30->nombre = "LICENCIAS SIN GOCE DE SUELDO POR  DERECHO DE ANTIGÜEDAD.";
        $motivo30->concepto = "Para dar de BAJA al personal titular de una plaza y ALTA a los interinos del personal académico y de  confianza, al que se otorgan al personal para separarse temporalmente del servicio sin goce de sueldo, con base  en la normatividad, y el caso de personal del SETSUV y confianza será en licencias mayores a 15 días.";
        $motivo30->save();

        $motivo31 = new Motivo();
        $motivo31->numeroMotivo = 31;
        $motivo31->nombre = "ARRESTO ADMINISTRATIVO.";
        $motivo31->concepto = "Para dar de BAJA al ocupante de una plaza y ALTA a los interinos del personal académico, confianza y  administrativo, técnico y manual que por detención de un trabajador derivada de violaciones cometidas al  reglamento de policía y buen gobierno, que origina la suspensión de la relación de trabajo por el tiempo que  permanezca privado de su libertad, (clausula 23.2) SETSUV.";
        $motivo31->save();

        $motivo32 = new Motivo();
        $motivo32->numeroMotivo = 32;
        $motivo32->nombre = "BAJA ADMINISTRATIVA.";
        $motivo32->concepto = "Para dar de BAJA a los trabajadores que por haber dejado de concurrir a desempeñar sus labores, sin aviso y sin  causa justificada y la posibilidad de aplicar el procedimiento de rescisión se les da por terminada la relación de  trabajo. (ABANDONO). Este motivo se utiliza como temporal hasta en tanto la baja definitiva no sea informada  a la Dirección de Personal por la Dirección de Relaciones Laborales, las personas que cubran la plaza vacante  por este motivo, deberán de ser incorporadas al sistema sin excepción con tipo de contratación 3 interinos por  persona.";
        $motivo32->save();

        $motivo33 = new Motivo();
        $motivo33->numeroMotivo = 33;
        $motivo33->nombre = "RESCISION HASTA RESOLUCION DEFINITIVA.";
        $motivo33->concepto = "Para dar de BAJA a los trabajadores a los que por causas imputables a ellos y sin responsabilidad para la  Universidad, se les da por terminada la relación de trabajo por alguna o algunas de las previstas en la Ley  Federal del Trabajo y en los contratos colectivos.Este motivo se utiliza como temporal hasta en tanto la  rescisión no sea ratificada por la instancia correspondiente y notificada a la Dirección de Personal por la  Dirección de Relaciones Laborales, a quienes cubran la plaza vacante por este motivo, sin excepción deberán de  ser incorporados al sistema con tipo de contratación 3 interinos por persona.";
        $motivo33->save();

        $motivo34 = new Motivo();
        $motivo34->numeroMotivo = 34;
        $motivo34->nombre = "LICENCIA SIN GOCE DE SUELDO POR CARGO DE ELECCION POPULAR.";
        $motivo34->concepto = "Para dar de BAJA al titular de una plaza, que, como suspensión de la relación de trabajo, se le concede al  personal de la Universidad durante el tiempo que desempeñe el cargo de elección popular y para dar de ALTA a  los interinos. (clausula 62 insiso A).";
        $motivo34->save();

        $motivo35 = new Motivo();
        $motivo35->numeroMotivo = 35;
        $motivo35->nombre = "LICENCIA SIN SUELDO POR FUNCIONES  DIRECTIVAS FUNCIONARIO ACA";
        $motivo35->concepto = "Para dar de BAJA al titular de una plaza con motivo de una licencia sin goce de sueldo que la Institución le  concede a la persona que sea designada para ocupar un puesto de funcionario académico y para dar de ALTA a  sus interinos. Se ocupa cuando el empleado cobra en la plaza de funcionario.";
        $motivo35->save();

        $motivo36 = new Motivo();
        $motivo36->numeroMotivo = 36;
        $motivo36->nombre = "LICENCIA SIN SUELDO POR FUNCIONES  DIRECTIVAS FUNCIONARIO ADM";
        $motivo36->concepto = "Para dar de BAJA al titular de una plaza con motivo de una licencia sin goce de sueldo que la Institución le  concede a la persona que sea designada para ocupar un puesto de funcionario administrativo y para dar de  ALTA a sus interinos.";
        $motivo36->save();

        $motivo37 = new Motivo();
        $motivo37->numeroMotivo = 37;
        $motivo37->nombre = "AUSENCIA O FALTA INJUSTIFICADA.";
        $motivo37->concepto = "Para dar de ALTA a los suplentes que cubren las inasistencias del personal no avalada por un justificante,  siempre y cuando el número de días no excedan de los marcados en los contratos colectivos de trabajo para  iniciar procedimiento de rescisión o proceder a baja administrativa.";
        $motivo37->save();

        $motivo38 = new Motivo();
        $motivo38->numeroMotivo = 38;
        $motivo38->nombre = "LICENCIA SIN SUELDO CLÁUSULA 82 C.C.T.  FESAPAUV";
        $motivo38->concepto = "Para dar de BAJA al titular de una plaza con motivo del otorgamiento de una licencia sin sueldo hasta por un  mes calendario durante un semestre lectivo, en casos plenamente justificados, siempre y cuando el trabajador  académico tenga un año de antigüedad y dar de ALTA a los suplentes.";
        $motivo38->save();

        $motivo39 = new Motivo();
        $motivo39->numeroMotivo = 39;
        $motivo39->nombre = "SUSPENSION TEMPORAL POR SANCION";
        $motivo39->concepto = "Para dar de BAJA al empleado que es la suspensión de los derechos y obligaciones por un tiempo determinado  que se aplica después de concluidas las investigaciones prescritas en los Contratos por haber incurrido en alguna  irregularidad en el desempeño de su trabajo y para dar de ALTA a sus suplentes.";
        $motivo39->save();

        $motivo40 = new Motivo();
        $motivo40->numeroMotivo = 40;
        $motivo40->nombre = "LICENCIA SIN GOCE DE SUELDO";
        $motivo40->concepto = "Para dar de BAJA de la nómina al personal de planta que se le otorga de manera especial una licencia sin goce  de sueldo por ocupar un puesto de funcionario o académico en el caso de personal de confianza, no derivado de  una elección popular y dar de ALTA al interino.";
        $motivo40->save();

        $motivo41 = new Motivo();
        $motivo41->numeroMotivo = 41;
        $motivo41->nombre = "LICENCIA CONDICIONADA";
        $motivo41->concepto = "Para dar de BAJA de la nómina al personal académico de planta que se le otorga Licencia sin sueldo en su(s)  plaza(s) por el tiempo que requiriera para obtener el derecho a la contratación en otra plaza de mayor categoría  obtenida mediante concurso y/o asignada por consejo técnico.";
        $motivo41->save();

        $motivo42 = new Motivo();
        $motivo42->numeroMotivo = 42;
        $motivo42->nombre = "SUPLENCIA";
        $motivo42->concepto = "Es la situacion de la ausencia de un empleado del setsuv, cuando se desconoce el motivo real de ausencia del  titular, este motivo es de utilizacion temporal y debera de ser sustituido por el motivo real de ausencia.";
        $motivo42->save();

        $motivo43 = new Motivo();
        $motivo43->numeroMotivo = 43;
        $motivo43->nombre = "LICENCIA SIN GOCE DE SUELDO POR  EXTENSION DE SABATICO";
        $motivo43->concepto = "Licencia sin goce de sueldo sin perjuicio de su antiguedad, que se otorga por autorizacion del rector al personal  academico al termino del año sabatico, y despues de haber disfrutado de la extension de sabatico con sueldo, las   actividades desempeñadas durante el mismo se prolongan por mas tiempo.";
        $motivo43->save();

        $motivo44 = new Motivo();
        $motivo44->numeroMotivo = 44;
        $motivo44->nombre = "SUELDO DE EXCEPCION";
        $motivo44->concepto = "Sueldo que se le autoriza a un trabajador por convenio por el sindicato o una autorización superior y que no  coincide con el tabulador oficial.";
        $motivo44->save();

        $motivo45 = new Motivo();
        $motivo45->numeroMotivo = 45;
        $motivo45->nombre = "MODIFICACIÓN DE INDICADOR DE CARGA";
        $motivo45->concepto = "Para modificar los indicadores de carga (normal, adicional,transitoria,excedente,obligatoria....etc).";
        $motivo45->save();

        $motivo46 = new Motivo();
        $motivo46->numeroMotivo = 46;
        $motivo46->nombre = "MODIFICACIÓN DE INDICADOR DE TIPO DE INGRESO";
        $motivo46->concepto = "Para asignar el tipo de ingreso del personal académico (Asignada o concursada).";
        $motivo46->save();

        $motivo47 = new Motivo();
        $motivo47->numeroMotivo = 47;
        $motivo47->nombre = "MODIFICACION DE INDICADOR DE PAGO";
        $motivo47->concepto = "Para modificar el indicador de pago.";
        $motivo47->save();

        $motivo48 = new Motivo();
        $motivo48->numeroMotivo = 48;
        $motivo48->nombre = "MODIFICACION DE HORAS REALES";
        $motivo48->concepto = "Para modificar las horas reales del personal académico.";
        $motivo48->save();

        $motivo49 = new Motivo();
        $motivo49->numeroMotivo = 49;
        $motivo49->nombre = "MODIFICACION DE VIGENCIA";
        $motivo49->concepto = "Para Modificar la vigencia de un ocupante.";
        $motivo49->save();

        $motivo50 = new Motivo();
        $motivo50->numeroMotivo = 50;
        $motivo50->nombre = "RENUNCIA";
        $motivo50->concepto = "Para dar de BAJA de la nómina a los trabajadores que por voluntad expresa dan por terminada la relación de trabajo.";
        $motivo50->save();

        $motivo51 = new Motivo();
        $motivo51->numeroMotivo = 51;
        $motivo51->nombre = "JUBILACION";
        $motivo51->concepto = "Para dar de BAJA de la nómina a los trabajadores que por voluntad expresa decidan separarse del servicio, para  someterse a los beneficios del Instituto de Pensiones del Estado.";
        $motivo51->save();

        $motivo52 = new Motivo();
        $motivo52->numeroMotivo = 52;
        $motivo52->nombre = "DEFUNCION";
        $motivo52->concepto = "Para dar de BAJA de la nómina a los trabajadores por término de la relación de trabajo por fallecimiento.";
        $motivo52->save();

        $motivo53 = new Motivo();
        $motivo53->numeroMotivo = 53;
        $motivo53->nombre = "RESCISION DEFINITIVA POR LAUDO O RECLAMO DE INDEMNIZACION";
        $motivo53->concepto = "Terminacion de la relacion de trabajo por causas imputables al trabajador y sin responsabilidad para la  universidad por alguna o algunas de las causas previstas en la ley federal del trabajo y en los contratos  colectivos que la junta de conciliacion haya resuelto que fueron debidamente probados.";
        $motivo53->save();

        $motivo54 = new Motivo();
        $motivo54->numeroMotivo = 54;
        $motivo54->nombre = "INHABILIDAD DICTAMINADA POR INVALIDEZ MEDICA";
        $motivo54->concepto = "Para dar de BAJA de la nómina a los trabajadores, que por dictamen médico, se establece que queda impedido  para desempeñar cualquier tipo de trabajo por el resto de su vida y que origina la terminación de su relación  laboral.";
        $motivo54->save();

        $motivo55 = new Motivo();
        $motivo55->numeroMotivo = 55;
        $motivo55->nombre = "BAJA ADMINISTRATIVA DEFINITIVA";
        $motivo55->concepto = "Terminacion de la relacion de trabajo por haber dejado de concurrir a desempeñar sus labores el trabajador, sin  aviso y sin causa justificada siempre que el trabajador no demande o en el juicio promovido quede aprobado el  abandono.";
        $motivo55->save();

        $motivo56 = new Motivo();
        $motivo56->numeroMotivo = 56;
        $motivo56->nombre = "OBJECION A LA CAPACIDAD O DESEMPEÑO. TERMINO DE INTERINATO";
        $motivo56->concepto = "Para dar de BAJA de la nómina a los trabajadores que por la facultad que tiene la Institución para señalar las  irregularidades en el desempeño del personal de nuevo ingreso, en el término establecido por el Estatuto  respectivo, da lugar a la terminación de la relación de trabajo.";
        $motivo56->save();

        $motivo57 = new Motivo();
        $motivo57->numeroMotivo = 57;
        $motivo57->nombre = "TERMINO DE INTERINATO";
        $motivo57->concepto = "Para dar de BAJA de la nómina a los trabajadores contratados como interinos, que por reincorporación  anticipada del titular a su plaza, la relación laboral se da por terminada antes de la fecha estipulada (renuncia  del titular a su licencia sin goce de sueldo).";
        $motivo57->save();

        $motivo58 = new Motivo();
        $motivo58->numeroMotivo = 58;
        $motivo58->nombre = "TERMINO DE SUPLENCIA";
        $motivo58->concepto = "Para dar de BAJA de la nómina a los trabajadores contratados como suplentes, que por reincorporación  anticipada del titular a su plaza, la relación laboral se da por terminada antes de la fecha estipulada (renuncia  del titular a su licencia con goce de sueldo o descarga académica).";
        $motivo58->save();

        $motivo59 = new Motivo();
        $motivo59->numeroMotivo = 59;
        $motivo59->nombre = "TERMINO DE EXCESO DE TRABAJO";
        $motivo59->concepto = "TERMINO DE LA RELACION LABORAL.- Cuando concluyen las necesidades eventuales que dieron lugar a  la contratación de Personal Administrativo, Ténnico y Manual, en la Dependencia en la que no existe personal  asignado con plaza definitiva para cubrir esa actividad.";
        $motivo59->save();

        $motivo60 = new Motivo();
        $motivo60->numeroMotivo = 60;
        $motivo60->nombre = "REUBICACION DEFINTIVA";
        $motivo60->concepto = "Cuando un perosnal administrativo se reubica de manera definitiva o un maestro por motivo de cambios de  planes de estudio deja una materia del anterior plan de estudios para reubicarse en la que corresponda del nuevo  plan. Este motivo se refiere a la nueva conformacion de la carga del docente no esta referida a, la materia vacante del  plan anterior se convierte en temporal por el tiempo que se requiera impartir y se utiliza con motivo 01 normal.";
        $motivo60->save();

        $motivo61 = new Motivo();
        $motivo61->numeroMotivo = 61;
        $motivo61->nombre = "PERMUTA DEFINITIVA.";
        $motivo61->concepto = "Para MODIFICAR de manera definitiva la integración de la carga académica del personal docente por el  cambio de materias con igual número de horas entre 2 titulares de la misma entidad académica (previo dictamen  del área académica correspondiente), asi como para el personal Administrativo, técnico y Manual.";
        $motivo61->save();

        $motivo62 = new Motivo();
        $motivo62->numeroMotivo = 62;
        $motivo62->nombre = "DESAPARICION DE CARGA POR PLAN DE  ESTUDIOS";
        $motivo62->concepto = "Cuando por falta de matricula se cierra de manera temporal o definitiva un grupo y el academico de base queda  temporalmente sin carga academica y se le sigue manteniendo su sueldo.";
        $motivo62->save();

        $motivo63 = new Motivo();
        $motivo63->numeroMotivo = 63;
        $motivo63->nombre = "REUBICACIÓN TEMPORAL.";
        $motivo63->concepto = "Para MODIFICAR, de manera temporal, la integración de la carga académica del personal docente cuando por  tener horas pendientes de reubicar, se le asignan de manera provisional experiencias educativas vacantes.";
        $motivo63->save();

        $motivo64 = new Motivo();
        $motivo64->numeroMotivo = 64;
        $motivo64->nombre = "RECATEGORIZACIÓN ACADÉMICA.";
        $motivo64->concepto = "Para dar de ALTA y BAJA, al académico de planta que en el proceso de promoción pasa a ocupar otra categoría  o nivel superior.";
        $motivo64->save();

        $motivo65 = new Motivo();
        $motivo65->numeroMotivo = 65;
        $motivo65->nombre = "CAMBIO DE ADSCRIPCIÓN.";
        $motivo65->concepto = "Para dar de ALTA y BAJA a un empleado que por necesidades de la Institución, el titular de una plaza es  reubicado, de manera definitiva con su renglón presupuestal, a otra entidad académica o dependencia.";
        $motivo65->save();

        $motivo66 = new Motivo();
        $motivo66->numeroMotivo = 66;
        $motivo66->nombre = "CAMBIO DE FUNCIONES.";
        $motivo66->concepto = "Para dar de ALTA y BAJA a un empleado académico, cuando se transforma de manera definitiva su plaza, por  modificación de la composición de la carga académica de su titular. (Ejemplos: de Investigador a Docente, de  Ejecutante a Investigador, etc.).";
        $motivo66->save();

        $motivo67 = new Motivo();
        $motivo67->numeroMotivo = 67;
        $motivo67->nombre = "PROMOCION.";
        $motivo67->concepto = "Para dar de ALTA y BAJA a un empleado de confianza o académico de planta, que por proceso de  recategorización pasa a un nivel superior.";
        $motivo67->save();

        $motivo68 = new Motivo();
        $motivo68->numeroMotivo = 68;
        $motivo68->nombre = "CAMBIO DE UBICACION TEMPORAL.";
        $motivo68->concepto = "Para MODIFICAR de manera temporal, la ubicación del pago a una dependencia distinta a la de adscripción de  la plaza.";
        $motivo68->save();

        $motivo69 = new Motivo();
        $motivo69->numeroMotivo = 69;
        $motivo69->nombre = "PERMUTA TEMPORAL DE MATERIAS";
        $motivo69->concepto = "Modificacion temporal de la integracion de la carga academica de personal docente por el cambio de materias  con igual numero de horas entre 2 titulares de la misma entidad academica.";
        $motivo69->save();

        $motivo70 = new Motivo();
        $motivo70->numeroMotivo = 70;
        $motivo70->nombre = "CREACION DE PLAZAS DEFINITIVAS";
        $motivo70->concepto = "Para identificar al ocupante de un renglon presupuestal de reciente creacion originado por la ampliacion de la  plantilla de plazas definitivas para cubrir nuevas necesidades permanentes de la institucion.";
        $motivo70->save();

        $motivo71 = new Motivo();
        $motivo71->numeroMotivo = 71;
        $motivo71->nombre = "AMPLIACION DE GRUPO DEFINITIVO";
        $motivo71->concepto = "Para identificar y determinar el tipo de contratacion que le corresponde a los ocupantes de plazas de una nueva  creacion originadas por la autorizacion definitiva de un conjunto de materias que corresponden a un mismo  nivel, plan de estudios y programa, para cubrir las necesidades definitivas de una entidad academica.";
        $motivo71->save();

        $motivo72 = new Motivo();
        $motivo72->numeroMotivo = 72;
        $motivo72->nombre = "AMPLIACION DE GRUPO TEMPORAL ";
        $motivo72->concepto = "Para identificar y determinar el tipo de contratacion que le corresponde a los ocupantes de plazas originadas por  la autorizacion por un periodo escolar de un conjunto de materias que corresponden a un mismo nivel, plan de  estudios y programa, para cubrir las necesidades temporales de una entidad academica.";
        $motivo72->save();

        $motivo73 = new Motivo();
        $motivo73->numeroMotivo = 73;
        $motivo73->nombre = "MATERIA TEMPORAL";
        $motivo73->concepto = "Para identificar y limitar el tiempo de contratacion que le corresponde al ocupante de una plaza originada por la  autorizacion por un periodo escolar de una materia o experiencia educativa para cubrir la necesidad temporal  en una entidad academica.";
        $motivo73->save();

        $motivo74 = new Motivo();
        $motivo74->numeroMotivo = 74;
        $motivo74->nombre = "EXCESO DE TRABAJO";
        $motivo74->concepto = "Para identificar y controlar los tiempos de ocupacion de las plazas temporales creadas para cubrir necesidades  eventuales del personal administrativo, tecnico y manual y que no es posible atender con el personal en plantilla.";
        $motivo74->save();

        $motivo75 = new Motivo();
        $motivo75->numeroMotivo = 75;
        $motivo75->nombre = "PLAZA VACANTE";
        $motivo75->concepto = "Se ocupa para identificar a los ocupantes de las plazas definitivas del setsuv que se encuentran vacantes  definitivas y que son utilizadas de manera temporal por interinos.";
        $motivo75->save();

        $motivo76 = new Motivo();
        $motivo76->numeroMotivo = 76;
        $motivo76->nombre = "AUTORIZACIÓN ACADÉMICA";
        $motivo76->concepto = "Para dar de ALTA a los suplentes del personal académico, que se reincorpora a sus actividades docentes y por  motivos plenamente justificados se le asigna al titular otra actividad y el suplente debe de continuar con la  suplencia.";
        $motivo76->save();

        $motivo77 = new Motivo();
        $motivo77->numeroMotivo = 77;
        $motivo77->nombre = "TRANSFORMACION DE PLAZA";
        $motivo77->concepto = "Se ocupa para los casos en que por necesidades de la institucion se requiere que una plaza asignada a una  dependencia para cubrir una funcion sea convertida en otra con diferentes caracteristicas que le permitan cubrir  otra funcion especifica. siempre que las funciones correspondan al mismo tipo de personal.";
        $motivo77->save();

        $motivo78 = new Motivo();
        $motivo78->numeroMotivo = 78;
        $motivo78->nombre = "DESCONGELAMIENTO TEMPORAL DE PLAZA";
        $motivo78->concepto = "Para descongelar de manera temporal una plaza.";
        $motivo78->save();

        $motivo79 = new Motivo();
        $motivo79->numeroMotivo = 79;
        $motivo79->nombre = "ALTA DE PLAZA TEMPORAL";
        $motivo79->concepto = "Se ocupa para adicionar materias como complemento de carga a plazas de no docentes (inv. tecnicos y  ejecutantes).";
        $motivo79->save();

        $motivo80 = new Motivo();
        $motivo80->numeroMotivo = 80;
        $motivo80->nombre = "ERROR EN CAPTURA";
        $motivo80->concepto = "Valida unicamente: en el modulo de plazas para efectuar las correcciones de los datos de una plaza capturados  con errores y, en el modulo de control de asistencia para capturar la justificacion de inasistencias y efectuar la  devolucion del importe descontado cuando este se debio a un error de captura del dato en el sistema de personal, en ambos casos se requiere para el uso de este motivo de la clave especial al sistema.";
        $motivo80->save();

        $motivo81 = new Motivo();
        $motivo81->numeroMotivo = 81;
        $motivo81->nombre = "ERROR EN REPORTE";
        $motivo81->concepto = "Válido unicamente para efectuar correcciones en el modulo de control de asistencia para capturar la  justificacion de la inasistencia y efectuar la devolucion del importe correspondiente cuando esta se debio a un  error del responsable del reporte de inasistencia en la entidad academica, en este caso se requiere de la clave de  acceso especial al sistema para el uso de este motivo.";
        $motivo81->save();

        $motivo82 = new Motivo();
        $motivo82->numeroMotivo = 82;
        $motivo82->nombre = "JUSTIFICACION EXTEMPORANEA";
        $motivo82->concepto = "Válido unicamente para efectuar correcciones en el modulo de control de asistencia para capturar la  justificacion de la inasistencia y efectuar la devolucion del importe correspondiente cuando esta se debio a un  error del responsable en la entidad academica de enviar el justificante de la inasistencia, en este caso se requiere  de la clave de la autorizacion del director general de recursos humanos y de la clave de acceso especial al  sistema para el uso de este motivo.";
        $motivo82->save();

        $motivo83 = new Motivo();
        $motivo83->numeroMotivo = 83;
        $motivo83->nombre = "JUSTIFICACION EXTRAORDINARIA";
        $motivo83->concepto = "Valido unicamente para efectuar correcciones en el modulo de control de inasistencias para casos especiales en  que se demuestre que por motivos de fuerza mayor no pudo ser entregada a tiempo la justificacion  correspondiente,lo autoriza unicamente el director general de recursos humanos y se requiere de la clave de  acceso especial al sistema para el uso de este motivo.";
        $motivo83->save();

        $motivo84 = new Motivo();
        $motivo84->numeroMotivo = 84;
        $motivo84->nombre = "CANCELACIÓN DE JUSTIFICANTE DE INASISTENCIAS";
        $motivo84->concepto = "Para la cancelación justificante de una Inasistencia (Personal Académico)";
        $motivo84->save();

        $motivo85 = new Motivo();
        $motivo85->numeroMotivo = 85;
        $motivo85->nombre = "MODIFICACION DE PUESTO, CATEGORIA Y TIPO DE CONTRATACION";
        $motivo85->concepto = "Para modificar Puesto, Categoría y Contratación";
        $motivo85->save();

        $motivo86 = new Motivo();
        $motivo86->numeroMotivo = 86;
        $motivo86->nombre = "TERMINO DE BECA";
        $motivo86->concepto = "Para dar de BAJA a los becarios, cuando la beca se da por terminada antes de la fecha estipulada en la propuesta";
        $motivo86->save();

        $motivo87 = new Motivo();
        $motivo87->numeroMotivo = 87;
        $motivo87->nombre = "RESCISION POR FALTA DE PROBIDAD Y HONRADEZ";
        $motivo87->concepto = "Termino de la relacion laboral sin responsabilidad para la institucion cuando el trabajador incurra en alguna  falta que demuestre la falta de credibilidad sobre el.";
        $motivo87->save();

        $motivo88 = new Motivo();
        $motivo88->numeroMotivo = 88;
        $motivo88->nombre = "LIQUIDACION CON RESPONSABILIDAD INDEMNIZACION";
        $motivo88->concepto = "Termino de la relacion laboral no imputable al trabajador en el que la universidad este obligada a pagar una  indeminizacion al trabajador.";
        $motivo88->save();

        $motivo89 = new Motivo();
        $motivo89->numeroMotivo = 89;
        $motivo89->nombre = "TERMINO DE CONTRATO";
        $motivo89->concepto = "Para dar de BAJA al personal contratado por obra y tiempo determinado, se da por terminada la relación laboral  antes de la fecha estipulada en el contrato.";
        $motivo89->save();

        $motivo90 = new Motivo();
        $motivo90->numeroMotivo = 90;
        $motivo90->nombre = "BASIFICACION";
        $motivo90->concepto = "Adquisicion de la titularidad en una plaza.";
        $motivo90->save();

        $motivo91 = new Motivo();
        $motivo91->numeroMotivo = 91;
        $motivo91->nombre = "CATEGORIZACION";
        $motivo91->concepto = "Proceso academico para asignar la categoria que le corresponde al personal academico de nuevo ingreso de  acuerdo a su grado academico.";
        $motivo91->save();

        $motivo92 = new Motivo();
        $motivo92->numeroMotivo = 92;
        $motivo92->nombre = "CAMBIO DE PLAN DE ESTUDIOS (H.P.R.)";
        $motivo92->concepto = "Son las horas no impartidas por un docente cuando por cambio de plan de estudios desaparece alguna de las  materias o reduce el numero de horas asignadas de base al empleado y sobre las cuales la universidad tiene la  obligacion de cubrir el sueldo correspondiente hasta en tanto no le sea asignada la carga que sustituya estas  horas.";
        $motivo92->save();

        $motivo93 = new Motivo();
        $motivo93->numeroMotivo = 93;
        $motivo93->nombre = "ASCENSO ESCALAFONARIO DEFINITIVO";
        $motivo93->concepto = "Es la promocion definitiva a una categoria superior que recibe un empleado sindicalizado.";
        $motivo93->save();

        $motivo94 = new Motivo();
        $motivo94->numeroMotivo = 94;
        $motivo94->nombre = "ASCENSO ESCALAFONARIO TEMPORAL";
        $motivo94->concepto = "Es la promocion temporal a una categoria superior que recibe un empleado sindicalizado.";
        $motivo94->save();

        $motivo95 = new Motivo();
        $motivo95->numeroMotivo = 95;
        $motivo95->nombre = "REINSTALACION";
        $motivo95->concepto = "Reincorporacion de un empleado que fue rescindido y por dictamen condenatorio de la autoridad competente se  le tiene que reinstalar su trabajo.";
        $motivo95->save();

        $motivo96 = new Motivo();
        $motivo96->numeroMotivo = 96;
        $motivo96->nombre = "PROMOCIÓN TEMPORAL.";
        $motivo96->concepto = "Para dar de ALTA y BAJA a un empleado de confianza, que de manera temporal pasa a ocupar otra categoría y/  o puesto";
        $motivo96->save();

        $motivo97 = new Motivo();
        $motivo97->numeroMotivo = 97;
        $motivo97->nombre = "PERMUTA TEMPORAL";
        $motivo97->concepto = "Se utiliza para identificar a los ocupantes que efectuan un cambio temporal de dependencia entre dos  trabajadores con igual categoria y puesto. la plaza no se modifica, unicamente se cambia a los trabajadores de plaza.";
        $motivo97->save();

        $motivo98 = new Motivo();
        $motivo98->numeroMotivo = 98;
        $motivo98->nombre = "REUBICACION CON TRANSFORMACION DE  PLAZA";
        $motivo98->concepto = "Es el cambio de adscripcion con modificacion de categoria y puesto que se efectua a traves de una negociacion  entre institucion y el sindicato que se le da a un empleado del setsuv, cuando se requiere para cubrir los datos de  la plaza.";
        $motivo98->save();

        $motivo99 = new Motivo();
        $motivo99->numeroMotivo = 99;
        $motivo99->nombre = "MODIFICACIÓN DE SUELDO";
        $motivo99->concepto = "Para MODIFICAR temporalmente el pago del personal contratado como personal de eventual y honorarios  asimilados a salario.";
        $motivo99->save();

        $motivo100 = new Motivo();
        $motivo100->numeroMotivo = 100;
        $motivo100->nombre = "MODIFICACION FECHA DE CONTRATACION";
        $motivo100->concepto = "Se usa para poder modificar el periodo de contratacion de las plazas temporales.";
        $motivo100->save();

        $motivo101 = new Motivo();
        $motivo101->numeroMotivo = 101;
        $motivo101->nombre = "MODIFICACION DE HORARIOS";
        $motivo101->concepto = "Se usa para modificar los horarios del personal de confianza.";
        $motivo101->save();

        $motivo102 = new Motivo();
        $motivo102->numeroMotivo = 102;
        $motivo102->nombre = "REPORTE MARCA PLAZAS PROMEP";
        $motivo102->concepto = "Se usa para modificar el campo de la plaza en donde se identifica como fue reportada una plaza a las entidades externas.";
        $motivo102->save();

        $motivo103 = new Motivo();
        $motivo103->numeroMotivo = 103;
        $motivo103->nombre = "BAJA POR ERROR DE CAPTURA";
        $motivo103->concepto = "Se usa para todos los tipos de personal para dar de baja por algun error de captura.";
        $motivo103->save();

        $motivo104 = new Motivo();
        $motivo104->numeroMotivo = 104;
        $motivo104->nombre = "CAMBIO DE ADSCRIPCION TEMPORAL DE LA  PERSONA";
        $motivo104->concepto = "Para dar de baja de manera temporal al ocupante que pasa a ocupar en otra dependencia la misma categoría.";
        $motivo104->save();

        $motivo105 = new Motivo();
        $motivo105->numeroMotivo = 105;
        $motivo105->nombre = "CAMBIO DE ADSCRIPCION DEFINITIVA DE LA PERSONA";
        $motivo105->concepto = "Para dar de baja de manera definitiva al ocupante que pasa a ocupar en otra dependencia la misma categoría.";
        $motivo105->save();

        $motivo106 = new Motivo();
        $motivo106->numeroMotivo = 106;
        $motivo106->nombre = "MODIFICAR HORAS ACADEMICO PLAN  ANTERIOR";
        $motivo106->concepto = "Modificar las horas del plan anterior.";
        $motivo106->save();

        $motivo107 = new Motivo();
        $motivo107->numeroMotivo = 107;
        $motivo107->nombre = "MODIFICA INDICADOR SUELDO PARTIDO";
        $motivo107->concepto = "Para modificar el sueldo partido de un académico.";
        $motivo107->save();

        $motivo108 = new Motivo();
        $motivo108->numeroMotivo = 108;
        $motivo108->nombre = "CAMBIO DE TIPO DE PERSONAL";
        $motivo108->concepto = "Para dar de baja al personal eventual o de honorarios asimilados a salario por cambio de tipo de personal.";
        $motivo108->save();

        $motivo109 = new Motivo();
        $motivo109->numeroMotivo = 109;
        $motivo109->nombre = "DESCUENTO POR INASISTENCIAS PERSONAL  DE APOYO Y EVENTUAL";
        $motivo109->concepto = "Para realizar descuentos por inasistencia personal de apoyo y eventual";
        $motivo109->save();

        $motivo110 = new Motivo();
        $motivo110->numeroMotivo = 110;
        $motivo110->nombre = "MODIFICACIÓN DE CARGA";
        $motivo110->concepto = "Para asignar carga faltante.";
        $motivo110->save();

        $motivo111 = new Motivo();
        $motivo111->numeroMotivo = 111;
        $motivo111->nombre = "ALTA TEMPORAL PERSONAL EVENTAL Y DE  APOYO";
        $motivo111->concepto = "Para dar de alta al personal Eventual y de Apoyo en el formato de requerimientos.";
        $motivo111->save();

        $motivo112 = new Motivo();
        $motivo112->numeroMotivo = 112;
        $motivo112->nombre = "BAJA ESPECIAL PERSONAL EVENTUAL";
        $motivo112->concepto = "Se usa para dar de baja al personal de Eventual y de Honorarios Asimilados a salario sin quita el registro de cargas.";
        $motivo112->save();

        $motivo113 = new Motivo();
        $motivo113->numeroMotivo = 113;
        $motivo113->nombre = "MODIFICACION DE HORAS PENDIENTES";
        $motivo113->concepto = "Para modificar Horas pendientes.";
        $motivo113->save();

        $motivo114 = new Motivo();
        $motivo114->numeroMotivo = 114;
        $motivo114->nombre = "BAJA POR CIERRE DE EXPERIENCIA EDUCATIVA";
        $motivo114->concepto = "Para dar de Baja a los academicos por cierre de una experiencia educativa.";
        $motivo114->save();

        $motivo115 = new Motivo();
        $motivo115->numeroMotivo = 115;
        $motivo115->nombre = "MODIFICA INDICADOR DE FORMATO";
        $motivo115->concepto = "Para modificar el indicador de si la captura del formato de personal academico fue con formato original 'O' o con copia 'C'.";
        $motivo115->save();

        $motivo116 = new Motivo();
        $motivo116->numeroMotivo = 116;
        $motivo116->nombre = "ACTUALIZACION DE FECHAS POR CAMBIO DE  SEMESTRE";
        $motivo116->concepto = "CAMBIO DE FECHAS EN PLAZAS, OCUPANTES Y SUPLENTES POR CAMBIO DE SEMESTRE  PROFESORES DE ASIGNATURA.";
        $motivo116->save();

        $motivo117 = new Motivo();
        $motivo117->numeroMotivo = 117;
        $motivo117->nombre = "BAJAS Y CAMBIOS MOVIMIENTOS MOTIVO 112";
        $motivo117->concepto = "Para hacer cambios y bajas a los movimientos de personal de apoyo que tengan motivo 112.";
        $motivo117->save();

        $motivo118 = new Motivo();
        $motivo118->numeroMotivo = 118;
        $motivo118->nombre = "EXCESO DE TRABAJO E";
        $motivo118->concepto = "Para exceso de trabajo de plazas diferentes a las 90000.";
        $motivo118->save();

        $motivo119 = new Motivo();
        $motivo119->numeroMotivo = 119;
        $motivo119->nombre = "MARCA AÑO Y OFICIO DE PLAZAS AUTORIZADAS";
        $motivo119->concepto = "Se usa para modificar en Plazas el año y el numero de oficio de las plazas autorizadas";
        $motivo119->save();

        $motivo120 = new Motivo();
        $motivo120->numeroMotivo = 120;
        $motivo120->nombre = "OCUPADA NORMAL CONGELADA";
        $motivo120->concepto = "Para dar de alta a los titulares de una plaza que se mantendra congelada sin suplente o interino hasta que la  ocupe el tutular";
        $motivo120->save();

        $motivo121 = new Motivo();
        $motivo121->numeroMotivo = 121;
        $motivo121->nombre = "FUNCIONARIOS COBRAN COMO ACADEMICO";
        $motivo121->concepto = "Para incorporar a los funcionarios que cobran como acacdemicos.";
        $motivo121->save();

        $motivo122 = new Motivo();
        $motivo122->numeroMotivo = 122;
        $motivo122->nombre = "DESTITUCION DEL CARGO ";
        $motivo122->concepto = "Termino de la relacion laboralsin responsabilidad para la institucion cuando un funcionario incurra en alguna falta.";
        $motivo122->save();

        $motivo123 = new Motivo();
        $motivo123->numeroMotivo = 123;
        $motivo123->nombre = "DESCARGA ACADEMICA TOTAL POR COMISION  INSTITUCIONAL ADMVA";
        $motivo123->concepto = "Para dar de ALTA a los suplentes del personal académico, que deja de impartir por un tiempo determinado, toda  su carga académica, para realizar en la propia institución, actividades distintas a las de su nombramiento. Se  utiliza para las funciones administrativas.";
        $motivo123->save();

        $motivo124 = new Motivo();
        $motivo124->numeroMotivo = 124;
        $motivo124->nombre = "DESCARGA ACADEMICA PARCIAL POR  COMISION INSTITUCIONAL ADMVA";
        $motivo124->concepto = "Para dar de ALTA a los suplentes del personal académico, que deja de impartir por un tiempo determinado,  parte de su carga académica, para realizar en la propia institución, actividades distintas a las de su  nombramiento. Se utiliza para las funciones administrativas.";
        $motivo124->save();

        $motivo125 = new Motivo();
        $motivo125->numeroMotivo = 125;
        $motivo125->nombre = "LICENCIA POR PATERNIDAD";
        $motivo125->concepto = "Para dar de ALTA a los suplentes del personal que se ausenta hasta por 5 dias a partir del nacimiento de su hijo (a).";
        $motivo125->save();

        $motivo126 = new Motivo();
        $motivo126->numeroMotivo = 126;
        $motivo126->nombre = "REUBICACION TEMPORAL EN POSGRADO";
        $motivo126->concepto = "Para dar de ALTA a los suplentes del personal académico de planta, que deja de impartir temporalmente EE en  licenciatura para impartir en Posgrado.";
        $motivo126->save();

        $motivo127 = new Motivo();
        $motivo127->numeroMotivo = 127;
        $motivo127->nombre = "CONCLUSION DE OBRA A TIEMPO DETERMINADO";
        $motivo127->concepto = "Para dar la Baja a los trabajadores eventuales y de honorarios asimilados a salario cuando se cloncluye un proyecto.";
        $motivo127->save();

        $motivo128 = new Motivo();
        $motivo128->numeroMotivo = 128;
        $motivo128->nombre = "TERMINO DE VIGENCIA MIGRATORIA";
        $motivo128->concepto = "Para dar de Baja al personal extranjero que tine vencido su documento migratorio.";
        $motivo128->save();

        $motivo129 = new Motivo();
        $motivo129->numeroMotivo = 129;
        $motivo129->nombre = "PAGO UNICO ANUAL HONORARIOS ASIMILADOS";
        $motivo129->concepto = "Para registrar el pago unico anual al personal de honorarios asimilados a salario.";
        $motivo129->save();

        $motivo130 = new Motivo();
        $motivo130->numeroMotivo = 130;
        $motivo130->nombre = "RESCISION DE CONTRATO";
        $motivo130->concepto = "Termino de la relación laboral en la Institución.";
        $motivo130->save();

        $motivo131 = new Motivo();
        $motivo131->numeroMotivo = 131;
        $motivo131->nombre = "LICENCIA SIN GOCE DE SUELDO POR  DESEMPEÑO DE CARGO PUBLICO";
        $motivo131->concepto = "Para dar de BAJA de la nómina al personal de planta que se le otorga una licencia sin goce de sueldo por ocupar  un puesto de funcionario público, no derivado de una elección popular y dar de alta al interino.";
        $motivo131->save();

        $motivo132 = new Motivo();
        $motivo132->numeroMotivo = 132;
        $motivo132->nombre = "PROMOCION A PUESTO DIRECTIVO";
        $motivo132->concepto = "Para dar de ALTA y BAJA a un Personal Academico o de Mandos Medios y Superiores, que por proceso de  promoción se modifica su salario.";
        $motivo132->save();

        $motivo133 = new Motivo();
        $motivo133->numeroMotivo = 133;
        $motivo133->nombre = "REGISTRO DE HORAS DE EXTRACLASE";
        $motivo133->concepto = "PARA REGISTRAR LAS HORAS DE EXTRACLASE (GENERACION Y APLICACION DEL  CONOCIMIENTO, GESTION ACADEMICA Y TUTORIAS).";
        $motivo133->save();

        $motivo134 = new Motivo();
        $motivo134->numeroMotivo = 134;
        $motivo134->nombre = "ALTA TEMPORAL GRAT.EXT";
        $motivo134->concepto = "PARA DAR DE ALTA LA GRATIFICACIÓN EXTRAORDINARIA.";
        $motivo134->save();

        $motivo135 = new Motivo();
        $motivo135->numeroMotivo = 135;
        $motivo135->nombre = "MODIFICACION DE FUNCIONES";
        $motivo135->concepto = "Modificar la clave y nombre del puesto funcional con el que fue creado el renglon presupuestal de personal  eventual de acuerdo a las actividades que desempeña el trabajador, sin que ello represente un cambio de sueldo  o total de horas.";
        $motivo135->save();

        $motivo999 = new Motivo();
        $motivo999->numeroMotivo = 999;
        $motivo999->nombre = "NO PAGO";
        $motivo999->concepto = "No, pago para identificar que no es posible descontarle a esa persona ya que no percibe sueldo.";
        $motivo999->save();

    }
}
