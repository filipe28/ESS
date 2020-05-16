<?php

use Illuminate\Database\Seeder;

class DocsSeeder extends Seeder
{
    private $docPath = 'docs';
    private $allFiles;


    public function run()
    {
        $this->command->line('--- > Criar Docs (cópias digitais de docs)');
        $this->command->line('Docs vão ser armazenados na pasta ' . storage_path('app/' . $this->docPath));

        $this->allFiles = collect(File::files(database_path('seeds/docs')))->toArray();

        // Apaga as fotos antigas
        try {
            Storage::deleteDirectory($this->docPath);
        } catch (Exception $e) { // Por vezes só apaga à segunda tentativa
            Storage::deleteDirectory($this->docPath);
        } finally {
            Storage::makeDirectory($this->docPath);
        }

    }

}
