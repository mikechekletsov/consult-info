<?php

if (isset($_FILES['csvFile']['tmp_name'])) {

    $csvFile = $_FILES['csvFile']['tmp_name'];

    $handle = fopen($csvFile, 'r');

    if ($handle !== FALSE) {
        echo '<div class="container"><div class="row justify-content-center"><div class="col-md-6">';
        echo '<table class="table table-bordered mt-5" style="border: 1px solid black;">'; 

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            echo '<tr style="border: 1px solid black;">';

            foreach ($data as $cell) {
                echo '<td style="border: 1px solid black;">' . htmlspecialchars($cell) . '</td>';
            }
            
            echo '</tr>'; 
        }

        echo '</table>'; 
        echo '</div></div></div>';

        fclose($handle);
    }
}
