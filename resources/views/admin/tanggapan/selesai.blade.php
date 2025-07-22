@extends('admin.partials.main')
@section('content_admin')
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Pengaduan Selesai</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pembuat</th>
                        <th>NIK</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Isi</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduan as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->masyarakat->nama ?? '-' }}</td>
                        <td>{{ $row->masyarakat->nik ?? '-' }}</td>
                        <td>{{ $row->tgl_pengaduan }}</td>
                        <td>{{ $row->isi_laporan }}</td>
                        <td>
                            @if ($row->foto)
                                <img src="{{ asset('foto/' . $row->foto) }}" width="60" alt="Foto">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td><span class="text-success">Selesai</span></td>
                        <td>
                            <form action="/admin_pengaduan/{{ $row->id_pengaduan }}" method="POST">
                                @csrf
                                @method('delete')
                                <a href="/admin_pengaduan/{{ $row->id_pengaduan }}/edit" class="btn btn-warning m-2">Edit</a>
                                <button type="submit" class="btn btn-danger m-2" onclick="return confirm('Yakin hapus?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
