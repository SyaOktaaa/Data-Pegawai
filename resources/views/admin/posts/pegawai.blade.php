<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
     
          <!-- /.card-body -->
        <!-- /.card --> 

        <div class="card">
          <div class="card-body" style="width: 50%">
            <a href="{{ url('admin/posts/create') }}" class="btn btn-md btn-success mb-6 text-left">TAMBAH POST</a>
          </div>

          <!-- <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
          </div> -->
          
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">GAMBAR</th>
                  <th scope="col">NAMA</th>
                  <th scope="col">ALAMAT</th>
                  <th scope="col" style="width: 1rem;">TEMPAT_LAHIR</th>
                  <th scope="col">TGL_LAHIR</th>
                  <th scope="col">GENDER</th>
                  <th scope="col">JABATAN</th>
                  <th scope="col">TANGGAL_MASUK</th>
                  <th scope="col">JOB_DESK</th>
                  <th scope="col">AKSI</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($posts as $post)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-center">
                      <img src="{{ asset('/storage/posts/'.$post->image) }}" class="rounded" style="width: 100px">
                    </td>
                    <td>{{ $post->nama }}</td>
                    <td>{{ $post->alamat }}</td>
                    <td>{{ $post->tempat_lahir }}</td>
                    <td>{{ $post->tanggal_lahir }}</td>
                    <td>{{ $post->jenis_kelamin }}</td>
                    <td>{{ $post->jabatan }}</td>
                    <td>{{ $post->tanggal_masuk }}</td>
                    <td>{{ $post->job }}</td>
                    <td class="text-center">
                      <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ url('admin/posts/destroy', $post->id) }}" method="POST">
                        <a href="{{ url('admin/posts/show', $post->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                        <a href="{{ url('admin/posts/edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="11" class="text-center">
                      <div class="alert alert-danger">
                        Data Post belum Tersedia.
                      </div>
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>