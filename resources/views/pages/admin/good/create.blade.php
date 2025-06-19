<!DOCTYPE html>
<html>
<head>
    <title>Добавить товар</title>

    <style>
        body {
            display: flex; 
            flex-direction: column; 
            align-items: center;
            gap: 2rem;
            font-size: large
        }

        .button {
            padding: 1px 6px; 
            border: 1px outset buttonborder; 
            border-radius: 3px; 
            color: black; 
            background-color: white; 
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Добавить новый товар</h1>

    <form method="POST" action="{{ route('admin.good.store') }}">
        @csrf

        <div>
            <label for="name">Название товара:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="price">Цена:</label>
            <input type="number" id="price" name="price" step="0.01" required>
        </div>

        <button  type="submit">Добавить товар</button>
    </form>

    <div>
        <a class="button" href="{{ route('admin.good.index') }}">Вернуться к списку товаров</a>
    </div>
</body>
</html>