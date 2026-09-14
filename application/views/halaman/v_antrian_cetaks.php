<html>
<head>
    <style type="text/css">
        table {font-family: Calibri, Helvetica, Arial, sans-serif;
            font-size: 22px;
            line-height: 110%;}
        h1 { font-family: "Arial Black","Times New Roman",serif; }

        .nomor{
            font-family: "Arial Black","Times New Roman",serif;
            font-size:125px;
            line-height: 90%;
        }
        .space
        {
            line-height: 50%
        }
        @media print
        {
            @page
            {
                margin-top:0; !important;
                margin :10px;
                size: 8cm 10cm;
            }
        }

    </style>
    <script>

        function RefreshParent() {
            if (window.opener != null && !window.opener.closed) {
                window.opener.document.location.reload();
            }
        }

        function cetak_antrian()
        {
            window.print();
            window.onbeforeunload = RefreshParent;
            setTimeout(function () { window.close(); }, 2000);
        }


    </script>
</head>
<body onload="cetak_antrian()">
<table width='350' align='left' style="font-size:22px">
    <tr>
        <td align="center">
            <?php //echo $nama_pa; ?>
            <b><?php echo strtoupper($nama_pa); ?></b>
        </td>
    </tr>
    <tr>
        <td align="center">
            -----------------------------------------------
        </td>
    </tr>
    <tr class="nomor" height="50px">
        <td align="center">
            <p class="nomor"><?php echo $no_antrian; ?></p>
        </td>
    </tr>
    <tr>
        <td align="center">
            -----------------------------------------------
        </td>
    </tr>
    <tr>
        <td align="center" >
            <b><?php echo $no_perk; ?></b>
        </td>
    </tr>
    <tr>
        <td align="center" >
            <b style="font-size:22px">Ruang Sidang:<br><?php echo $ruang; ?> </b>
        </td>
    </tr>
    <tr>
        <td align="center" >
            <b style="font-size:22px">Tanggal Sidang:<br><?php echo $tanggal_sidang; ?> </b>
        </td>
    </tr>
    <tr align = "center">
        <td>
            -----------------------------------------------
            Mohon menunggu Anda akan dipanggil sesuai nomor urut
            <b style="font-size:14px"><?php echo "Dicetak:".$tgl_ambil; ?> </b>
        </td>
    </tr>
</table>
</body>
</html>