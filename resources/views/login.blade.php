@include('header')
@include('navbar')

<main class="auth-container">
    @guest
        <div class="register-form">
            <h2>Register</h2>
            <form action="/signup" method="POST">
                @csrf
                <input name="name" type="text" placeholder="Name"><br>
                <input name="email" type="text" placeholder="Email"><br>
                <input name="password" type="password" placeholder="Password"><br>
                <input name="school" type="text" placeholder="School" value="{{old('school')}}"><br>
                <button>Register</button>
            </form>
        </div>

        <div class="login-form">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input name="loginemail" type="text" placeholder="Email"><br>
                <input name="loginpassword" type="password" placeholder="Password"><br>
                <button>Log in</button>
            </form>
        </div>
    @endguest
</main>

@include('footer')
