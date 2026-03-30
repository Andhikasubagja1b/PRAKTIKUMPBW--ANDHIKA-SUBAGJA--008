<?php

function angkaGenap() {
    for ($i = 2; $i <= 10; $i+=2) {
        echo "Angka Genap: $i\n";
        sleep(1);
    }
}

function angkaGanjil() {
    for ($i = 1; $i <= 9; $i+=2) {
        echo "Angka Ganjil: $i\n";
        sleep(1);
    }
}

angkaGenap();
angkaGanjil();

?>