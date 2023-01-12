<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
            <i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <span class="text-light text-sm ">
            <?php
            $today = Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y');
            ?>
            Tanggal : <b> {{ $today }} </b>
        </span><br>
        <span class="text-light text-sm"> Jam :<b> <span id="jam"></span></b></pre> </span>
    </li>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->

    @php
        $id = Auth::user()->id;
        $adminData = App\Models\User::find($id);
    @endphp

    <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img class="user-image img-circle elevation-2"
                src="{{ !empty($adminData->profile_images) ? url('upload/admin_images/' . $adminData->profile_images) : url('upload/no_image.jpg') }}"
                alt="Header Avatar">
            <span class="d-none d-md-inline"> {{ Auth::user()->name }}
            </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
                <img class="user-image img-circle elevation-2"
                    src="{{ !empty($adminData->profile_images) ? url('upload/admin_images/' . $adminData->profile_images) : url('upload/no_image.jpg') }}"
                    alt="Header Avatar">
                <p>
                    {{ Auth::user()->name }}
                    @if (Auth::user()->name == 'Admin')
                       <small>Admin Plating</small>
                    @else
                    <small>Operator Plating</small>
                    @endif
                </p>
            </li>
            <!-- Menu Body -->

            <!-- Menu Footer-->
            <li class="user-footer">
                <a href="{{ route('admin.profile') }}" class="btn btn-default btn-flat">Profile</a>
                <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat float-right">Sign
                    out</a>
            </li>
        </ul>
    </li>
</ul>
