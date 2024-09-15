<?php

namespace Tests\Unit;

use App\Models\Motivo;
use Illuminate\Http\UploadedFile;
use PHPUnit\Framework\TestCase;

class MotivoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
/*    public function test_example()
    {
        $this->assertTrue(true);
    }*/

    public function test_subir_csv()
    {
        //Storage::fake('motivos');
        $file = UploadedFile::fake()->create('motivo.csv');
        $response = $this->post('/import',[
            'file' => $file,
        ]);

        //$motivo = Motivo::importToDB();
        $this->post('import',[$file])->assertRedirect('import');

    }

}
