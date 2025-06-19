<!DOCTYPE html>

<head>
    <title>Главная страница</title>

    <style>
        .main { display: flex; flex-direction: column; align-items: center;}
        .button {
            padding: 1px 6px; 
            border: 1px outset buttonborder; 
            border-radius: 3px ; 
            color: black; 
            background-color: white; 
            text-decoration: none;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
    <div>
        <div class="main">
            <h1>Вы пользователь, вы можете изменять свои корзины</h1>
            <p>Выберите, что хотите увидеть</p>
            <a class="button" href="{{ route('user.order.index') }}">
                Список корзин
            </a>
            <a class="button" href="{{ route('home') }}">
                Вернуться
            </a>
        </div>
    </div>
</body>
</html>