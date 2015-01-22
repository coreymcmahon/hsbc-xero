<?php namespace Slashnode\HsbcXero;

use League\Csv\Reader;

class HsbcCsv
{
    /** @var \League\Csv\Reader $csv */
    protected $csv;

    public function __construct($filepath)
    {
        $this->csv = Reader::createFromPath($filepath);
    }

    public function process()
    {
        $rows = $this->csv->fetchAll();
        $rows = array_slice($rows, 2, count($rows) - 3);
        $values = [];

        foreach ($rows as $row)
        {
            // don't include opening balance or closing balance
            if (in_array(trim($row[1]), ['Opening Balance', 'Closing Balance'])) {
                continue;
            }

            $withdrawl = (float)$row[2];
            $deposit = (float)$row[3];

            $values[] = (object) [
                'date' => $row[0],
                'description' => $row[1],
                'amount' =>  ($deposit - $withdrawl),
            ];
        }

        return $values;
    }
}