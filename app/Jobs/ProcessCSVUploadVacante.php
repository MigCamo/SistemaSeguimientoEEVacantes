<?php

namespace App\Jobs;

use App\Models\Educational_Experience_Vacancies;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessCSVUploadVacante implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $file;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = array_map('str_getcsv',file($this->file));

        foreach ($data as $row){

            Educational_Experience_Vacancies::updateOrCreate(
                [
                    'periodo' => $row[0],
                    'clavePeriodo' => $row[1],
                    'numZona' => $row[2],
                    'numDependencia' => $row[3],
                    'numArea' => $row[4],
                    'numPrograma' => $row[5],
                    'numPlaza' => $row[6],
                    'numHoras' => $row[7],
                    'numMateria' => $row[8],
                    'nombreMateria' => $row[9],
                    'grupo' => $row[10],
                    'subGrupo' => $row[11],
                    'numMotivo' => $row[12]
                ],

            );

        }
        unlink($this->file);

    }
}
