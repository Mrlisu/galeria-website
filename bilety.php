<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/Galeria/photo/MSK.png">
    <title>Bilety - Muzeum Śląskie</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: url(/Galeria/photo/glusza-11.jpg) no-repeat;
            background-size: cover;
            background-position: center;
        }

        header {
            background-color: #f0f0f0;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav li {
            display: inline-block;
            margin-right: 20px;
        }

        nav a {
            color: #333;
            text-decoration: none;
        }

        footer {
            background-color: #f0f0f0;
            padding: 10px;
            text-align: center;
            clear: both;
        }

        footer p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .wrapper {
            position: relative;
            margin-left: 500px;
            margin-right: 500px;
            background: transparent;
            box-shadow: 0 0 20px #00b3b3;
            border-radius: 20px;
            padding: 60px;
            margin-bottom: 20px;
            border: 2px solid #00334d;
            backdrop-filter: blur(10px);
        }

        .form-wrapper{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        h2 {
            font-size: 30px;
            color: #00334d;
            text-align: center;
        }

        .input-group {
            position: relative;
            margin: 30px 0;
            border-bottom: 2px solid #006699;
        }

        .input-group label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            font-size: 16px;
            color: #006699;
            pointer-events: none;
            transition: .5s;
        }

        .input-group input {
            width: 320px;
            height: 40px;
            font-size: 16px;
            color: black;
            padding: 0 5px;
            background: transparent;
            border: none;
            outline: none;
        }

        .input-group input:focus~label,
        .input-group input:valid~label{
            top: -5px;
        }

        .remember {
            margin: -5px 0 15px 5px;
        }

        .remember label {
            color: #000;
            font-size: 14px;
        }

        .remember label input {
            accent-color: #006699;
        }

        button {
            position: relative;
            width: 100%;
            height: 40px;
            background: #006699;
            font-size: 16px;
            color: #000;
            font-weight: 500;
            cursor: pointer;
            border-radius: 30px;
            border: none;
            outline: none;
        }

    </style>
    
</head>
<body>

    <header>
        <nav>
            <ul>
                <li><a href="glusza.html">GŁUSZA</a></li>
                <li><a href="galeria.html">GALERIA</a></li>
                <li><a href="projekty.html">PROJEKTY</a></li>
                <li><a href="bilety-muzeumSlaskie.html">BILETY</a></li>
                <li><a href="publikacja.html">PUBLIKACJA</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="wrapper">
        <div class="form-wrapper">
            <form action="bilety.php" method="post">
                
                <h2>Logowanie</h2>

                <div class="input-group">
                    <input type="text" name="imie_nazwisko" required>
                    <label>Imię i nazwisko</label>
                </div>

                <div class="input-group">
                    <input type="text" name="email" required>
                    <label>Adres e-mail</label>
                </div>

                <div class="input-group">
                    <input type="number" name="tel" required>
                    <label>Nr telefonu</label>
                </div>

                <div class="remember">
                    <label><input type="checkbox" required>Akecptuj regularnie powiadomienia.</label>
                </div>

                <button type="submit">Wyślij</button>

            </form> <br>
        </div>
    </div>

    <?php
        $polaczenie=mysqli_connect('localhost', 'root', '', 'glusza');
        if ($polaczenie === false) {
            die("Wystąpił problem z połaczeniem" .mysqli_connect_error());
        }
        if ($_POST) {
            $imie_nazwisko=$_POST['imie_nazwisko'];
            $email=$_POST['email'];
            $tel=$_POST['tel'];
        }
            $sql="INSERT INTO `plan_wydarzen`(`Imie_nazwisko`, `Email`, `Tel`) VALUES ('$imie_nazwisko','$email','$tel')";
            if (mysqli_query($polaczenie, $sql)){
                echo "";
            }
            else {
                echo "Nieprawidłowo zapisane" .mysqli_error($polaczenie);
            }
        mysqli_close($polaczenie);
    ?>

    <footer>
            <p>&copy; 2024 Muzeum Śląskie</p>
    </footer>

</body>
</html>