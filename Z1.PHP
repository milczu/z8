<?php
$samochody = [
    ['marka' => 'Skoda', 'model' => 'Fabia', 'rok' => 2012, 'cena' => 25000, 'przebieg' => 160000, 'paliwo' => 'diesel', 'moc' => 70],
    ['marka' => 'Volkswagen', 'model' => 'Golf', 'rok' => 2015, 'cena' => 45000, 'przebieg' => 140000, 'paliwo' => 'diesel', 'moc' => 110],
    ['marka' => 'Ford', 'model' => 'Focus', 'rok' => 2018, 'cena' => 60000, 'przebieg' => 95000, 'paliwo' => 'benzyna', 'moc' => 125],
    ['marka' => 'Toyota', 'model' => 'Corolla', 'rok' => 2021, 'cena' => 95000, 'przebieg' => 45000, 'paliwo' => 'benzyna', 'moc' => 122],
    ['marka' => 'Opel', 'model' => 'Astra', 'rok' => 2010, 'cena' => 20000, 'przebieg' => 190000, 'paliwo' => 'diesel', 'moc' => 95],
    ['marka' => 'BMW', 'model' => '320d', 'rok' => 2018, 'cena' => 85000, 'przebieg' => 120000, 'paliwo' => 'diesel', 'moc' => 190],
    ['marka' => 'Audi', 'model' => 'A4', 'rok' => 2020, 'cena' => 110000, 'przebieg' => 80000, 'paliwo' => 'benzyna', 'moc' => 150],
    ['marka' => 'Kia', 'model' => 'Ceed', 'rok' => 2022, 'cena' => 89000, 'przebieg' => 30000, 'paliwo' => 'benzyna', 'moc' => 140],
    ['marka' => 'Hyundai', 'model' => 'i30', 'rok' => 2019, 'cena' => 72000, 'przebieg' => 85000, 'paliwo' => 'diesel', 'moc' => 115],
    ['marka' => 'Renault', 'model' => 'Megane', 'rok' => 2014, 'cena' => 35000, 'przebieg' => 150000, 'paliwo' => 'diesel', 'moc' => 110],
    ['marka' => 'Peugeot', 'model' => '308', 'rok' => 2017, 'cena' => 52000, 'przebieg' => 105000, 'paliwo' => 'benzyna', 'moc' => 130],
    ['marka' => 'Fiat', 'model' => 'Tipo', 'rok' => 2020, 'cena' => 55000, 'przebieg' => 60000, 'paliwo' => 'benzyna', 'moc' => 95],
    ['marka' => 'Nissan', 'model' => 'Qashqai', 'rok' => 2016, 'cena' => 65000, 'przebieg' => 130000, 'paliwo' => 'diesel', 'moc' => 130],
    ['marka' => 'Volvo', 'model' => 'XC60', 'rok' => 2019, 'cena' => 135000, 'przebieg' => 90000, 'paliwo' => 'diesel', 'moc' => 190],
    ['marka' => 'Mazda', 'model' => '6', 'rok' => 2018, 'cena' => 82000, 'przebieg' => 100000, 'paliwo' => 'benzyna', 'moc' => 165],
    ['marka' => 'Mercedes', 'model' => 'C-Klasa', 'rok' => 2021, 'cena' => 150000, 'przebieg' => 50000, 'paliwo' => 'diesel', 'moc' => 200],
    ['marka' => 'Honda', 'model' => 'Civic', 'rok' => 2015, 'cena' => 48000, 'przebieg' => 145000, 'paliwo' => 'benzyna', 'moc' => 142],
    ['marka' => 'Dacia', 'model' => 'Duster', 'rok' => 2022, 'cena' => 70000, 'przebieg' => 25000, 'paliwo' => 'benzyna', 'moc' => 100],
    ['marka' => 'Seat', 'model' => 'Leon', 'rok' => 2017, 'cena' => 58000, 'przebieg' => 115000, 'paliwo' => 'diesel', 'moc' => 150],
    ['marka' => 'Alfa Romeo', 'model' => 'Giulietta', 'rok' => 2013, 'cena' => 32000, 'przebieg' => 170000, 'paliwo' => 'benzyna', 'moc' => 120]
];

usort($samochody, function($a, $b) {
    return $a['cena'] - $b['cena'];
});

function obliczWiek($rokProdukcji) {
    return date('Y') - $rokProdukcji;
}

function wyszukajSamochody($samochody, $maksymalnaCena) {
    $znalezione = 0;
    foreach ($samochody as $auto) {
        if ($auto['cena'] <= $maksymalnaCena) {
            echo "{$auto['marka']} {$auto['model']} - {$auto['cena']} zł<br>";
            $znalezione++;
        }
    }
    if ($znalezione == 0) {
        echo "Brak<br>";
    }
}

function najdrozszySamochod($samochody) {
    $najdrozszy = $samochody[0];
    foreach ($samochody as $auto) {
        if ($auto['cena'] > $najdrozszy['cena']) {
            $najdrozszy = $auto;
        }
    }
    return $najdrozszy;
}

function najtanszySamochod($samochody) {
    $najtanszy = $samochody[0];
    foreach ($samochody as $auto) {
        if ($auto['cena'] < $najtanszy['cena']) {
            $najtanszy = $auto;
        }
    }
    return $najtanszy;
}

function obliczSredniaCene($samochody) {
    $suma = 0;
    $liczba = count($samochody);
    foreach ($samochody as $auto) {
        $suma += $auto['cena'];
    }
    return $liczba > 0 ? round($suma / $liczba, 2) : 0;
}

$liczbaDiesli = 0;
$liczbaPo2020 = 0;
$liczbaNiskiPrzebieg = 0;

foreach ($samochody as $auto) {
    if (strtolower($auto['paliwo']) == 'diesel') {
        $liczbaDiesli++;
    }
    if ($auto['rok'] > 2020) {
        $liczbaPo2020++;
    }
    if ($auto['przebieg'] < 100000) {
        $liczbaNiskiPrzebieg++;
    }
}

echo "================================<br>";
echo "KOMIS SAMOCHODOWY<br>";
echo "================================<br><br>";

foreach ($samochody as $auto) {
    $wiek = obliczWiek($auto['rok']);
    
    if ($wiek <= 3) {
        $kategoria = "samochód prawie nowy";
    } elseif ($wiek >= 4 && $wiek <= 7) {
        $kategoria = "samochód kilkuletni";
    } elseif ($wiek >= 8 && $wiek <= 15) {
        $kategoria = "samochód używany";
    } else {
        $kategoria = "samochód zabytkowy lub starszy";
    }
    
    echo "{$auto['marka']} {$auto['model']}<br>";
    echo "Rok produkcji: {$auto['rok']}<br>";
    echo "Cena: {$auto['cena']} zł<br>";
    echo "Przebieg: {$auto['przebieg']} km<br>";
    echo "Paliwo: {$auto['paliwo']}<br>";
    echo "Moc: {$auto['moc']} KM<br>";
    echo "Wiek: $wiek lat<br>";
    echo "Kategoria: $kategoria<br>";
    echo "<br>--------------------------------<br><br>";
}

echo "================================<br>";
echo "STATYSTYKI<br>";
echo "================================<br>";
echo "Liczba samochodów: " . count($samochody) . "<br>";
echo "Średnia cena: " . obliczSredniaCene($samochody) . " zł<br>";
$maxAuto = najdrozszySamochod($samochody);
$minAuto = najtanszySamochod($samochody);
echo "Najdroższy: {$maxAuto['marka']} {$maxAuto['model']}<br>";
echo "Najtańszy: {$minAuto['marka']} {$minAuto['model']}<br>";
echo "Samochody diesel: $liczbaDiesli<br>";
echo "Samochody po 2020 roku: $liczbaPo2020<br>";
echo "Przebieg poniżej 100 000 km: $liczbaNiskiPrzebieg<br>";
echo "================================<br>";
?>