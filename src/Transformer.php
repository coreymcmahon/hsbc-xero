<?php namespace Slashnode\HsbcXero;

use League\Csv\Reader;

class Transformer
{
    protected $hsbc_csv;

    public function __construct($hsbc_csv)
    {
        $this->hsbc_csv = $hsbc_csv;
    }

    public function transform()
    {

    }
}