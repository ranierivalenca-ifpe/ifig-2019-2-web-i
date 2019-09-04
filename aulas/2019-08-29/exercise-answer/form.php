<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="adicionar.php" method="POST">
        <fieldset>
            <legend>Dados do funcionário</legend>
            <input type="text" name="name" placeholder="Nome">
            <input type="number" name="age" placeholder="Idade">
            <input type="text" name="country" placeholder="País">
            <input type="submit" value="Ok">
        </fieldset>
    </form>
    <div class="actions">
        <a href="table.php">Voltar</a>
    </div>
</body>
</html>