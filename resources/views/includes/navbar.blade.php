<!-- Navbar section -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url("/")}}">My Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{url("/")}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url("posts/trash")}}">Trash</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url("posts/table")}}">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url("users")}}">Users</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
