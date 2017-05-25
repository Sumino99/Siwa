<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Style-Type" content="text/css" />
        <title>
        Laporan Pelanggaran bulan {{ date('F') }}
        </title>
        <style type="text/css">
            body { line-height:115%; font-family:Calibri; font-size:11pt }
            p { margin:0pt 0pt 10pt }
            table { margin-top:0pt; margin-bottom:10pt }
            .BalloonText { margin-bottom:0pt; line-height:normal; font-family:Tahoma; font-size:8pt }
            span.BalloonTextChar { font-family:Tahoma; font-size:8pt }
        </style>
    </head>
    <body>
        <div>
            <p style="margin-bottom:0pt; text-align:center; line-height:115%; font-size:14pt">
                <strong>E. </strong><strong>LAPORAN CATATAN PELANGGARAN SISWA</strong>
            </p>
            <p style="margin-bottom:0pt; line-height:normal; font-size:14pt">
                <strong>&#xa0;</strong>
            </p>
            <p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
                <strong>KELAS</strong><span style="width:12.43pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><strong>: {{ Session::get('nama_kelas') }}</strong>
            </p>
            <p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
                <strong>SEMESTER</strong><span style="width:24pt; display:inline-block"></span><strong>: </strong>
            </p>
            <p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
                <strong>WALI KELAS</strong><span style="width:12.43pt; display:inline-block"></span><strong>: {{ Session::get('usernameWalas') }}</strong>
            </p>
            <p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
                <strong>BULAN</strong><span style="width:12pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><strong>: {{ date('F') }}</strong>
            </p>
            <p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
                <strong>&#xa0;</strong>
            </p>
            <table cellspacing="0" cellpadding="0" style="width:785.4pt; margin-bottom:0pt; border-collapse:collapse">
                <tr>
                    <td rowspan="2" style="width:17.55pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                        <p style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
                            <strong>NO </strong>
                        </p>
                    </td>
                    <td rowspan="2" style="width:130.95pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                        <p style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
                            <strong>NAMA</strong>
                        </p>
                    </td>
                    <td style="width:65.1pt; border-top:0.75pt solid #000000; border-right:0.75pt solid #000000; border-left:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top">
                        <p style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
                            <strong>&#xa0;</strong>
                        </p>
                    </td>
                    <td colspan="6" style="width:386.1pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                        <p style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
                            <strong>BENTUK PELANGGARAN</strong>
                        </p>
                    </td>
                    <td rowspan="2" style="width:130.95pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                        <p style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
                            <strong>KETERANGAN</strong>
                        </p>
                        <p style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
                            <strong>DAN LAIN-LAIN</strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:65.1pt; border-right:0.75pt solid #000000; border-left:0.75pt solid #000000; border-bottom:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                        <p style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
                            <strong>HARI/TGL</strong>
                        </p>
                    </td>
                    <td style="width:50.4pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top">
                        <p style="margin-bottom:0pt; text-align:center; line-height:normal">
                            <strong>KERAPIAN</strong>
                        </p>
                    </td>
                    <td style="width:41.4pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                        <p style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
                            <strong>PROSES KBM </strong>
                        </p>
                    </td>
                    <td style="width:60.05pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                        <p style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
                            <strong>ATRIBUT SERAGAM</strong>
                        </p>
                    </td>
                    <td style="width:53pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                        <p style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
                            <strong>RAMBUT</strong>
                        </p>
                    </td>
                    <td style="width:81.35pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                        <p style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
                            <strong>KESOPANAN</strong>
                        </p>
                    </td>
                    <td style="width:45.9pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                        <p style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
                            <strong>SIKAP</strong>
                        </p>
                    </td>
                </tr>
               <?php $no = 1;        ?>
                @foreach($data as $datas)
                        <tr>
                    <td style="width:17.55pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top">
                        <p style="margin-bottom:0pt; text-align:left; line-height:normal; font-size:12pt">
                            <strong>{{ $no++ }}.</strong>
                        </p>
                    </td>
                    <td style="width:130.95pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;text-align: left;">
                        <p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
                            <strong>{{ $datas->siswa->nama_lengkap }}</strong>
                        </p>
                    </td>
                    <td style="width:65.1pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;text-align: center;">
                        <p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
                            <strong>{{ date('d/F/Y', strtotime($datas->tgl_pelanggaran)) }}</strong>
                        </p>
                    </td>
                    <td style="width:50.4pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;text-align: center;">
                        <p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
                            <strong>@if($datas->bentuk_pelanggaran == 'Kerapian') V @endif</strong>
                        </p>
                    </td>
                    <td style="width:41.4pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;text-align: center;">
                        <p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
                            <strong>@if($datas->bentuk_pelanggaran == 'Proses KBM') V @endif</strong>
                        </p>
                    </td>
                    <td style="width:60.05pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;text-align: center;">
                        <p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
                            <strong>@if($datas->bentuk_pelanggaran == 'Atribut Seragam') V @endif</strong>
                        </p>
                    </td>
                    <td style="width:53pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;text-align: center;">
                        <p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
                            <strong>@if($datas->bentuk_pelanggaran == 'Rambut') V @endif</strong>
                        </p>
                    </td>
                    <td style="width:81.35pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;text-align: center;">
                        <p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
                            <strong>@if($datas->bentuk_pelanggaran == 'Kesopanan') V @endif</strong>
                        </p>
                    </td>
                    <td style="width:45.9pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;text-align: center;">
                        <p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
                            <strong>@if($datas->bentuk_pelanggaran == 'Sikap') V @endif</strong>
                        </p>
                    </td>
                    <td style="width:130.95pt; border:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top">
                        <p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
                            <strong>{{ $datas->keterangan }}</strong>
                        </p>
                    </td>
                </tr>
                @endforeach
            </table>
            <p style="margin-bottom:0pt; text-align:justify; line-height:115%; font-size:12pt">
                <span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:120pt; display:inline-block"></span>Mojokerto, <strong>{{ date('d F Y') }}</strong>
            </p>
            <p style="margin-bottom:0pt; text-align:justify; line-height:115%; font-size:12pt">
                  Mengetahui<span style="width:7.29pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span>
            </p>
            <p style="margin-bottom:0pt; text-align:justify; line-height:115%; font-size:12pt">
                Ketua GK  dan PTK<span style="width:18.43pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span>Wali kelas
            </p>
            <p style="margin-bottom:0pt; line-height:115%; font-size:12pt">
                &#xa0;
            </p>
            <p style="margin-bottom:0pt; line-height:115%; font-size:12pt">
                &#xa0;
            </p>
            <p style="margin-bottom:0pt; line-height:115%; font-size:12pt">
                <strong><u>SAMSUL HADI, S.Pd</u></strong><span style="width:10.16pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:25pt; display:inline-block"></span><strong><u>{{ Session::get('usernameWalas') }}</u></strong>
            </p>
            <p style="margin-bottom:0pt; line-height:115%; font-size:12pt">
                Nip. 19790429 200801 1 006<span style="width:3.84pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:40pt; display:inline-block"></span>Nip.
            </p>
            <p style="margin-bottom:0pt; line-height:115%; font-size:12pt">
                &#xa0;
            </p>
            <p style="margin-bottom:0pt; line-height:115%; font-size:12pt">
                Kepala Sekolah<span style="width:34.45pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span>Waka Kesiswaan
            </p>
            <p style="margin-bottom:0pt; line-height:115%; font-size:12pt">
                <strong>&#xa0;</strong>
            </p>
            <p style="margin-bottom:0pt; line-height:115%; font-size:12pt">
                <strong><u>MUHARTO, S.Pd.M.M</u></strong><span style="width:35.13pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:25pt; display:inline-block"></span><strong><u>SUKENDRO, S,Pd</u></strong>
            </p>
            <p style="margin-bottom:0pt; line-height:115%; font-size:12pt">
                NIP. 19670510 199802 1 004<span style="width:3.67pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span>NIP. 19720617 200801 1 013
            </p>
            <table cellspacing="0" cellpadding="0" style="width:329.15pt; margin-bottom:0pt; border-collapse:collapse">
                <tr style="height:55.2pt">
                    <td style="width:318.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom; background-color:#ffffff">
                        <p style="margin-bottom:0pt; line-height:normal">
                            <span style="font-family:Arial">&#xa0;</span>
                        </p>
                    </td>
                </tr>
            </table>
            <p style="margin-bottom:0pt; line-height:115%; font-size:12pt">
                <strong>&#xa0;</strong>
            </p>
        </div>
    </body>
</html>
