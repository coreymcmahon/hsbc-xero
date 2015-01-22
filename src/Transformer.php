<?php namespace Slashnode\HsbcXero;


class Transformer
{
    /** @var HsbcCsv */
    protected $hsbc_csv;

    /**
     * @param HsbcCsv $hsbc_csv
     */
    public function __construct(HsbcCsv $hsbc_csv)
    {
        $this->hsbc_csv = $hsbc_csv;
    }

    /**
     * @return string
     */
    public function transform()
    {
        $buffer = '';

        foreach ($this->hsbc_csv->process() as $row) {
            $buffer .= sprintf("%s,%s,%s\n", $row->date, $row->description, $row->amount);
        }

        return $buffer;
    }
}
