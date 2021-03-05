<?php

$conexao = mysqli_connect("localhost", "root", "");

$banco = mysqli_select_db($conexao, "livraria");

$acao = $_REQUEST["acao"] ?? 'vazio';
if($acao == "cad"){
    
    $titulo = $_REQUEST['titulo'];
    $autores = $_REQUEST['autores'];
    $editora = $_REQUEST['editora'];
    $edicao = $_REQUEST['edicao'];
    $data = $_REQUEST['data'];
    
    $query = "INSERT INTO `livro` (`id`, `titulo`, `autores`, `editora`, `edicao`, `data`) VALUES(null, '$titulo', '$autores', '$editora', '$edicao', '$data')";
    $res = mysqli_query($conexao, $query);

}
$opcao = "cad";

if($acao == "del"){
    $id = $_REQUEST['id'];

    $query = "DELETE FROM livro WHERE id='$id'";
    $res = mysqli_query($conexao, $query);
}

if($acao == "editar"){
    $id = $_REQUEST['id'];
    $titulo = $_REQUEST['titulo'];
    $autores = $_REQUEST['autores'];
    $editora = $_REQUEST['editora'];
    $edicao = $_REQUEST['edicao'];
    $data = $_REQUEST['data'];

    $query = "UPDATE `livro` SET `titulo` = '$titulo', `autores` = '$autores', `editora` = '$editora', `edicao` = '$edicao', `data` = '$data' WHERE `livro`.`id` = 'id'";
    $res = mysqli_query($conexao, $query);

    
}

if($acao == "edit"){
    $id = $_REQUEST['id'];

    $query = "SELECT * FROM livro WHERE id='$id'";
    $res = mysqli_query($conexao, $query);
    if (mysqli_num_rows($res) != 0){
        $aux = mysqli_fetch_assoc($res);
        $titulo = $aux ['titulo'];
        $autores = $aux ['autores'];
        $editora = $aux ['editora'];
        $edicao = $aux ['edicao'];
        $data = $aux ['data'];
    }
    $opcao = "editar";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Teste PHP</title>
    </head>
    <body>

    
        <Style>
            a{
                text-decoration: none;
                color: Red;
                font-weight: bold;
            }
            h2{
                margin-left:15%;
            }
            nav{
                margin:auto;
                text-align:center;    
                width: 90%;
            }
            div{
                margin-top: 15px;
                text-align: left;
                

            }
            table{
                margin:5%;
                margin-bottom:0px;
                margin-top:0px;
               

                color: black;
            }
            tr{/*
                color: black;
                box-shadow: 0px 0px 0px 0px black;
                */
                box-shadow: 0px 0px 7px 5px lightgray;
                border-radius: 5px;
            }
            td{
                color: black;
                font-family: arial, sans-serif;

            }
            form{
                font-family:arial;
                margin:auto;
                width:80%;
                box-shadow:0px 0px 7px 5px lightgray;
                border-radius: 5px;
            }
            form div{
                text-align:center;
                width: 45%;
                display:inline-table;
                margin:auto;
            }
            input{
                height:30px;
                width:50%;   
                border-radius: 6px;         
                }
                a.adc{
                    font-size: 20px;
                    font-family: Arial, sans-serif;
                    width:100%;
                    text-align:right;
                    margin-left:80%;
                    box-shadow: 0px 0px 4px 5px lightgray;
                }
        </Style>
    
        <div>
                <!---

            <h1 style="text-align:center; font-family:arial;">Livros</h1>
            <a class="adc" href="adc-livro.php">Adicionar Livro</a>

            <table borde="1" cellpadding="5" cellspacing="25">
                <tr>
                    <td width="50px" align="center"><strong>Código<strong></td>
                    <td width="350px" align="left"><strong>Título<strong></td>
                    <td width="300px" align="left"><strong>Autor<strong></td>
                    <td width="250px" align="left"><strong>Editora<strong></td>
                    <td width="150px" align="left"><strong>Edição<strong></td>
                    <td width="55px" align="left"><strong>Ano de publicação<strong></td>
                    <td width="55px" align="left"><strong>Ações<strong></td>
                </tr>
                        -->

                <?php
                    $query ="SELECT * FROM livro order by id";
                    $res = mysqli_query( $conexao, $query);
                    $total = mysqli_num_rows($res);
                    /*

                    while( $aux = mysqli_fetch_assoc($res)){
                        echo '<tr>';
                        echo '<td align="center">'.$aux ['id'].'</td>' ;
                        echo '<td align="left">'.$aux ['titulo'].'</td>' ;
                        echo '<td align="left">'.$aux ['autores'].'</td>' ;
                        echo '<td align="left">'.$aux ['editora'].'</td>' ;
                        echo '<td align="left">'.$aux ['edicao'].'</td>' ;
                        echo '<td align="center">'.$aux ['data'].'</td>' ;
                        echo '<td align="center">';
                        echo '<a href="index.php?acao=del&id='.$aux ['id'].'" >Remover</a>';
                        echo '<a href="edit.php?acao=edit&id='.$aux ['id'].'" >Editar</a>';
                        echo '</td>' ;
                        echo '</tr>';
                    }
                    */
                ?>
            </table>
            <nav>
                <div>
                        <h2 style="text-align:center; width:65%; font-family: arial, sans-serif">Editar livro</h2>

                        <form name="form_cadastro" method="post" action="index.php">

                        <input type="hidden" name='acao' value="<?=$opcao?>">
                        <input type="hidden" name='id' value="<?=$id?>">

                        <div>    
                        <h3>
                        <label>Título: </label>
                        <input type="text" style="width: 200px" name="titulo" value="<?=$titulo?>">
                        </h3>

                        <h3>
                        <label>Autor: </label>
                        <input type="text" style="width: 200px" name="autores" value="<?=$autores?>">
                        </h3>
                        </div>

                        <div>
                        <h3>
                        <label>Editora: </label>
                        <input type="text" style="width: 200px" name="editora" value="<?=$editora?>">
                        </h3>

                        <h3>
                        <label>Edição: </label>
                        <input type="text" style="width: 200px" name="edicao" value="<?=$edicao?>">
                        </h3>
                        </div>       

                        <div style="width:90%">
                        <h3><label>Data: </label>
                        <input type="text" style="width: 200px" name="data" value="<?=$data?>">
                        </h3>
                        </div>

                        <input style="margin-left: 20%; background:gray; color: white;" type="submit" value="Salvar">

                        </form>
                        </div>
                        </nav>
                        
                        </div>
                        </body>
</html>