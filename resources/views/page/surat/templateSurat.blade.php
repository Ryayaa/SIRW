<!DOCTYPE html>
<html>
<head>
    <title>Surat Pengantar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 85%;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            line-height: 0.5;
        }
        .header hr {
            border: none;
            border-top: 2px solid #000;
            margin: 10px 0;
        }
        .content {
            margin-bottom: 20px;
        }
        .footer {
            display: flex;
            justify-content: space-between;
        }
        .footer div {
            text-align: center;
        }
        .signature-space {
            margin-top: 80px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>KELURAHAN JATIMULYO</h2>
            <p>KETUA RT ............ RW 03</p>
            <p>KECAMATAN LOWOKWARU KOTA MALANG</p>
            <hr>
            <h3>SURAT PENGANTAR</h3>
            <p>No. {{ $surat_pengantar->id_surat_pengantar }}</p>
        </div>
        <div class="content">
            <p>Yang bertanda tangan di bawah ini kami Ketua RT / RW Kelurahan Jatimulyo menerangkan bahwa :</p>
            <p>Nama Lengkap: {{ $surat_pengantar->warga->nama_lengkap }}</p>
            <p>Tempat Tgl. Lahir: {{ $surat_pengantar->warga->tempat_lahir }}, {{ $surat_pengantar->warga->tanggal_lahir }}</p>
            <p>Pekerjaan: {{ $surat_pengantar->warga->pekerjaan }}</p>
            <p>Jenis Kelamin: {{ $surat_pengantar->warga->jenis_kelamin }}</p>
            <p>Status Perkawinan: {{ $surat_pengantar->warga->status_perkawinan }}</p>
            <p>Agama: {{ $surat_pengantar->warga->agama }}</p>
            <p>Keterangan: {{ $surat_pengantar->jenisSurat->nama_jenis }}</p>
            @if ($surat_pengantar->jenisSurat->nama_jenis == 'Lain-lain')
                <p>{{ $surat_pengantar->keterangan }}</p>
            @endif
        </div>
        <div>
            <p>Demikian untuk menjadikan maklum.</p>
            <p style="text-align: right;">Malang, {{ now()->format('d M Y') }}</p>
        </div>
        <p style="display:flex; justify-content: center; margin-top: 30px;">Mengetahui</p>
        <div class="footer">
            <div>
                <p>Yang Bersangkutan</p>
                <p class="signature-space">(....................................)</p>
            </div>
            <div>
                <p>Ketua RW</p>
                <p class="signature-space">(....................................)</p>
            </div>
            <div>
                <p>Ketua RT</p>
                <p class="signature-space">(....................................)</p>
            </div>
        </div>
    </div>
</body>
</html>
