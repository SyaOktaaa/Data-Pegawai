<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pegawai - XI-PPLG</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: lightgray;
            margin: 0; /* Hilangkan margin dari body */
            padding: 0; /* Hilangkan padding dari body */
        }

        .container {
            margin-top: 0; /* Hilangkan margin atas dari container */
            padding-top: 20px; /* Opsional: tambahkan sedikit padding atas jika diperlukan */
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 30px;
        }

        .card-img-top {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            object-fit: cover;
            height: 250px;
            width: 100%;
            border-bottom: 10px solid #f8f9fa;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .card-info {
            margin-top: 20px;
        }

        .card-info h4 {
            font-size: 18px;
            font-weight: normal;
            margin: 5px 0;
            color: #666;
        }

        .card-content {
            margin-top: 20px;
        }

        .card-content p {
            font-size: 16px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .content-wrapper {
            margin: 0; /* Hilangkan margin dari content-wrapper */
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">Show</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ url('admin/dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/posts/pegawai') }}" class="nav-link {{ request()->is('admin/posts/pegawai') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tabel pegawai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/posts/tabel') }}" class="nav-link {{ request()->is('admin/posts/tabel') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tabel user</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <img src="{{ asset('storage/posts/'.$post->image) }}" class="card-img-top" alt="Image">
                            <div class="card-body">
                                <h4 class="card-title">{{ $post->title }}</h4>
                                <table class="card-info">
                                    <tr>
                                        <th>Nama:</th>
                                        <td>{{ $post->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat:</th>
                                        <td>{{ $post->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tempat lahir:</th>
                                        <td>{{ $post->tempat_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal lahir:</th>
                                        <td>{{ $post->tanggal_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender:</th>
                                        <td>{{ $post->jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jabatan:</th>
                                        <td>{{ $post->jabatan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal masuk:</th>
                                        <td>{{ $post->tanggal_masuk }}</td>
                                    </tr>
                                    <tr>
                                        <th>Job:</th>
                                        <td>{{ $post->job }}</td>
                                    </tr>
                                </table>
                                <div class="card-content">
                                    <p>{!! $post->content !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
</body>

</html>
