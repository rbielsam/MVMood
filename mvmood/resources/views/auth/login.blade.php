
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h1>Login</h1>

<form method="post" action="/login">
    @csrf

    <label class="floating-label mb-6">
        <span>Email</span>
        <input type="email" name="email" value="{{ old('email') }}"
               class="input input-bordered @error('email') input-error @enderror" required>

    </label>
    @error('email')
    <div class="label -mt-4 mb-2">
        <span class="label-text-alt text-error">{{ $message }}</span>
    </div>
    @enderror

    <label class="floating-label mb-6">
        <span>Password</span>
        <input type="password" name="password" placeholder="••••••••"
               class="input input-bordered @error('password') input-error @enderror" required>

    </label>
    @error('password')
    <div class="label -mt-4 mb-2">
        <span class="label-text-alt text-error">{{ $message }}</span>
    </div>
    @enderror

    <div>
        <button type="submit">Iniciar session</button>
    </div>
</form>
<a href="/register">Registrarse</a>

</body>
</html>
