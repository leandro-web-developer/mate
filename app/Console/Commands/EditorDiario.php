<?php

namespace App\Console\Commands;

use App\Http\Controllers\EditorController;
use Illuminate\Console\Command;

class EditorDiario extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'editor:diario';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ejecuta el editor cada dia';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        EditorController::elPais();
        EditorController::elObservador();
    }
}
