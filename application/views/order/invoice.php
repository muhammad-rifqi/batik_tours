<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>A5 landscape</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
    @page {
        size: A5 landscape
    }
    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="A5 landscape">

    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="sheet padding-10mm" style="font-family:calibri">

        <table width="100%" cellpadding="4" cellspacing="0">
            <tbody>
                <tr>
                    <td>ID BOOKING :</td>
                    <td>#<?= $detail[0]['id']?></td>
                </tr>
                <tr>
                    <td>NAMA :</td>
                    <td><?= $detail[0]['firstname']?> <?= $detail[0]['lastname']?></td>
                </tr>
                <tr>
                    <td>EMAIL :</td>
                    <td><?= $detail[0]['email']?></td>
                </tr>
                <tr>
                    <td>TELEPON :</td>
                    <td><?= $detail[0]['phone']?></td>
                </tr>
                <tr>
                    <td>KOTA :</td>
                    <td><?= $detail[0]['address']?></td>
                </tr>
                <tr>
                    <td>KODEPOS</td>
                    <td><?= $detail[0]['postal_code']?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table width="100%" cellpadding="4" cellspacing="0" border=1>
            <tr>
                <td>Package Name</td>
                <td>Price</td>
                <td>Person</td>
                <td>SubTotal</td>
            </tr>
            <?php
                $subtotal = 0;
                for($i=0;$i<count($detail[0]['orders']);$i++){
                    $harga = ($detail[0]['orders'][$i]['person'] * $detail[0]['orders'][$i]['price']);
                    $subtotal += $harga;
                    echo "
                    <tr>
                        <td>".substr($detail[0]['orders'][$i]['package_name'],0,70)."</td>
                        <td>".number_format($detail[0]['orders'][$i]['price'])."</td>
                        <td>".$detail[0]['orders'][$i]['person']."</td>
                        <td>".number_format(floor($detail[0]['orders'][$i]['person'] * $detail[0]['orders'][$i]['price']))."</td>
                    </tr>";
                }
            ?>
        </table>
        <p>SubTotal : <b> <?= number_format($subtotal) ?> </b> dan Pajak <b> 180.000 </b>
            Menjadi <b><?= number_format($subtotal + 180000) ?> </b></p>

    </section>

</body>

</html>