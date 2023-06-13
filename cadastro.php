<?php

require_once('classes/crud.php');
require_once('conexao/conexao.php');

$database = new Database();
$db = $database->getConnection();
$crud = new Crud($db);

if(isset($_GET['action'])){
    switch($_GET['action']){
        case 'create':
            $crud->create($_POST);

            $rows = $crud->read();
            break;
        case 'read':
            $rows = $crud->read();
            break;
        case 'update':
            
            break;
        case 'delete':
            $crud->delete($_GET['id']);
            $rows = $crud->read();
            break;
        default:
            $rows = $crud->read();
            break;
    }
}else{
    $rows = $crud->read();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/cadastro.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <title>Document</title>
    
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
        
        <?php
        if(isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id'])){
            $id = $_GET['id'];
            $result = $crud->readOne($id);

        if($result){
            echo "Registro não encontrado.";
            exit();
        }
        $nome = $result['nome'];
        $sobrenome = $result['sobrenome'];
        $data_de_nasci = $result['data_de_nasci'];
        $telefone = $result['telefone'];
        $email = $result['email'];
        $senha = $result['senha'];
        $confirma_senha = $result['confirma_senha'];
        ?>

        <div class="container">
            <h1>Cadastro</h1>
            <div class="text">
                <form id="contact-form" method="POST" action="?action=create">
                    <input type="hidden" name="id" value="<?php echo $id ?>">

                    <label for="nome">Nome:</label>
                    <input type="text" placeholder="Nome" name="nome" id="nome">

                    <label for="sobrenome">Sobrenome:</label>
                    <input type="text" placeholder="Sobrenome" name="sobrenome" id="spbrenome">

                    <label for="data_de_nasci">Data de Nascimento:</label>
                    <input type="date" placeholder="Data de nascimento" name="data_de_nasci" id="data_de_nasci">

                    <label for="telefone">Telefone:</label>
                    <input type="tel" placeholder="Telefone" name="telefone" id="telefone">

                    <label for="email">Email:</label>
                    <input type="email" placeholder="E-mail" name="email" id="email">

                    <label for="senha">Senha:</label>
                    <input type="password" placeholder="Senha" name="senha" id="senha">

                    <label for="confirma_senha">Confirma senha:</label>
                    <input type="password" placeholder="Confirma senha" name="confirma_senha" id="confirma_senha">

                    <button type="submit" value="Enviar"><a class="enviar">Enviar</a></button>
                    <label><a href="Login.php">Conectar-se</a></label>
                </form>
            </div>
        </div>

        <?php
        }else{
        ?>

        <div class="container">
            <h1>Cadastro</h1>
            <div class="text">
                <form id="contact-form" method="POST" action="?action=update">
                    <input type="hidden" name="id" value="<?php echo $id ?>">

                    <label for="nome">Nome:</label>
                    <input type="text" placeholder="Nome" name="nome" id="nome">

                    <label for="sobrenome">Sobrenome:</label>
                    <input type="text" placeholder="Sobrenome" name="sobrenome" id="spbrenome">

                    <label for="data_de_nasci">Data de Nascimento:</label>
                    <input type="date" placeholder="Data de nascimento" name="data_de_nasci" id="data_de_nasci">

                    <label for="telefone">Telefone:</label>
                    <input type="tel" placeholder="Telefone" name="telefone" id="telefone">

                    <label for="email">Email:</label>
                    <input type="email" placeholder="E-mail" name="email" id="email">

                    <label for="senha">Senha:</label>
                    <input type="password" placeholder="Senha" name="senha" id="senha">

                    <label for="confirma_senha">Confirma senha:</label>
                    <input type="password" placeholder="Confirma senha" name="confirma_senha" id="confirma_senha">

                    <button type="submit" value="Enviar"><a class="enviar">Enviar</a></button>
                    <label><a href="Login.php">Conectar-se</a></label>
                </form>
            </div>
        </div>

        <?php
        }
        ?>
        
        <table id="tabela-resultado">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Data de Nascimento</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Confirma Senha</th>
            <th>Ações</th>
        </tr>
       <?php
        if(isset($rows)){
            foreach($rows as $row){
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['nome']."</td>";
                echo "<td>".$row['sobrenome']. "</td>";
                echo "<td>".$row['data_de_nasci']."</td>";
                echo "<td>".$row['telefone']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['senha']."</td>";
                echo "<td>".$row['confirma_senha']."</td>";
                echo "</td>";
                echo "<td>";
                echo "<a href='?action=update&id=".$row['id']."'>Editar</a>";
                echo "<a href='?action=delete&id=".$row['id']."' onclick='return confirm(\"Tem certeza que deseja deletar esse registro?\")' class='delete'>Excluir</a>";
                echo "</td>";
                echo "</tr>";
            }
        }else{
            echo "Não há registros no banco de dados!!!";
        }

        ?>
       
        </table> 
    </section>
</body>
</html>