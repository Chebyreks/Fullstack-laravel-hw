<!DOCTYPE html>

<head>
    <title>Главная страница</title>

    <style>
        .main { display: flex; flex-direction: column; align-items: center;}
        .auth-buttons { display: flex; flex-direction: row; gap: 32px; }
        .auth-button { 
            padding: 1px 6px; 
            border: 1px outset buttonborder; 
            border-radius: 3px; 
            color: black; 
            background-color: white; 
            text-decoration: none;}
    </style>
</head>
<body>
    <div>
        <div class="main">
            <h1>Добро пожаловать!</h1>
            <p>Выберите тип входа в систему</p>
            <p>(Системы регистрации нету)</p>
            <p>(Для работы пользователя нужно создать товары и доставщиков за администратора)</p>
            <div class="auth-buttons">
                <a class="auth-button" href="{{ route('admin.main') }}">
                    Вход для администратора
                </a>
                <a class="auth-button" href="{{ route('user.main') }}">
                    Вход для пользователя
                </a>
            </div>
        </div>
    </div>
</body>
</html>