Demo:

```php
<?php

$loader = require __DIR__.'/vendor/autoload.php';

use SimpleForm\ChoiceType;
use SimpleForm\Form;
use SimpleForm\TextType;

$form = Form::createFromArray([
    ChoiceType::createFromArray([
        'name'     => 'konf_gebaeudetyp',
        'type'     => 'choice',
        'choices'  => [
            'value1'          => 'label1',
            'Einfamilienhaus' => 'Einfamilienhaus',
            'Reihenendhaus'   => 'Reihenendhaus',
        ],
        'multiple' => false,
        'required' => true,
        'headline' => 'Gebäudetyp',
        'info'     => 'Diese Angabe benötigen wir, um die Leistung des Heizkessels auslegen zu können. Die Wärmeabgabe eines Gebäudes bestimmt sich wesentlich über die Außenfläche des Gebäudes. Diese gibt die Wärme an die Außenluft ab. Reihenmittelhäuser haben hier z.B. Vorteile, da diese im Normalfall von zwei Seiten eingebaut sind.',
    ]),
    ChoiceType::createFromArray([
        'name'     => 'konf_baujahr',
        'type'     => 'choice',
        'choices'  => [
            '1800-1960' => ' - 1960',
            '1961-1977' => '1961 - 1977',
            '1978-1994' => '1978 - 1994',
            '1995-2100' => '1995 - ',
        ],
        'multiple' => false,
        'required' => true,
        'headline' => 'Baujahr',
        'info'     => 'Aus dem Baujahr des Gebäudes bestimmen wir eine Grundlast pro m2 Wohn/Nutzfläche. Je nach Zeitraum sind bestimmte Baustoffe, Güteklassen oder entsprechende Bauvorschriften angewandt worden. Hieraus lassen sich entsprechende Grundwerte ableiten.',
    ]),
    TextType::createFromArray([
        'name'     => 'konf_flaeche',
        'type'     => 'text',
        'required' => true,
        'headline' => 'Fläche ca. in m²',
        'info'     => 'Diese Angabe ist für die Ermittlung der Heizkesselleistung wichtig. Bitte nehmen Sie nur Flächen in die Angabe mit auf, die auch beheizt sind. Unbeheizte Dachböden, Garagen oder Keller gehören nicht dazu. Es kommt hierbei nicht auf den 100% genauen Wert an. Die Abweichung sollte aber nicht größer 10% sein.',
    ]),
]);

echo $form->toJson();
```

```php
$form = Form::create();
$form->add(ChoiceType::createFromArray([...]));
$form->add(TextType::createFromArray([...]));

echo $form->toJson();
```

Result (JSON):
```json
[
    {
        "typeName": "choice",
        "choices": {
            "value1": "label1",
            "Einfamilienhaus": "Einfamilienhaus",
            "Reihenendhaus": "Reihenendhaus"
        },
        "multiple": false,
        "placeholder": "",
        "name": "konf_gebaeudetyp",
        "label": "",
        "type": "choice",
        "required": true,
        "headline": "Geb\u00e4udetyp",
        "info": "Diese Angabe ben\u00f6tigen wir, um die Leistung des Heizkessels auslegen zu k\u00f6nnen. Die W\u00e4rmeabgabe eines Geb\u00e4udes bestimmt sich wesentlich \u00fcber die Au\u00dfenfl\u00e4che des Geb\u00e4udes. Diese gibt die W\u00e4rme an die Au\u00dfenluft ab. Reihenmittelh\u00e4user haben hier z.B. Vorteile, da diese im Normalfall von zwei Seiten eingebaut sind."
    },
    {
        "typeName": "choice",
        "choices": {
            "1800-1960": " - 1960",
            "1961-1977": "1961 - 1977",
            "1978-1994": "1978 - 1994",
            "1995-2100": "1995 - "
        },
        "multiple": false,
        "placeholder": "",
        "name": "konf_baujahr",
        "label": "",
        "type": "choice",
        "required": true,
        "headline": "Baujahr",
        "info": "Aus dem Baujahr des Geb\u00e4udes bestimmen wir eine Grundlast pro m2 Wohn\/Nutzfl\u00e4che. Je nach Zeitraum sind bestimmte Baustoffe, G\u00fcteklassen oder entsprechende Bauvorschriften angewandt worden. Hieraus lassen sich entsprechende Grundwerte ableiten."
    },
    {
        "typeName": "text",
        "name": "konf_flaeche",
        "label": "",
        "type": "text",
        "required": true,
        "headline": "Fl\u00e4che ca. in m\u00b2",
        "info": "Diese Angabe ist f\u00fcr die Ermittlung der Heizkesselleistung wichtig. Bitte nehmen Sie nur Fl\u00e4chen in die Angabe mit auf, die auch beheizt sind. Unbeheizte Dachb\u00f6den, Garagen oder Keller geh\u00f6ren nicht dazu. Es kommt hierbei nicht auf den 100% genauen Wert an. Die Abweichung sollte aber nicht gr\u00f6\u00dfer 10% sein."
    }
]
```