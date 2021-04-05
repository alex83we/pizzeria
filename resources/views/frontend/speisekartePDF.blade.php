<!doctype html>
<html lang="de">
<head>
    <title>Speisekarte Buttstädter Bistro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap');
        @page {
            margin: 0;
        }
        html {
            margin: 0;
            padding: 0;
        }
        body {
            margin: 0 auto;
            padding: 0;
            /*height: 793.7px;*/
            /*width: 378px;*/
            background-color: rgba(113,145,178,1);
        }
        * {
            font-family: "Barlow", sans-serif;
            font-size: 14px;
        }

        /*.body-wrapper {
            height: 29.7cm;
            width: 21cm;
            background: rgba(113,145,178,1);
            margin: 0;
        }

        #speisekarte {
            font-size: 14px;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }*/
        .page-break {
            page-break-after: always;
        }
        /*.hauptth {
            width: 21cm;
            vertical-align: top;
        }
        .wrapper {
            padding: 0 0.5cm;
            text-align: center;
        }
        .wrapper hr {
            border: 0.1mm solid red;
            margin: 0
        }
        .firma {
            font-size: 18px;
            padding: 50px 0;
        }
        .firmenname {
            font-size: 62px;
            font-family: "Barlow", sans-serif;
        }
        .inhaber {
            font-size: 20px;
            font-weight: 700;
            font-family: 'Dancing Script', cursive;
        }
        .adresse {
            font-size: 18px;
            padding: 10px 0;
        }
        .oeffnungszeiten {
            padding: 50px 0;
        }
        .oeffnungszeiten_wrapper {
            border-top: 0.1mm solid red;
            border-bottom: 0.1mm solid red;
            background: rgba(255,255,255,0.5);
            text-align: left;
            padding: 5px 0 5px 1.4cm;
        }
        .ueberschrift {
            background: red;
            !*padding: 2px 5px;*!
            color: white;
        }
        .oeffnungszeiten_wrapper .oeffnungszeiten-table {
            !*width: 100%;*!
        }
        .telefon {
            color: red;
            font-size: 24px;
            line-height: 30px;
        }
        .generated {
            padding: 40px 0;
            font-size: 6px;
        }
        .clearing {
            clear: both;
        }*/
        table {
            width: 100%;
        }

        td {
            vertical-align: top;
        }
        .speisekarte-front {
            text-align: center;
        }
        .speisekarte-front p {
            margin: 0;
        }
        .speisekarte-front .wrapper, .speisekarte-menu .wrapper {
            padding: 0 5px;
        }
        .speisekarte-front .wrapper .firma {
            padding: 170px 0;
        }
        .speisekarte-front .wrapper .firma .firmenname {
            font-size: 62px;
            font-weight: bold;
        }
        .speisekarte-front .wrapper .firma .inhaber {
            font-family: 'Dancing Script', cursive;
            font-weight: 700;
            font-size: 30px;
        }
        .speisekarte-front .wrapper .adresse {
            padding: 10px 0;
        }
        .speisekarte-front .wrapper .adresse p {
            font-size: 24px;
        }
        .speisekarte-front .wrapper .adresse .telefon {
            color: red;
            font-weight: bolder;
            font-size: 36px;
        }
        .speisekarte-front .wrapper .adresse .telefon:last-child {
            padding-bottom: 50px;
        }
        .speisekarte-front .wrapper .oeffnungszeiten {
            background-color: rgba(255, 255, 255, .4);
            padding: 5px 0;
        }
        .speisekarte-front .wrapper .oeffnungszeiten .oeffnungszeiten-wrapper {
            padding-left: 2cm;
        }
        .speisekarte-front .wrapper .oeffnungszeiten .oeffnungszeiten-wrapper td {
            width: 50%;
        }
        .speisekarte-front .wrapper .oeffnungszeiten .oeffnungszeiten-wrapper span {
            background-color: red;
            color: white;
            padding: 2px 5px;
        }
        .speisekarte-menu .speisekarte-menu_innen td {
            font-size: 10px;
        }
    </style>
</head>
<body>
<table class="speisekarte-front">
    <tbody>
    <tr>
        <td>
            <div class="wrapper">
                <div class="firma">
                    <p class="firmenname">{{ $firmas->firmenname }}</p>
                    <p class="inhaber">{{ 'Inh.: ' . $firmas->inhaber }}</p>
                </div>
                <hr style="border: 2px solid red">
                <div class="adresse">
                    <p>{{ $firmas->straße }}</p>
                    <p>{{ $firmas->plz . ' ' . $firmas->ort }}</p>
                    <p class="telefon">{{ 'Tel.: ' . $firmas->telefon }}</p>
                    <p class="telefon">{{ 'Mobil.: ' . $firmas->mobil }}</p>
                </div>
                <hr style="border: 2px solid red; margin: 0 0 0 2cm; ">
                <div class="oeffnungszeiten">
                    <div class="oeffnungszeiten-wrapper">
                        <table class="oeffnungszeiten-table">
                            <thead>
                            <tr>
                                <th style="text-align: left;"><span>Öffnungszeiten:</span></th>
                                <th style="text-align: left;"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($oeffnungszeitens as $oeffnungszeiten)
                                <tr>
                                    <td style="text-align: left;">{{ $oeffnungszeiten->wochentag }}</td>
                                    <td style="text-align: left;">{{ $oeffnungszeiten->von . ' - ' . $oeffnungszeiten->bis . ' Uhr' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <table class="oeffnungszeiten-table">
                            <thead>
                            <tr>
                                <th style="text-align: left;"><span>Lieferzeiten:</span></th>
                                <th style="text-align: left;"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($lieferzeitens as $lieferzeiten)
                                <tr>
                                    <td style="text-align: left;">{{ $lieferzeiten->wochentag }}</td>
                                    <td style="text-align: left;">{{ $lieferzeiten->von . ' - ' . $lieferzeiten->bis . ' Uhr' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr style="border: 2px solid red; margin: 0 0 0 2cm; ">
            </div>
        </td>
    </tr>
    </tbody>
</table>
<div class="page-break"></div>
<div class="speisekarte-menu">
    @foreach ($category as $kategorie)
        <div style="padding-bottom: 5px; padding-top: 5px;">
            <div class="wrapper">
                <div style="background-color: white; color: red; font-size: 20px; text-align: left; padding: 2px 10px; border-top: 2px solid red; border-bottom: 2px solid red;">
                    {{ $kategorie->title }}
                    <span style="font-size: 12px;"> {{ $kategorie->description }}</span>
                </div>
            </div>
            <div class="wrapper">
                <table class="speisekarte-menu_innen">
                    @foreach($speisekarten as $speisekarte)
                        @if($speisekarte->categories_id == $kategorie->id)
                    <tr>
                        <td>
                            {{ $speisekarte->speisekarte_name }}
                            <span style="font-size: 8px;">
                                @if ($speisekarte->speisekarte_zusatzstoffe == true)
                                    {{ $speisekarte->speisekarte_zusatzstoffe . ' ' }}
                                @endif
                                    {{ $speisekarte->speisekarte_allergene }}
                            </span>
                        </td>
                        <td style="text-align: right;">{{ $speisekarte->speisekarte_basispreis . ' €' }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            @foreach($speisekarte->zutatens as $zutat)
                                {{ $zutat->zutat }}
                            @endforeach
                        </td>
                    </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    @endforeach
    <div class="wrapper" style="padding-top: 5px; padding-bottom: 5px;">
        <img src="./images/doener-kebab_1.jpg" style="width: 100%;">
        <div style="text-align: center; padding: 20px 0">
            Alle Speisen auch zum mitnehmen.<br>
            Telefonische Bestellung und Sebstabhollung jederzeit möglich.<br>
            Alle Gerichte werden stets frisch zubereitet!<br>
            Wir backen unser Brot selbst!
        </div>
        <hr style="border: 2px solid darkgreen;">
        <div>
            Allergene:<br>
            <br>
            A Gluten, B enthält Krebstiere, C enthält Eier, D enthält Soja, E enthält Fisch, G enthält Milch, H enthält Schalenfrüchte<br> I enthält Sellerie, J enthält Senf, S enthält Sesam<br>
            <br>
            Zusatzstoffe:<br>
            <br>
            1 mit Farbstoff, 2 mit Konservierungsstoff, 3 mit Antioxidationsmittel, 4 mit Geschmacksverstärker<br> 6 gewachst, 10 mit Phosphat, 11 koffeinhaltig
        </div>
    </div>
</div>

</body>
</html>