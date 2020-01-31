<?php
foreach ($products as $row) :
    foreach ($row as &$cell) :
        $cell = '"' . preg_replace('/"/', '""', $cell) . '"';
    endforeach;
    echo implode(',', $row) . "\n";
endforeach;
