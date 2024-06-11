<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Times New Roman", Times, serif;
        }

        .book {
            width: 176mm;
            height: 250mm;
            padding: 10mm;
            margin: 0 auto;
            position: relative;
            box-sizing: border-box;
            page-break-after: always;
        }

        .page {
            margin: 0 auto;
            height: 100%;
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .header h2 {
            margin: 0;
            font-size: 24px;
        }

        .header h3 {
            margin: 10px 0;
            font-size: 18px;
        }

        .header p {
            margin: 2px 0;
            font-size: 14px;
        }

        .header hr {
            border: none;
            border-top: 2px solid #000;
            margin: 10px 0;
        }

        .content {
            margin-bottom: 20px;
            /* font-size: 14px; */
            line-height: 1.6;
        }

        .content p {
            margin: 5px 0;
        }

        .footer {
            display: flex;
            justify-content: space-between;
        }

        .footer div {
            text-align: center;
            width: 30%;
        }

        .footer div p {
            margin: 5px 0;
            font-size: 14px;
        }

        .signature-space {
            margin-top: 80px;
        }
        .catatan-lampiran {
            position: absolute;
            bottom: 70px;
            left: 0;
            width: 50%;
        }
        .div-ketua {
            margin-top: 2mm;
            float: right;
            width: 80mm;
            text-align: center;
            line-height: 1.5;
            /* margin-top: 60px; */
        }
        .div-ketua,
        .catatan-lampiran {
            width: 50%;
        }

        @media print {
            .book {
                width: auto;
                height: auto;
                padding: 10mm;
            }

            .page {
                margin: 0;
                height: auto;
            }
        }
    </style>
    <title>Surat Pengantar</title>
</head>

<body>
    <div class="book">
        <div class="page">
            <div class="header">
                <h2>KELURAHAN JATIMULYO</h2>
                <p>KETUA RT {{$surat_pengantar->warga->keluarga->rt->no_rt}} RW 03</p>
                <p>KECAMATAN LOWOKWARU KOTA MALANG</p>
                <hr>
                <h3>SURAT PENGANTAR</h3>
                <p>No. {{ $surat_pengantar->id_surat_pengantar }}/{{$surat_pengantar->warga->keluarga->rt->no_rt}}/{{now()->day}}{{now()->year}}/{{now()->month}}</p>
            </div>
            <div class="content">
                <p>Yang bertanda tangan di bawah ini kami Ketua RT/RW Kelurahan Jatimulyo menerangkan bahwa :</p>
                <p>Nama Lengkap: {{ $surat_pengantar->warga->nama_lengkap }}</p>
                <p>Tempat Tgl. Lahir: {{ $surat_pengantar->warga->tempat_lahir }}, {{ $surat_pengantar->warga->tanggal_lahir }}</p>
                <p>Pekerjaan: {{ $surat_pengantar->warga->pekerjaan }}</p>
                <p>Jenis Kelamin: {{ $surat_pengantar->warga->jenis_kelamin }}</p>
                <p>Status Perkawinan: {{ $surat_pengantar->warga->status_perkawinan }}</p>
                <p>Agama: {{ $surat_pengantar->warga->agama }}</p>
                @if ($surat_pengantar->jenisSurat->nama_jenis == 'Lain-lain')
                <p>Keterangan: {{ $surat_pengantar->keterangan }}</p>
                @else
                <p>Keterangan: {{ $surat_pengantar->jenisSurat->nama_jenis }}</p>
                @endif
            </div>
            <div>
                <p style=>Demikian untuk menjadikan maklum.</p>
                <p style="text-align: right; margin-bottom:20px;">Malang, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
            <p style=>Mengetahui</p>
                </div>

            <div class="div-ketua" style="">
                <div style="width: 80mm;">
                    <p id="ketua-rw"></p>
                    <p style="margin-bottom: 5mm;">Ketua Rukun Tetangga</p>
                    <p style="margin-top: 25mm;">(.................................................)</p>
                </div>
            </div>

            <div class="div-ketua" style="">
                <div style="width: 80mm;">
                    <p id="ketua-rw"></p>
                    <p>Ketua Rukun Warga</p>
                    <p style="margin-top: 25mm;">(.................................................)</p>
                </div>
            </div>
            <div style="margin-top: 10mm; margin-left:10px; float: right;" class="catatan-lampiran">
                <h3 style="margin-bottom: 0;">Catatan:</h3>
                <p style="margin-top: 0; margin-bottom: 0;">Harap dilampiri</p>
                <ol style="margin-top: 0;">
                    <li>FOTOCOPY KARTU KELUARGA</li>
                    <li>FOTOCOPY KTP</li>
                    <li>DOKUMEN BERSANGKUTAN</li>
                </ol>
        </div>
    </div>
</body>

</html>


