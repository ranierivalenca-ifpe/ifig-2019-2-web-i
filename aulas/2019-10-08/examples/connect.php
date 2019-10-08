

<?php

$dsn = 'mysql:dbname=web_2019_10_8;host=localhost;port=3306'; // data source name
$user = 'ranieri'; // usuário do MySQL
$password = 'ranieri'; // senha do usuário do MySQL

$conn = new PDO($dsn, $user, $password); // conexão com o banco de dados

// $login = 'khevinnn';
// $pass = 'ahn';
// $email = 'seila';

// $conn->exec("
//     INSERT INTO users (login, pass, email)
//     VALUES (\"$login\", '$pass', '$email')
// ");

// for ($i = 0; $i < 10; $i++) {
//     $conn->exec("
//         INSERT INTO users (login, pass, email)
//         VALUES (\"$login\", '$pass', '$email')
//     ");
// }

// $id = 1;
// $conn->exec("
//     DELETE FROM users WHERE id != $id
// ");

$l = 'ranieri';
$p = 'wakandaa';

$stmt = $conn->query("
    SELECT * FROM users where login = '$l' and pass = '$p'
");

print_r(sizeof($stmt->fetchAll()));


?>