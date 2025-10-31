<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Учебные группы</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            text-align: center;
            background: white;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
        }
        .btn {
            display: inline-block;
            padding: 15px 30px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background: #764ba2;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .auth-links {
            margin-top: 20px;
        }
        .auth-links a {
            color: #ааа;
            text-decoration: none;
            margin: 0 10px;
        }
        .auth-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Система управления учебными группами</h1>
        
        @if (Route::has('login'))
            <div class="auth-links">
                @auth
                    <p>Добро пожаловать, {{ Auth::user()->name }}!</p>
                    <a href="{{ route('groups.index') }}" class="btn">Посмотреть списки групп</a>
                    <br><br>
                    <a href="{{ route('profile') }}">Мой профиль</a> |
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('groups.index') }}" class="btn">Посмотреть списки групп</a>
                    <br><br>
                    <a href="{{ route('login') }}">Войти</a>
                    @if (Route::has('register'))
                        | <a href="{{ route('register') }}">Зарегистрироваться</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</body>
</html>