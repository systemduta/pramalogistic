<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img"> <img src="{{ asset('admin') }}/assets/images/users/profile.png" alt="user" />
                <!-- this is blinking heartbit-->
                <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
            </div>
            <!-- User profile text-->
            <div class="profile-text">
                <h5>{{ Auth::user()->name }}&nbsp;
                    <a href="javascript:void(0)" title="Update Profile" data-toggle="modal" data-target="#update_profile_modal">
                        <i class="fa fa-gear"></i>
                    </a>
                </h5>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();" class=""
                    data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                <div class="dropdown-menu animated flipInY">
                    <!-- text-->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    <!-- text-->
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-small-cap">Admin</li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="mdi mdi-bullseye"></i><span class="hide-menu">Home</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="{{ route('home.gambar') }}">Gambar Slider</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="mdi mdi-gauge"></i><span class="hide-menu">Karir</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('lowongan') }}">Data Lowongan</a></li>
                        <li><a href="{{ route('admin.pelamar') }}">Data Pelamar</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="mdi mdi-newspaper"></i><span class="hide-menu">Berita</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('berita') }}">Data Berita</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="mdi mdi-cash-multiple"></i><span class="hide-menu">Tarif</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.shipping_rates') }}">Data Tarif</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

<div class="modal fade" id="update_profile_modal" tabindex="-1" role="dialog"
     aria-labelledby="updateProfileModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{route('update_profile', [auth()->user()->id])}}">
                @csrf
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Update Profile</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
                </div>
                <div class="form-group">
                    <label class="control-label">Email:</label>
                    <input type="text" class="form-control" name="email">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin merubah email</small>
                </div>
                <div class="form-group">
                    <label class="control-label">Password:</label>
                    <input type="text" class="form-control" name="password">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin merubah password</small>
                </div>
                <div class="form-group">
                    <label class="control-label">Company Name:</label>
                    <input type="text" class="form-control" name="company_name" value="{{auth()->user()->company_name}}">
                </div>
                <div class="form-group">
                    <label class="control-label">Company WhatsApp:</label>
                    <input type="text" class="form-control" name="company_wa" value="{{auth()->user()->company_wa}}">
                    <small class="form-text text-muted">Format penulisan: 6285855558835</small>
                </div>
                <div class="form-group">
                    <label class="control-label">Company Address:</label>
                    <textarea class="form-control" id="form_noted" name="company_address">{{auth()->user()->company_address}}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="_method" value="PUT" class="btn btn-warning">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
