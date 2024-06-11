{{-- resources/views/keluarga/show.blade.php --}}

@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Keluarga</h3>
            <div class="card-tools">
                <a href="{{ route('keluarga.index') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <tr>
                    <th>ID Keluarga</th>
                    <td>{{ $keluarga->id_keluarga }}</td>
                </tr>
                <tr>
                    <th>Nomor KK</th>
                    <td>{{ $keluarga->nomor_kk }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $keluarga->alamat }}</td>
                </tr>
                <tr>
                    <th>RT</th>
                    <td>{{ $keluarga->id_rt }}</td>
                </tr>
                <tr>
                    <th>Gambar Bukti KK</th>
                    <td>
                        @if($keluarga->bukti_kk)
                            <a href="{{ asset('images/warga/kk/'.$keluarga->bukti_kk) }}" data-toggle="lightbox" data-title="Bukti KK" data-gallery="gallery">
                                <img src="{{ asset('images/warga/kk/'.$keluarga->bukti_kk) }}" alt="Bukti KK" class="img-fluid" width="500">
                            </a>
                        @else
                            <span class="text-danger">Gambar tidak tersedia</span>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/ekko-lightbox/ekko-lightbox.css') }}">
@endpush

@push('js')
    <script src="{{ asset('adminlte/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>
@endpush
