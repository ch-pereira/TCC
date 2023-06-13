<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <title>Document</title>
</head>
<body>
    <section class="main">
        <header>
           <div class="center menu-container">
                <div class="logo">
                    <img src="imagem/logo2.png">
                </div>
                 
                <div class="menu">
                    <li><a class="active-menu" href="index.php"><ion-icon name="home-outline"></ion-icon> Home</a></li>
                <li class="dropdown">
                    <a href="#">Atendimento</a>
                    <ul class="sub-menu">
                        <li><a href="#">Consultas</a></li>
                        <li><a href="#">Exames</a></li>
                    </ul>
                </li>

                <li><a href="contato.php"><ion-icon name="call-outline"></ion-icon> Contato</a></li>

                <li><a href="">Sobre</a></li>

                <li id="log"><a href="cadastro.php"><ion-icon name="person-outline"></ion-icon> Entre ou Cadastre-se</a></li>

                
            </div>
        </div>
    </header>

    <footer>
        <div class="container">
            <div class="menu">
                <li><a class="active-menu" href="index.php">Home</a></li>
            <li class="dropdown">
                <a href="#">Atendimento</a>
                <ul class="sub-menu">
                    <li><a href="consultas.php">Consultas</a></li>
                    <li><a href="exames.php">Exames</a></li>
                </ul>
            </li>

            <li><a href="contato.php">Contato</a></li>

            <li><a href="">Sobre</a></li>

            <li id="log"><a href="">Entre ou Cadastre-se</a></li>

        </div>
    </footer>
    
</section>
</body>
</html>
