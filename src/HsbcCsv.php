<?php namespace Slashnode\HsbcXero;

use League\Csv\Reader;

class HsbcCsv
{
    /** @var \League\Csv\AbstractCsv $csv */
    protected $csv;

    public function __construct($filepath)
    {
        $this->csv = Reader::createFromPath($filepath);
    }

    public function process()
    {

    }
}