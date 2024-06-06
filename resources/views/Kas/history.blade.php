<!-- resources/views/Kas/history.blade.php -->

@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">History Kas</h3>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs" id="kasTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="masuk-tab" data-toggle="tab" href="#masuk" role="tab" aria-controls="masuk" aria-selected="true">Kas Masuk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="keluar-tab" data-toggle="tab" href="#keluar" role="tab" aria-controls="keluar" aria-selected="false">Kas Keluar</a>
                </li>
            </ul>
            <div class="tab-content" id="kasTabsContent">
                <div class="tab-pane fade show active" id="masuk" role="tabpanel" aria-labelledby="masuk-tab">
                    <table class="table table-bordered table-striped table-hover table-sm mt-3">
                        <thead>
                            <tr>
                                <th>ID Kas</th>
                                <th>Jumlah</th>
                                <th>Jumlah Masuk</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                <th>ID RT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kasMasuk as $entry)
                                <tr>
                                    <td>{{ $entry->id_kas }}</td>
                                    <td>{{ $entry->jumlah }}</td>
                                    <td>{{ $entry->jumlah_masuk }}</td>
                                    <td>{{ $entry->keterangan }}</td>
                                    <td>{{ $entry->tanggal }}</td>
                                    <td>{{ $entry->id_rt }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="keluar" role="tabpanel" aria-labelledby="keluar-tab">
                    <table class="table table-bordered table-striped table-hover table-sm mt-3">
                        <thead>
                            <tr>
                                <th>ID Kas</th>
                                <th>Jumlah</th>
                                <th>Jumlah Keluar</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                <th>ID RT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kasKeluar as $entry)
                                <tr>
                                    <td>{{ $entry->id_kas }}</td>
                                    <td>{{ $entry->jumlah }}</td>
                                    <td>{{ $entry->jumlah_keluar }}</td>
                                    <td>{{ $entry->keterangan }}</td>
                                    <td>{{ $entry->tanggal }}</td>
                                    <td>{{ $entry->id_rt }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
