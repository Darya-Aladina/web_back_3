<?php
// Отправляем браузеру правильную кодировку,
// файл index.php должен быть в кодировке UTF-8 без BOM.
header('Content-Type: text/html; charset=UTF-8');

// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // В суперглобальном массиве $_GET PHP хранит все параметры, переданные в текущем запросе через URL.
  if (!empty($_GET['save'])) {
    // Если есть параметр save, то выводим сообщение пользователю.
    print('Спасибо, результаты сохранены.');
  }
  // Включаем содержимое файла form.php.
  include('form.php');
  // Завершаем работу скрипта.
  exit();
}
// Иначе, если запрос был методом POST, т.е. нужно проверить данные и сохранить их в XML-файл.

// Проверяем ошибки.
$errors = FALSE;

// Ошибка имени
if (empty($_POST['userName'])) {
  print('Заполните имя.<br/>');
  $errors = TRUE;
}
// Ошибка почты
if (empty($_POST['userE_mail'])) {
  print('Заполните e-mail.<br/>');
  $errors = TRUE;
}
// Ошибка сверхспособностей
if (empty($_POST['powers'])) {
  print ('Выберите хотя бы одну сверхспособность.<br>');
    $errors = TRUE;
}
else {
  $powers = serialize($_POST['powers']);
}
// Ошибка биографии
if (empty($_POST['bio'])){
  print ('Введите что-нибудь о себе.<br>');
  $errors = true;
}

if ($errors) {
  // При наличии ошибок завершаем работу скрипта.
  exit();
}

// Сохранение в базу данных.
$user = 'u41035'; // Логин от БД
$pass = '1343433'; // Пароль от БД

// Создаем класс подключения к БД
$db = new PDO('mysql:host=localhost;dbname=u41035', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

// Подготовленный запрос. Не именованные метки.
try {
  $stmt = $db->prepare("INSERT INTO table1 SET userName = ?, userE_mail=?, birthdate=?, s=?, limbs=?, powers=?, bio=?");
  $stmt -> execute(array(
     $_POST['userName'],
     $_POST['userE_mail'],
     $_POST['birthdate'],
     $_POST['s'],
     $_POST['limbs'],
     $powers,
     $_POST['bio'],
  ));
}
catch(PDOException $e){
  print('Ошибка : ' . $e->getMessage());
  exit();
}

//  stmt - это "дескриптор состояния".
 
//  Именованные метки.
//$stmt = $db->prepare("INSERT INTO test (label,color) VALUES (:label,:color)");
//$stmt -> execute(array('label'=>'perfect', 'color'=>'green'));
 
//Еще вариант
/*$stmt = $db->prepare("INSERT INTO users (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);
$firstname = "John";
$lastname = "Smith";
$email = "john@test.com";
$stmt->execute();
*/

// Делаем перенаправление.
// Если запись не сохраняется, но ошибок не видно, то можно закомментировать эту строку чтобы увидеть ошибку.
// Если ошибок при этом не видно, то необходимо настроить параметр display_errors для PHP.
header('Location: ?save=1');
