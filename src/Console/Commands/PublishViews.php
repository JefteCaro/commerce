<?php

namespace Jecar\Commerce\Console\Commands;

use Jecar\Core\Console\Commands\MigrationGenerator;
use Jecar\Core\Console\Commands\PublishViews as CommandsPublishViews;

class PublishViews extends CommandsPublishViews
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jecar:views:commerce';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publishes CMS views';

    public function __construct()
    {
        parent::__construct();
    }

    public function publish()
    {
        $this->buildContent($this->outputStub(), 'views/' . $this->outputStub());
    }

    public function outputStub()
    {
        return 'commerce.blade.php';
    }

    public function getStub(string $path)
    {
        return $this->files->get(__DIR__ . '../../../../resources/' .$path);
    }
}
