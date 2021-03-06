@extends('welcome')

@section('content')
  <div class="row row-main">
    <div class="col s12 m12 l12">
      <div class="card-panel">
        <div class="row">
          <div class="col s12 m4 l4">
            <nav class="cyan nav-breadcrumb">
              <div class="nav-wrapper">
                <div class="col s12 m12 l12">
                  <a class="breadcrumb">Mesin Absensi</a>
                </div>
              </div>
            </nav>
          </div>
          <div class="col s12 m8 l8">
            <div class="row right">
              <div class="col s12 m12 l12">
                <a href="{{ route('fingerprint_create') }}" class="btn waves-effect waves-light cyan tooltipped" data-position="top" data-delay="50" data-tooltip="Tambah Mesin Absensi"><i class="material-icons">add_circle</i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="row margin-bottom">
          <div class="col s12 m12 l12">
            <h4>Tabel Mesin Absensi</h4>
          </div>
        </div>
        <table class="striped responsive-table">
          <thead>
            <tr>
              <th>No.</th>
              <th>IP Address</th>
              {{-- <th>Port</th> --}}
              <th>Comkey</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
           </thead>
          <tbody>
            @foreach ($data as $key => $value)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $value->ip }}</td>
                {{-- <td>{{ ($value->port) ? $value->port : '-' }}</td> --}}
                <td>{{ $value->comkey }}</td>
                <td>{{ ($value->status == 1) ? "Aktif" : "Tidak Aktif" }}</td>
                <td>
                  @if ($value->status == 1)
                    <a href="{{ route('fingerprint_deactive', ['id' => $value->id]) }}" class="btn waves-effect waves-light red tooltipped" data-position="top" data-delay="50" data-tooltip="Non Aktifkan Mesin Fingerprint"><i class="material-icons">clear</i></a>
                  @else
                    <a href="{{ route('fingerprint_active', ['id' => $value->id]) }}" class="btn waves-effect waves-light green tooltipped" data-position="top" data-delay="50" data-tooltip="Aktifkan Mesin Fingerprint"><i class="material-icons">done</i></a>
                  @endif
                  <a href="{{ route('fingerprint_check_connection', ['id' => $value->id]) }}" class="btn waves-effect waves-light blue tooltipped" data-position="top" data-delay="50" data-tooltip="Cek Koneksi"><i class="material-icons">wifi_tethering</i></a>
                  <a href="{{ route('fingerprint_edit', ['id' => $value->id]) }}" class="btn waves-effect waves-light cyan tooltipped" data-position="top" data-delay="50" data-tooltip="Ubah Mesin Fingerprint"><i class="material-icons">edit</i></a>
                  <a href="{{ route('fingerprint_delete', ['id' => $value->id]) }}" class="btn waves-effect waves-light red tooltipped" data-position="top" data-delay="50" data-tooltip="Hapus Mesin Fingerprint"><i class="material-icons">delete</i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="row margin-bottom">
          <div class="col s12 m12 l12">
            <div class="right">
              {{ $data->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
