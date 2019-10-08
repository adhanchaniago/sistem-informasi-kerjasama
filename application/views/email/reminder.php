<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width" />


    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            font-size: 100%;
            font-family: 'Avenir Next', "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            line-height: 1.65;
        }

        img {
            max-width: 100%;
            margin: 0 auto;
            display: block;
        }

        body,
        .body-wrap {
            width: 100% !important;
            height: 100%;
            background: #f8f8f8;
        }

        a {
            color: #4b42f5;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .button {
            display: inline-block;
            color: white;
            background: #4b42f5;
            border: solid #4b42f5;
            border-width: 10px 20px 8px;
            font-weight: bold;
            border-radius: 4px;
        }

        .button:hover {
            text-decoration: none;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-bottom: 20px;
            line-height: 1.25;
        }

        h1 {
            font-size: 32px;
        }

        h2 {
            font-size: 28px;
        }

        h3 {
            font-size: 24px;
        }

        h4 {
            font-size: 20px;
        }

        h5 {
            font-size: 16px;
        }

        p,
        ul,
        ol {
            font-size: 16px;
            font-weight: normal;
            margin-bottom: 20px;
        }

        .container {
            display: block !important;
            clear: both !important;
            margin: 0 auto !important;
            max-width: 580px !important;
        }

        .container table {
            width: 100% !important;
            border-collapse: collapse;
        }

        .container .masthead {
            padding: 80px 0;
            background: #4b42f5;
            color: white;
        }

        .container .masthead h1 {
            margin: 0 auto !important;
            max-width: 90%;
            text-transform: uppercase;
        }

        .container .content {
            background: white;
            padding: 30px 35px;
        }

        .container .content.footer {
            background: none;
        }

        .container .content.footer p {
            margin-bottom: 0;
            color: #888;
            text-align: center;
            font-size: 14px;
        }

        .container .content.footer a {
            color: #888;
            text-decoration: none;
            font-weight: bold;
        }

        .container .content.footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <table class="body-wrap">
        <tr>
            <td class="container">

                <!-- Message start -->
                <table>
                    <tr>
                        <td align="center" class="masthead">

                            <h1>Politeknik Negeri Malang</h1>
                            <h3>Sistem Informasi Kerjasama</h3>

                        </td>
                    </tr>
                    <tr>
                        <td class="content">

                            <h2>Yth, Pembantu Direktur IV</h2>

                            <p>Kielbasa venison ball tip shankle. Boudin prosciutto landjaeger, pancetta jowl turkey tri-tip porchetta beef pork loin drumstick. Frankfurter short ribs kevin pig ribeye drumstick bacon kielbasa. Pork loin brisket biltong, pork belly filet mignon ribeye pig ground round porchetta turducken turkey. Pork belly beef ribs sausage ham hock, ham doner frankfurter pork chop tail meatball beef pig meatloaf short ribs shoulder. Filet mignon ham hock kielbasa beef ribs shank. Venison swine beef ribs sausage pastrami shoulder.</p>
                            <!-- <table border="1">
                                <tr>
                                    <td>Nama Perusahaan</td>
                                    <td>Nomor</td>
                                    <td>Tanggal</td>
                                    <td>Jenis</td>
                                </tr>
                                <?php foreach ($coop as $key => $value) : ?>
                                    <tr>
                                        <td><?php echo $value->company_name ?></td>
                                        <td><?php echo $value->coop_number ?></td>
                                        <td><?php echo $value->start_date . " - " . $value->end_date ?></td>
                                        <td><?php echo $value->type_name ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </table> -->
                            <?php foreach ($coop as $key => $value) : ?>
                                <table>
                                    <tr>
                                        <td rowspan="5" width="30px" style="vertical-align:top;"><?php echo $key+1; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Nama </td>
                                        <td>: <?php echo $value->company_name ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor </td>
                                        <td>: <?php echo $value->coop_number ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal </td>
                                        <td>: <?php echo $value->start_date . " - " . $value->end_date ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis </td>
                                        <td>: <?php echo $value->type_name ?></td>
                                    </tr>
                                </table>

                        <hr style="margin-bottom:15px;">
                    <?php endforeach ?>
                    <table>
                        <tr>
                            <td align="center">
                                <p>
                                    <a href="#" class="button">Share the Awesomeness</a>
                                </p>
                            </td>
                        </tr>
                    </table>

                    <p>By the way, if you're wondering where you can find more of this fine meaty filler, visit <a href="http://baconipsum.com">Bacon Ipsum</a>.</p>

                    <p><em>– Mr. Pen</em></p>

            </td>
        </tr>
    </table>

    </td>
    </tr>
    <tr>
        <td class="container">

            <!-- Message start -->
            <table>
                <tr>
                    <td class="content footer" align="center">
                        <p>Sent by <a href="#">Company Name</a>, 1234 Yellow Brick Road, OZ, 99999</p>
                        <p><a href="mailto:">hello@company.com</a> | <a href="#">Unsubscribe</a></p>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
    </table>
</body>

</html>