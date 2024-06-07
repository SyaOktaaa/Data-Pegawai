<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pegawai - XI-PPLG</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ url('admin/posts/update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        

                            <div class="form-group">
                                <label class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                <!-- Menampilkan gambar yang ingin diedit -->
                                <img src="{{ asset('/storage/posts/'.$post->image) }}" class="rounded mt-2" style="width: 100px;">
                                <!-- error message untuk gambar -->
                                @error('image')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $post->nama }}" placeholder="Masukkan Nama">
                                        <!-- error message untuk nama -->
                                        @error('nama')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jenis Kelamin</label>
                                        <select class="form-select @error('jenis_kelamin') is-invalid @enderror" aria-label="Default select example" name="jenis_kelamin">
                                            <option value="laki-laki" @if($post->jenis_kelamin == 'laki-laki') selected @endif>Laki-laki</option>
                                            <option value="perempuan" @if($post->jenis_kelamin == 'perempuan') selected @endif>Perempuan</option>
                                        </select>
                                        <!-- error message untuk jenis kelamin -->
                                        @error('jenis_kelamin')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Alamat</label>
                                <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Masukkan Alamat">{{ $post->alamat }}</textarea>
                                <!-- error message untuk alamat -->
                                @error('alamat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tempat Lahir</label>
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ $post->tempat_lahir }}" placeholder="Masukkan Tempat Lahir">
                                        <!-- error message untuk tempat lahir -->
                                        @error('tempat_lahir')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tanggal Lahir</label>
                                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ $post->tanggal_lahir }}" placeholder="Masukkan Tanggal Lahir">
                                        <!-- error message untuk tanggal lahir -->
                                        @error('tanggal_lahir')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Masuk kerja</label>
                                <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" name="tanggal_masuk" value="{{ $post->tanggal_masuk }}" placeholder="Masukkan tanggal masuk">
                                <!-- error message untuk tanggal masuk -->
                                @error('tanggal_masuk')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row">
    <div class="col">
        <div class="form-group">
            <label class="font-weight-bold">Jabatan</label>
            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ $post->jabatan }}" placeholder="Masukkan Jabatan">
            <!-- error message untuk jabatan -->
            @error('jabatan')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="row">
    <div class="col">
        <div class="form-group">
            <label class="font-weight-bold">Job desk</label>
            <textarea class="form-control @error('job') is-invalid @enderror" name="job" rows="5" placeholder="Masukkan Job Desk">{{  $post->job }}</textarea>
            <!-- error message untuk job -->
            @error('job')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>

                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </
