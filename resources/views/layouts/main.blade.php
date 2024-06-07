@if (Auth::user()->usertype == 'admin')
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('admin/dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                                            <p>Dashboard</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('admin/posts/pegawai') }}" class="nav-link {{ request()->is('admin/posts/pegawai') ? 'active' : '' }}">
                                            <p>Table Pegawai</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('admin/tabel/tabel') }}" class="nav-link {{ request()->is('admin/tabel/tabel') ? 'active' : '' }}">
                                            <p>Table User</p>
                                        </a>
                                    </li>
                                </ul>
                                @elseif (Auth::user()->usertype == 'supervisor')

                                    <li class="nav-item">
                                        <a href="{{ url('supervisor/dashboard')}}" class="nav-link {{ request()->is('supervisor/dashboard') ? 'active' : '' }}">
                                            <p>Dashboard</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('supervisor/pegawai')}}" class="nav-link {{ request()->is('supervisor/pegawai') ? 'active' : '' }}">
                                            <p>Table Pegawai</p>
                                        </a>
                                    </li>

                                @elseif (Auth::user()->usertype == 'user')

                                    <li class="nav-item">
                                        <a href="{{ url('dashboard')}}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                                            <p>Dashboard</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('pegawai')}}" class="nav-link {{ request()->is('pegawai') ? 'active' : '' }}">
                                            <p>Table Pegawai</p>
                                        </a>
                                    </li>
                            @endif