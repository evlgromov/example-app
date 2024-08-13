<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('projects.index') ? 'active' : '' }}" href="{{ route('projects.index') }}">Проекты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('projects.create') ? 'active' : '' }}" href="{{ route('projects.create') }}">Создать проект</a>
                </li>
            </ul>
        </div>
    </div>
</nav>