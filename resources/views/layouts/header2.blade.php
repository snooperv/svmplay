        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"/><div class="logo-name">N<span class="pink">A</span>ILS</div>
                </svg>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/" class="nav-link bg-dark active">Главная</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Кнопка</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Кнопка</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Кнопка</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Кнопка</a></li>
            </ul>

            <div class="col-md-3 text-end d-flex flex-wrap align-items-center justify-content-center justify-content-md-between">
                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}">
                            <button type="button" class="btn btn-outline-primary me-2">Войти</button></a>
                    @endif

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            <button type="button" class="btn btn-primary">Регистрация</button></a>
                    @endif
                @else
                    <h4>
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Выйти
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    </h4>

                @endguest
            </div>
        </header>

    <script src=="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
