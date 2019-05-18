<?php
require_once 'DataExport.php';

$export = new DataExport();

$headers = array(
    'Name',
    'Age'
);

$export->setHeaders($headers);
$export->addRow(array('Md.Sayed Ahammed', 25));
$export->addRow(array('Asif', 45));
$export->setFileName('example');
$export->exec();

