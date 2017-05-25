<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Data Guru Smkn 1 Dlanggu</title>
        <body>
            <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
                .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
                .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
                .tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
            </style>

            <div style="font-family:Arial; font-size:12px;">
                <center><h2>Data Guru Tahun <?php echo date('Y'); ?></h2></center>
            </div>
            <br>
            <table class="tg">
              <tr>
                <th class="tg-3wr7">No.<br></th>
                <th class="tg-3wr7">Nama Guru<br></th>
                <th class="tg-3wr7">Mata Pelajaran<br></th>
                <th class="tg-3wr7">Kode Guru<br></th>
              </tr>
              <?php $no = 1; ?>
            @for ($i = 0; $i < count($guru); $i++)
              <tr style="text-align: center;">
                <td class="tg-rv4w" width="5%">{{ $no++ }}. </td>
                <td class="tg-rv4w" width="50%" style="text-align: left;">{{$guru[$i]['nama_guru'] }}</td>
                <td class="tg-rv4w" width="20%">{{$guru[$i]['mapel']['mata_pelajaran'] }}</td>
                <td class="tg-rv4w" width="7%">{{$guru[$i]['kode_guru'] }}</td>
              </tr>
              @endfor
            </table>
        </body>
    </head>
</html>
