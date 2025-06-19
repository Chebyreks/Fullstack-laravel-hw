<!DOCTYPE html>

<head>
    <title>Главная страница</title>

    <style>
        .main { display: flex; flex-direction: column; align-items: center;}
        .buttons { 
            display: flex; 
            flex-direction: c; 
            gap: 32px; 
            padding-bottom: 16px;
        }
        .button {
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
            <h1>Вы Администратор, вы можете изменять товары, работающих доставщиков</h1>
            <p>Выберите, что хотите увидеть</p>
            <div class="buttons">
                <a class="button" href="{{ route('admin.good.index') }}">
                    Список товаров
                </a>
                <a class="button" href="{{ route('admin.agent.index') }}">
                    Список агентов
                </a>
            </div>
            <a class="button" href="{{ route('home') }}">
                Вернуться
            </a>
        </div>
    </div>
</body>
</html>