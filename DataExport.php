<?php

/**
 * Class Data2Excel
 * Created By Md.Sayed Ahammed
 * Date: May 18, 2019
 */

class DataExport {

    private $data;
    private $fileName = 'Example File';
    private $fileExtension;
    private $fileFormat;

    public function __construct($format = 'excel') {

        $this->fileExtension = [
            'excel' => '.xlsx'
        ];

        $this->fileFormat= $format;

        $this->data = '<table>';
    }

    public function setHeaders($headers) {

        $this->data .= "<tr>";

        foreach ($headers as $header) {
            $this->data .='<th>'. $header . '</th>';
        }

        $this->data .= '</tr>';
    }

    public function addRow($data) {

        $this->data .= '<tr>';

        foreach ($data as $row) {
            $this->data .='<td>'. $row . '</td>';
        }

        $this->data .= '</tr>';
    }

    public function setFileName($file_name) {
        $this->fileName = $file_name;
    }

    public function exec() {

        $this->data .= '</table>';

        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        switch ($this->fileFormat) {
            case 'excel':
                $filename = $this->fileName . "" .$this->fileExtension['excel'];
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=$filename");
                break;

        }

        echo $this->data;
    }

}