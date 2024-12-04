<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аккаунт заблокирован</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
          rel="stylesheet">
    <style>
        :root {
            --font-family: "Source Code Pro", monospace;
            --font-optical-sizing: auto;
            --font-weight: 400;
            --font-style: normal;
            --bg-color: #ffffff;
            --text-color: #333333;
        }

        body {
            font-family: var(--font-family);
            font-weight: 500;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.05) !important;
            max-width: 500px;
            width: 100%;
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 20px;
            border-radius: 5px;
            font-size: 18px;
        }

        .btn {
            display: inline-block;
            margin-top: 10px;
            border-radius: 10px;
            padding: 8px 12px;
            width: 100%;
            color: white;
            font-size: 16px;
            background-color: rgba(16, 16, 16, 1);
            border: 1px solid black;
            transition: color 0.3s ease, border 0.3s ease, background-color 0.3s ease;
        }

        .btn:hover {
            color: black;
            border: 1px solid #FFB539;
            background-color: #FFB539;
        }

        .btn:active {
            background-color: #FCE2CE !important;
            border: 1px solid #F6C065 !important;
            transition: none;
        }

        a {
            text-decoration: none;
        }

        .btn-section {
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            gap: 10px
        }
    </style>
</head>
<body>

<div class="container">
    <div class="alert">
        <h3>Ваш аккаунт был заблокирован</h3>
        <p>Уведомляем вас, что ваш аккаунт был заблокирован в соответствии с нашей политикой. Если вы считаете, что это
            произошло по ошибке или у вас есть вопросы, пожалуйста, не стесняйтесь связаться с нашей службой поддержки
            по адресу <a href="mailto:info@ultr.uz" style="color: black">info@ultr.uz</a>.</p>
    </div>
    <div class="btn-section">
        <a href="mailto:info@ultr.uz" class="btn">Связаться с поддержкой</a>
        {{--        <a href="{{route('main')}}" class="btn">На главную</a>--}}
    </div>
</div>
</body>
</html>
