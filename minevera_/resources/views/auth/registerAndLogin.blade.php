<!DOCTYPE html>
<html>

<head>
    @include('components.head')
    <!-- LINK TO STYLE -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <script src="{{ asset('js/form.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/validateRegister.js') }}"></script>

    <title>Login</title>
</head>

<body>
    <div class="form">

        <ul class="tab-group">
            <li class="tab active"><a href="#signup">Registrarme</a></li>
            <li class="tab"><a href="#login">Entrar</a></li>
        </ul>

        <div class="tab-content">
            <div id="signup">
                <h1>Registrate gratis</h1>

                <form method="POST" action="{{ route('register.post') }}">
                    
                    @csrf

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="field-wrap">
                        <label for="name">
                            Nombre <span class="req">*</span>
                        </label>
                        <input type="text" name="name" id="name" required />
                    </div>

                    <div class="field-wrap">
                        <label for="email">
                            Email <span class="req">*</span>
                        </label>
                        <input type="email" name="email" id="email" required />
                    </div>

                    <div class="field-wrap">
                        <label for="password">
                            Contraseña<span class="req">*</span>
                        </label>
                        <input type="password" name="password" id="password" required />
                    </div>

                    <div class="field-wrap">
                        <label for="password_confirmation">
                            Confirmar contraseña<span class="req">*</span>
                        </label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required />
                    </div>

                    <button type="submit" class="button button-block">COMENZAR</button>

                </form>

            </div>

            <div id="login">
                <h1>Hola de nuevo!</h1>

                <form method="POST" action="{{ route('login.post') }}">
                    @csrf

                    <div class="field-wrap">
                        <label for="email">
                            Email<span class="req">*</span>
                        </label>
                        <input type="email" type="email" name="email" id="email" required autofocus />
                    </div>

                    <div class="field-wrap">
                        <label for="password">
                            Contraseña<span class="req">*</span>
                        </label>
                        <input type="password" name="password" id="password" required />
                    </div>


                    <p class="forgot"><a href="#">¿Olvidaste tu contraseña?</a></p>

                    <button class="button button-block" type="submit">ENTRAR</button>

                </form>

            </div>

        </div><!-- tab-content -->

    </div> <!-- /form -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/form.js') }}"></script>
    <script src="{{ asset('js/validateRegister.js') }}"></script>
</body>

</html>