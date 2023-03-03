<!-- sidebar -->
<div class="sidebar">
    <h1 align="center">SETS</h1>
    <h2 align="center" style="height: 47px;">Group 3 Project</h2>
    <a href="{{ route('user.profile') }}">Profile</a>
    <a href="{{ route('user.post') }}">Posts</a>
    <a href="{{ route('user.notes') }}">My Notes</a>
    <a href="{{URL('full-calendar') }}">Schedules</a>
    <nav class=" navbar-expand-lg">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tools</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('search.index') }}">Dictionary</a>
                        <a class="dropdown-item" href="{{ url('/calculator') }}">Calculator</a>
                        <a class="dropdown-item" href="{{ route('unisharp.lfm.show') }}">File Manager</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
     <a href="{{ route('user.logout') }}">Logout</a>
</div>
<!-- end sidebar -->
