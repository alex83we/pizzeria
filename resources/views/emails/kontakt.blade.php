<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <title></title>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style type="text/css">
        a {
            color: #6d6d6d;
            text-decoration: none;
        }

        @media (max-width: 480px) {
            #u_content_image_1 .v-src-width {
                width: auto !important;
            }

            #u_content_image_1 .v-src-max-width {
                max-width: 50% !important;
            }

            #u_content_text_1 .v-text-align {
                text-align: center !important;
            }

            #u_content_text_14 .v-text-align {
                text-align: center !important;
            }

            #u_content_text_15 .v-text-align {
                text-align: center !important;
            }
        }
        @media only screen and (min-width: 620px) {
            .u-row {
                width: 600px !important;
            }
            .u-row .u-col {
                vertical-align: top;
            }

            .u-row .u-col-33p33 {
                width: 199.98px !important;
            }

            .u-row .u-col-50 {
                width: 300px !important;
            }

            .u-row .u-col-66p67 {
                width: 400.02px !important;
            }

            .u-row .u-col-100 {
                width: 600px !important;
            }

        }

        @media (max-width: 620px) {
            .u-row-container {
                max-width: 100% !important;
                padding-left: 0px !important;
                padding-right: 0px !important;
            }
            .u-row .u-col {
                min-width: 320px !important;
                max-width: 100% !important;
                display: block !important;
            }
            .u-row {
                width: calc(100% - 40px) !important;
            }
            .u-col {
                width: 100% !important;
            }
            .u-col > div {
                margin: 0 auto;
            }
            .no-stack .u-col {
                min-width: 0 !important;
                display: table-cell !important;
            }

            .no-stack .u-col-50 {
                width: 50% !important;
            }

        }
        body {
            margin: 0;
            padding: 0;
        }

        table,
        tr,
        td {
            vertical-align: top;
            border-collapse: collapse;
        }

        p {
            margin: 0;
        }

        .ie-container table,
        .mso-container table {
            table-layout: fixed;
        }

        * {
            line-height: inherit;
        }

        a[x-apple-data-detectors='true'] {
            color: inherit !important;
            text-decoration: none !important;
        }

        @media (max-width: 480px) {
            .hide-mobile {
                display: none !important;
                max-height: 0px;
                overflow: hidden;
            }

        }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet" type="text/css">
</head>
<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #eeeeee;">
<table style="border-collapse: collapse; table-layout: fixed; border-spacing: 0; mso-table-lspace: 0pt; mso-table-rspace: 0pt; vertical-align: top; min-width: 320px; margin: 0 auto; background-color: #eeeeee; width: 100%;" cellpadding="0" cellspacing="0">
    <tbody>
    <tr style="vertical-align: top;">
        <td style="word-break: break-word; border-collapse: collapse !important; vertical-align: top;">

            <x-emails.container-blue>
                @section('table-blue')

                    <div class="u-col u-col-33p33" style="max-width: 320px; min-width: 200px; display: table-cell; vertical-align: top;">
                        <div style="width: 100% !important;">

                            <table id="u_content_image_1" style="font-family: 'Open Sans', sans-serif;" role="presentation" cellspacing="0" cellpadding="0" width="100%" border="0">
                                <tr>
                                    <td style="overflow-wrap:break-word; word-break:break-word; padding:31px 10px 25px; font-family:'Open Sans',sans-serif;" align="left">

                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td class="v-text-align" style="padding-right: 0px;padding-left: 0px;" align="center">

                                                    @foreach (\Illuminate\Support\Facades\DB::table('firmendaten')->get()->toArray() as $firma)
                                                        <div style="color: #ffffff;">{{ $firma->firmenname }}</div>
                                                    @endforeach

                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>

                    <div class="u-col u-col-66p67" style="max-width: 320px;min-width: 400px;display: table-cell;vertical-align: top;">
                        <div style="width: 100% !important;">
                            <table class="hide-mobile" style="font-family:'Open Sans',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                <tbody>
                                <tr>
                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'Open Sans',sans-serif;" align="left">
                                        <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #617c98;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                            <tbody>
                                            <tr style="vertical-align: top">
                                                <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                    <span>&#160;</span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table id="u_content_text_1" style="font-family:'Open Sans',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                <tbody>
                                <tr>
                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:13px 26px 16px;font-family:'Open Sans',sans-serif;" align="left">
                                        <div class="v-text-align" style="color: #ffffff; line-height: 140%; text-align: right; word-wrap: break-word;">
                                            <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 14px; line-height: 19.6px;">Kontaktanfrage</span></p>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                @endsection
            </x-emails.container-blue>

            <x-emails.container-white>
                @section('table-white')

                    <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                        <div style="width: 100% !important;">

                            <table style="font-family:'Open Sans',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                <tbody>
                                    <tr>
                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'Open Sans',sans-serif;" align="left">

                                            <div class="v-text-align" style="color: #415366; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                <p style="font-size: 14px; line-height: 140%;">
                                                    <strong><span style="font-size: 30px; line-height: 42px;">
                                                        Sie haben eine Kontaktanfrage über ihre Homepage erhalten.
                                                    </span></strong>
                                                </p>
                                            </div>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table style="font-family:'Open Sans',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                <tbody>
                                <tr>
                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:'Open Sans',sans-serif;" align="left">

                                        <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #BBBBBB;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                            <tbody>
                                            <tr style="vertical-align: top">
                                                <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                    <span>&#160;</span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>

                @endsection
            </x-emails.container-white>

            <div class="u-row-container" style="padding: 0px;background-color: transparent">
                <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">

                    <div class="u-col u-col-50" style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                        <div style="width: 100% !important;">

                            <table style="font-family:'Open Sans',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                <tbody>
                                <tr>
                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'Open Sans',sans-serif;" align="left">

                                        <div class="v-text-align" style="color: #5c5757; line-height: 140%; text-align: left; word-wrap: break-word;">
                                            <p style="font-size: 14px; line-height: 140%;">
                                                <strong>
                                                    <span style="font-size: 14px; line-height: 19.6px;">
                                                        Kundendaten:
                                                    </span>
                                                </strong>
                                            </p>
                                            <p style="font-size: 14px; line-height: 140%;">
                                                <span style="font-size: 14px; line-height: 19.6px;">
                                                    Name: {{ $kontakt['name'] }}<br>
                                                    E-Mail-Adresse: {{ $kontakt['email'] }}<br>
                                                    Telefon: {{ $kontakt['telefon'] }}
                                                </span>
                                            </p>
                                        </div>

                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <table style="font-family:'Open Sans',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                <tbody>
                                <tr>
                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:'Open Sans',sans-serif;" align="left">

                                        <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #BBBBBB;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                            <tbody>
                                            <tr style="vertical-align: top">
                                                <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                    <span>&#160;</span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    </div>
                </div>
            </div>

            <div class="u-row-container" style="padding: 0px;background-color: transparent">
                <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #617c98;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">

                        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                            <div style="width: 100% !important;">

                                <table style="font-family:'Open Sans',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                    <tr>
                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:26px 10px 10px;font-family:'Open Sans',sans-serif;" align="left">

                                            <div class="v-text-align" style="color: #ffffff; line-height: 140%; text-align: left; word-wrap: break-word;">
                                                <p style="font-size: 14px; line-height: 140%;">
                                                    <span style="font-size: 24px; line-height: 33.6px;">
                                                        <span style="line-height: 33.6px; font-size: 24px;">
                                                            {!! $kontakt['message'] !!}
                                                        </span>
                                                    </span>
                                                </p>
                                            </div>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <table style="font-family:'Open Sans',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                    <tr>
                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:'Open Sans',sans-serif;" align="left">

                                            <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #BBBBBB;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                <tbody>
                                                <tr style="vertical-align: top">
                                                    <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                        <span>&#160;</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="u-row-container" style="padding: 0px;background-color: transparent">
                <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">

                        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                            <div style="width: 100% !important;">

                                <table style="font-family:'Open Sans',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                    <tr>
                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:35px 10px 10px;font-family:'Open Sans',sans-serif;" align="left">

                                            <div class="v-text-align" style="color: #92bae5; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                @foreach (\Illuminate\Support\Facades\DB::table('firmendaten')->get()->toArray() as $firma)
                                                <p style="font-size: 14px; line-height: 140%;">
                                                    <strong>
                                                        <span style="font-size: 30px; line-height: 42px;">
                                                            {{ $firma->firmenname }}
                                                        </span>
                                                    </strong>
                                                </p>
                                                    {{ 'Inhaber: ' . $firma->inhaber }}<br>
                                                    {{ $firma->straße }}<br>
                                                    {{ $firma->plz . ' ' . $firma->ort }}<br><br>
                                                    {{ 'Telefon: ' . $firma->telefon }}<br>
                                                    {{ 'Mobil: ' . $firma->mobil }}<br><br>
                                                    {{ 'E-Mail-Adresse: ' . $firma->email }}<br>
                                                @endforeach
                                            </div>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <table style="font-family:'Open Sans',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                    <tr>
                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:'Open Sans',sans-serif;" align="left">

                                            <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="90%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #BBBBBB;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                <tbody>
                                                <tr style="vertical-align: top">
                                                    <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                        <span>&#160;</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="u-row-container" style="padding: 0px;background-color: transparent">
                <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #617c98;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">

                        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                            <div style="width: 100% !important;">

                                <table style="font-family:'Open Sans',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                    <tr>
                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:16px;font-family:'Open Sans',sans-serif;" align="left">

                                            <div class="v-text-align" style="color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                <p style="font-size: 14px; line-height: 140%;">&copy; @foreach (\Illuminate\Support\Facades\DB::table('firmendaten')->get()->toArray() as $firma) {{ $firma->firmenname }} @endforeach. All Rights Reserved</p>
                                            </div>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </td>
    </tr>
    </tbody>
</table>
</body>
</html>