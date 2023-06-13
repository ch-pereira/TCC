<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/contato.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <title>Formulário de Contato</title>

</head>
<body>
    <section>
        <header>
            <div class="center menu-container">
                <div class="logo">
                    <h3>Vet</h3>
                </div>
                <div class="menu">
                    <li><a class="active-menu" href="index.php">Home</a></li>
                <li class="dropdown">
                    <a href="#">Atendimento</a>
                    <ul class="sub-menu">
                        <li><a href="#">Consultas</a></li>
                        <li><a href="#">Exames</a></li>
                    </ul>
                </li>
                <li><a href="contato.php">Contato</a></li>
                <li><a href="">Sobre</a></li>
                <li id="log"><ion-icon name="person-outline"></ion-icon><a href="">Entre ou Cadastre-se</a></li>
            </div>
        </div>
    </header>
    <div class="container">
        <h1>Formulário de Contato</h1>
            <form id="contact-form" method="post" action="">
                <input type="text" id="texto" name="name" placeholder="Nome" required>
                <input type="email" id="texto" name="email" placeholder="E-mail" required>
                <textarea name="mensagem" placeholder="Mensagem"></textarea>
                <input type="submit" value="Enviar" >
            </form>
        </div>
    </section>
</body>
</html>
