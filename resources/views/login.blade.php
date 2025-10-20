@include('header')
@include('navbar')

<main class="auth-container">
    @guest
        <div class="auth-left">
            <div class="auth-form">
                <h2>Register</h2>
                <form action="/signup" method="POST">
                    @csrf
                    <input name="name" type="text" placeholder="Name"><br>
                    <input name="email" type="text" placeholder="Email"><br>
                    <input name="password" type="password" placeholder="Password"><br>
                    <input name="school" type="text" placeholder="School" value="{{ old('school') }}"><br>
                    <button>Register</button>
                </form>
            </div>

            <div class="auth-form">
                <h2>Login</h2>
                <form action="/login" method="POST">
                    @csrf
                    <input name="loginemail" type="text" placeholder="Email"><br>
                    <input name="loginpassword" type="password" placeholder="Password"><br>
                    <button>Log in</button>
                </form>
            </div>
        </div>

        <div class="auth-right">
            <p>Welcome to TIGrS</p>
        </div>
    @else
        <div class="auth-right" style="width: 100%; justify-content: center; align-items: center;">
            <p>Welcome to TIGrS, {{ Auth::user()->name }}!</p>
        </div>
    @endguest
</main>

@include('footer')
