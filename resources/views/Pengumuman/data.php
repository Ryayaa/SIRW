<?php

use Carbon\Carbon;

$heads = [
    ['label' => 'No', 'width' => 3],
    ['label' => 'Thumbnail Pengumuman', 'width' => 10],
    ['label' => 'Judul Pengumuman', 'width' => 8],
    ['label' => 'Deskripsi Pengumuman', 'width' => 8],
    ['label' => 'Tanggal', 'width' => 8],
    ['label' => 'Opsi', 'width' => 10],
];

$query = [];
$loop = 1;

foreach ($pengumuman as $item) {  
    $edit_btn = '<button class="btn btn-success mx-1 shadow-sm edit-btn" data-toggle="modal" data-target="#modal_edit_pengumuman'.$item->id_pengumuman.'">
                    <i class="fa fa-fw fa-pen mr-2"></i> Edit
                </button>';

    $remove_btn = '<button class="btn btn-danger mx-1 shadow-sm edit-btn" data-toggle="modal" data-target="#modal_remove_'.$item->id_pengumuman.'">
                        <i class="fa fa-fw fa-trash mr-2"></i> Hapus
                    </button>';
    $thumbnail = '<img src="' . asset('storage/thumbnails/' . $item->gambar) . '" alt="" style="width: 100px">';

    $query[]=[
        $loop,
        $thumbnail,
        $item->judul_pengumuman,
        htmlspecialchars_decode($item->deskripsi),
        Carbon::parse($item->tanggal)->format('d M Y'),
        $edit_btn.' '.$remove_btn
    ];

    $loop++;
}

$config = [
    'data' => $query,
    'columns' => [['className' => 'text-center'], null, null, null, null, ['orderable' => false],],
    'language' => ['url' => 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/id.json'],
];
