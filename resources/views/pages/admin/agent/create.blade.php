<!DOCTYPE html>
<html>
<head>
    <title>Добавить доставщика</title>

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
    <h1>Добавить нового доставщика</h1>

    <form method="POST" action="{{ route('admin.agent.store') }}">
        @csrf
        
        <div>
            <label for="name">Доставщик:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>Состояние активности:</div>
        <div>
            <div>
                <input type="radio" id="choice_yes" name="active" value="1" {{ old('choice') == '1' ? 'checked' : '' }}>
                <label for="choice_yes">Да</label>
            </div>
            
            <div>
                <input type="radio" id="choice_no" name="active" value="0" {{ old('choice') == '0' ? 'checked' : '' }}>
                <label for="choice_no">Нет</label>
            </div>
        </div>


        <button type="submit">Добавить доставщика</button>
    </form>

    <div>
        <a class="button" href="{{ route('admin.agent.index') }}">Вернуться к списку доставщиков</a>
    </div>
</body>
</html>