<!DOCTYPE html>
<html>
<head>
    <title>Манга</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div>
    <div>
        <form method="post" action="http://127.0.0.1:8000/api">
            @csrf
           <p><input name="id_name" type="text"> </p>
            <p>
                <input type="radio" name="type" value="1"> Получить всю мангу<Br>
                <input type="radio" name="type" value="2"> Получить всех авторов<Br>
                <input type="radio" name="type" value="3"> Получить мангу по id<Br>
                <input type="radio" name="type" value="4"> Получить автора по id<Br>
                <input type="radio" name="type" value="5"> Получить мангу по id автора<Br>
            </p>


        </form>
    </div>
</div>
</body>
</html>
