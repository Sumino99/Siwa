<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Style-Type" content="text/css" />
        <title>
        </title>
        <style type="text/css">
            body { line-height:120%; font-family:Calibri; font-size:10pt; color:#5a5a5a }
            p { margin:0pt 0pt 8pt 108pt }
            li { margin-top:0pt; margin-bottom:8pt }
            .ListParagraph { margin-left:36pt; margin-bottom:8pt; line-height:120%; font-size:10pt; color:#5a5a5a }
            span.Hyperlink { text-decoration:underline; color:#0000ff }
        </style>
    </head>
    <body style="margin: 20px">
        <div>
            <p style="line-height:normal">
                <span style="height:0pt; display:block; position:absolute; z-index:-1"><img src="images/hal-1/hal-1.002.png" width="754" height="168" alt="" usemap="#awmap1" style="margin-top:-39.28pt; margin-left:-161.48pt; border-style:none; position:absolute" /><map name="awmap1"><area shape="rect" href="mailto:Info@smkn1dlanggu.net" coords="513, 138, 672, 157"></area><area shape="rect" href="http://www.smkn1dlanggu.net" coords="290, 138, 447, 157"></area></map></span><span style="height:0pt; display:block; position:absolute; z-index:1"><img src="images/hal-1/hal-1.001.jpg" width="125" height="139" alt="Logo DIKNAS2" style="margin-top:-27.6pt; margin-left:-142.95pt; position:absolute" /></span>&#xa0;
            </p>
            <p style="line-height:normal">
                &#xa0;
            </p>
            <p style="line-height:normal">
                &#xa0;
            </p>
            <p style="line-height:normal">
                &#xa0;
            </p>
            <p style="line-height:normal">
                <span style="height:0pt; display:block; position:absolute; z-index:0"><img src="images/hal-1/hal-1.003.png" width="603" height="1" alt="" style="margin-top:9.32pt; margin-left:-106.03pt; position:absolute" /></span>&#xa0;
            </p>
            <p style="margin-left:0pt; margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
                <strong><span style="font-family:'Times New Roman'; color:#000000">LAPORAN WALI KELAS</span></strong>
            </p>
            <p style="margin-left:0pt; margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
                <strong><span style="font-family:'Times New Roman'; color:#000000">&#xa0;</span></strong>
            </p>
            <p style="margin-left:0pt; margin-bottom:0pt; text-indent:106.35pt; line-height:normal">
                <span style="color:#000000">Bulan</span><span style="width:14.62pt; text-indent:0pt; display:inline-block"></span><span style="width:36pt; text-indent:0pt; display:inline-block"></span><span style="color:#000000">: <?php echo date('F');?></span>
            </p>
            <p style="margin-left:0pt; margin-bottom:0pt; text-indent:106.35pt; line-height:normal">
                <span style="color:#000000">Kelas </span><span style="width:14.22pt; text-indent:0pt; display:inline-block"></span><span style="width:36pt; text-indent:0pt; display:inline-block"></span><span style="color:#000000">: {{ Session::get('nama_kelas') }}</span>
            </p>
            <p style="margin-left:0pt; margin-bottom:0pt; text-indent:106.35pt; line-height:normal">
                <span style="color:#000000">Wali kelas </span><span style="width:30.33pt; text-indent:0pt; display:inline-block"></span><span style="color:#000000">: {{ Session::get('usernameWalas') }}</span>
            </p>
            <p style="margin-left:0pt; margin-bottom:0pt; text-indent:106.35pt; line-height:normal">
                <span style="color:#000000">&#xa0;</span>
            </p>
            <ol type="1" style="margin:0pt; padding-left:0pt">
                <li class="ListParagraph" style="margin-left:0pt; margin-bottom:0pt; text-align:justify; line-height:normal; font-size:12pt; font-weight:bold; color:#000000; list-style-position:inside">
                    KEADAAN SISWA
                </li>
            </ol>
            <ol type="a" style="margin:0pt; padding-left:0pt">
                <li class="ListParagraph" style="margin-left:30.31pt; margin-bottom:0pt; text-align:justify; line-height:normal; padding-left:5.69pt; color:#000000">
                    Jumlah siswa seluruhnya<span style="width:38pt; display:inline-block"></span>: {{ count($siswa) }} orang, terdiri dari,
                </li>
            </ol>
            <p class="ListParagraph" style="margin-bottom:0pt; text-align:justify; line-height:normal">
                <span style="color:#000000">Laki-laki</span><span style="width:3.18pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:26pt; display:inline-block"></span><span style="color:#000000">: {{ count($L) }} orang</span>
            </p>
            <p class="ListParagraph" style="margin-bottom:0pt; text-align:justify; line-height:normal">
                <span style="color:#000000">Perempuan</span><span style="width:24.86pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:32pt; display:inline-block"></span><span style="color:#000000">: {{ count($P) }} orang</span>
            </p>
            <ol start="2" type="a" style="margin:0pt; padding-left:0pt">
                <li class="ListParagraph" style="margin-left:30.78pt; margin-bottom:0pt; text-align:justify; line-height:normal; padding-left:5.22pt; color:#000000">
                    Siswa yang rawan bermasalah<span style="width:17pt; display:inline-block"></span>: {{ count($pelanggaran) }} orang
                </li>
            </ol>
            <p class="ListParagraph" style="margin-bottom:0pt; text-align:justify; line-height:normal">
            <?php $no = 1; ?>
                @if(count($pelanggaran) == 0)
                    <span style="color:#000000">1. .........................................</span> <br>
                    <span style="color:#000000">2. .........................................</span> <br>
                    <span style="color:#000000">3. .........................................</span> <br>
                @else
                @foreach($pelanggaran as $data)
                    <span style="color:#000000">{{ $no++ }}. {{ $data->siswa->nama_lengkap }}</span> <br>
                @endforeach
                @endif
            </p>
            <p style="margin-left:14.2pt; margin-bottom:0pt; text-align:justify; line-height:normal">
                <span style="color:#000000">c. </span><span style="width:12.79pt; display:inline-block"></span><span style="color:#000000">Siswa yang melakukan pelanggaran</span><span style="width:0.46pt; display:inline-block"></span><span style="color:#000000">: {{ count($pelanggaran) }} orang</span>
            </p>
            <p style="margin-left:0pt; margin-bottom:0pt; text-align:justify; line-height:normal">
                <span style="width:14.2pt; display:inline-block"></span><span style="color:#000000">Usaha untuk mengatasi kerawanan yang sudah dilakukan:</span>
            </p>
            <p style="margin-left:0pt; margin-bottom:0pt; text-align:justify; line-height:normal">
                <span style="width:14.2pt; display:inline-block"></span><span style="color:#000000">.............................................................................................................................................................................</span>
            </p>
            <ol start="2" type="1" style="margin:0pt; padding-left:0pt">
                <li class="ListParagraph" style="margin-left:0pt; margin-bottom:0pt; text-align:justify; line-height:normal; font-size:12pt; font-weight:bold; color:#000000; list-style-position:inside">
                    KEUANGAN
                </li>
            </ol>
            <ol type="a" style="margin:0pt; padding-left:0pt">
                <li class="ListParagraph" style="margin-left:31.78pt; margin-bottom:0pt; text-align:justify; line-height:normal; padding-left:4.22pt; font-size:12pt; color:#000000">
                    Menunggak pembayaran SPP selama 1 bulan<span style="width:15.55pt; display:inline-block"></span>: {{ count($data1) }}
                     orang
                </li>
                <li class="ListParagraph" style="margin-left:32.33pt; margin-bottom:0pt; text-align:justify; line-height:normal; padding-left:3.67pt; font-size:12pt; color:#000000">
                    Menunggal SPP selama lebih dari 1 bulan<span style="width:32pt; display:inline-block"></span>: {{ count($data2) }} orang
                </li>
            </ol>
            <p style="margin-left:18pt; margin-bottom:0pt; text-align:justify; line-height:normal; font-size:12pt">
                <span style="color:#000000">Sebab- sebab ketidak lancaran :</span>
            </p>
            <p style="margin-left:18pt; margin-bottom:0pt; text-align:justify; line-height:normal; font-size:12pt">
                <span style="color:#000000">.....................................................................................................................................</span>
            </p>
            <p style="margin-left:18pt; margin-bottom:0pt; text-align:justify; line-height:normal; font-size:12pt">
                <span style="color:#000000">.....................................................................................................................................</span>
            </p>
            <ol start="3" type="1" style="margin:0pt; padding-left:0pt">
                <li class="ListParagraph" style="margin-left:0pt; margin-bottom:0pt; text-align:justify; line-height:normal; font-size:12pt; font-weight:bold; color:#000000; list-style-position:inside">
                    SARANA DAN PRASARA
                </li>
            </ol>
            <ol type="a" style="margin:0pt; padding-left:0pt">
                <li class="ListParagraph" style="margin-left:31.78pt; margin-bottom:0pt; text-align:justify; line-height:normal; padding-left:4.22pt; font-size:12pt; color:#000000">
                    Ruang yang di tempati<span style="width:16.75pt; display:inline-block"></span>: {{ $sarpras[0]->kelas->nama_gedung }}
                </li>
                <li class="ListParagraph" style="margin-left:32.33pt; margin-bottom:0pt; text-align:justify; line-height:normal; padding-left:3.67pt; font-size:12pt; color:#000000">
                    Sarana dan prasarana yang perlu segera diperbaiki/dilakukan
                </li>
            </ol>
            <ol type="1" style="margin:0pt; padding-left:0pt">
                @foreach ($sarpras as $data)
                <li class="ListParagraph" style="margin-left:50.11pt; margin-bottom:0pt; text-align:justify; line-height:normal; padding-left:3.89pt; font-size:12pt; color:#000000">
                    {{ $data->sarpras_rusak }}
                </li>
                @endforeach
            </ol>
            <ol start="3" type="a" style="margin:0pt; padding-left:0pt">
                <li class="ListParagraph" style="margin-left:31.1pt; margin-bottom:0pt; text-align:justify; line-height:normal; padding-left:4.9pt; font-size:12pt; color:#000000">
                    Gambaran kebersihan kelas
                </li>
            </ol>
            <p class="ListParagraph" style="margin-bottom:0pt; text-align:justify; line-height:normal; font-size:12pt">
                <span style="color:#000000">{{ $sarpras[0]->keadaan }}</span>
            </p>
            <ol start="4" type="1" style="margin:0pt; padding-left:0pt">
                <li class="ListParagraph" style="margin-left:0pt; margin-bottom:0pt; text-align:justify; line-height:normal; font-size:12pt; font-weight:bold; color:#000000; list-style-position:inside">
                    LAIN-LAIN
                </li>
            </ol>
            <ol type="a" style="margin:0pt; padding-left:0pt">
                <li class="ListParagraph" style="margin-left:31.78pt; margin-bottom:0pt; text-align:justify; line-height:normal; padding-left:4.22pt; font-size:12pt; color:#000000">
                    Rekapitulasi efektifitas KBM Terlampir
                </li>
                <li class="ListParagraph" style="margin-left:32.33pt; margin-bottom:0pt; text-align:justify; line-height:normal; padding-left:3.67pt; font-size:12pt; color:#000000">
                    Rekapitulasi pelaksanaan KBM Terlampir
                </li>
                <li class="ListParagraph" style="margin-left:31.1pt; margin-bottom:0pt; text-align:justify; line-height:normal; padding-left:4.9pt; font-size:12pt; color:#000000">
                    Rekapitulasi GLS terlampir
                </li>
                <li class="ListParagraph" style="margin-left:32.33pt; margin-bottom:0pt; text-align:justify; line-height:normal; padding-left:3.67pt; font-size:12pt; color:#000000">
                    Rekapitulasi absensi siswa terlampir
                </li>
                <li class="ListParagraph" style="margin-left:32pt; margin-bottom:0pt; text-align:justify; line-height:normal; padding-left:4pt; font-size:12pt; color:#000000">
                    Catatan pelanggaran siswa terlampir
                </li>
            </ol>
            <br>
            <p class="ListParagraph" style="margin-bottom:0pt; text-align:justify; line-height:normal; font-size:12pt">
                <span style="color:#000000">Mengetahui,</span><span style="width:9.72pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="color:#000000">Mojokerto, {{ date('d F Y') }}</span>
            </p>
            <p class="ListParagraph" style="margin-bottom:0pt; text-align:justify; line-height:normal; font-size:12pt">
                <span style="color:#000000">Ketua paket Keahlian</span><span style="width:4.98pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="color:#000000">Wali Kelas</span>
            </p>
            <p style="margin-left:0pt; margin-bottom:0pt; text-align:justify; line-height:normal; font-size:12pt">
                <span style="color:#000000">&#xa0;</span>
            </p>
            <p class="ListParagraph" style="margin-bottom:0pt; text-align:justify; line-height:normal; font-size:12pt">
                <span style="color:#000000">&#xa0;</span>
            </p>
            <p class="ListParagraph" style="margin-bottom:0pt; text-align:justify; line-height:normal; font-size:12pt">
                <span style="color:#000000">....................................</span><span style="width:34.95pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:17pt; display:inline-block"></span><span style="color:#000000"> <strong><u>{{ Session::get('usernameWalas') }}</u></strong></span>
            </p>
            <p class="ListParagraph" style="margin-bottom:0pt; text-align:justify; line-height:normal; font-size:12pt">
                <span style="color:#000000">NIP.</span><span style="width:16pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:36pt; display:inline-block"></span><span style="width:15pt; display:inline-block"></span><span style="color:#000000">NIP.</span>
            </p>
            <p class="ListParagraph" style="margin-bottom:0pt; text-align:justify; line-height:normal; font-size:12pt">
                <span style="color:#000000">&#xa0;</span>
            </p>
            <p class="ListParagraph" style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
                <span style="color:#000000">Mengetahui,</span>
            </p>
            <p class="ListParagraph" style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
                <span style="color:#000000">Kepala Sekolah</span>
            </p>
            <p style="margin-left:0pt; margin-bottom:0pt; line-height:normal; font-size:12pt">
                <span style="color:#000000">&#xa0;</span>
            </p>
            <p class="ListParagraph" style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
                <span style="color:#000000">&#xa0;</span>
            </p>
            <p class="ListParagraph" style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
                <strong><u><span style="color:#000000">MUHARTO, S.Pd,M.M</span></u></strong>
            </p>
            <p class="ListParagraph" style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
                <span style="color:#000000">Pembina TK I </span>
            </p>
            <p style="margin-left:144pt; text-indent:36pt; line-height:120%; font-size:12pt">
                <span style="color:#000000">NIP. 19670510 199802 1 004</span>
            </p>
        </div>
    </body>
</html>
