<!-- Navbar section -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <section class="container">

        <a class="navbar-brand" href="{{url("/")}}">My Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url("/")}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url("posts/trash")}}">Trash</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url("posts/table")}}">Posts</a>
                </li>
            </ul>
        </div>
    </section>
</nav>