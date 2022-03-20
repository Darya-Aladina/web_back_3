<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome 3</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <h2>Форма</h2>
    <div id="fun">
        <form action="" method="POST">
            <h1>Данные клиента</h1>
        <!--1)--> <label>Имя:<br>
            <input type="text" name="userName" placeholder="Имя" />
        </label>
        <br><br>
        <!--2)--> <label>E-mail:<br>
            <input name="userE_mail" placeholder="E-mail" type="email" />
        </label>
        <br><br>
        <!--3)--> <label>Дата рождения:<br>
            <input name="birthdate" type="date" />
        </label>
        <br><br>
        <!--4)--> Пол:<br>
        <label><input type="radio" name="s" value="Male" />Мужской</label>
        <label><input type="radio" name="s" value="Female" />Женский</label>
        <br><br>
        <!--5)--> Кол-во конечностей:<br>
        <label><input type="radio" name="limbs" value="1" />1</label>
        <label><input type="radio" name="limbs" value="2" />2</label>
        <label><input type="radio" name="limbs" value="3" />3</label>
        <label><input type="radio" name="limbs" value="4" />4</label>
        <br><br>
        <!--6)--> <label>Сверхспособности:<br>
            <select id="form-select" multiple size="3" name="powers[]">
                <option value="immortality">Бессмертие</option>
                <option value="levitation">Телекинез</option>
                <option value="walls-walking">Хождение сквозь стены</option>
                </select>
        </label>
        <br><br>
        <!--7)--> <label>Биография:<br>
            <textarea placeholder="Дополнительная информация о себе" name="bio" cols="30" rows="4"></textarea>
        </label>
        <br><br>
        <!--8)--> <label><input type="checkbox" name="check" checked>С контрактом ознакомлен(-а)</label>
        <br><br>
        <!--9)--> <button>Отправить</button>
        <br>
    </form>
    </div>
    </body>
</html>