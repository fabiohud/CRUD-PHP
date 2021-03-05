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
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Teste PHP</title>


        <script type="text/javascript">
        function salvar(){
            var titulo = document.getElementById('titulo').value;
            var autores = document.getElementById('autores').value;
            var editora = document.getElementById('editora').value;
            var edicao = document.getElementById('edicao').value;
            var data = document.getElementById('data').value;
            if( titulo == ''  || autores == '' || editora == '' || editora == '' )
                alert( "Os campos são de preenchimento obrigatório!" );
            else
                document.form_cadastro.submit();
        }

        

        function pesquisar(){
            var palavra = document.getElementById('palavra').value;
            location.href = 'teste03.php?acao=pesquisar&palavra=' + palavra;
        }
    </script>
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
        </Style>
        <div>
       
<nav>
<div>
            <h2 style="text-align:center; width:65%; font-family: arial, sans-serif">Adicionar livros</h2>

            <form name="form_cadastro" method="post" action="index.php">

                <input type="hidden" name='acao' value="cad">
            
                <div>    
                    <h3>
                    <label>Título: </label>
                    <input id="titulo" type="text" style="width: 200px" name="titulo">
                    </h3>
            
                    <h3>
                    <label>Autor: </label>
                    <input id="autores" type="text" style="width: 200px" name="autores">
                    </h3>
                </div>
   
                <div>
                    <h3>
                    <label>Editora: </label>
                    <input id="editora" type="text" style="width: 200px" name="editora">
                    </h3>
                
                    <h3>
                    <label>Edição: </label>
                    <input id="edicao" type="text" style="width: 200px" name="edicao">
                    </h3>
                </div>       

                <div style="width:90%">
                    <h3><label>Data: </label>
                    <input id="data" type="text" style="width: 200px" name="data"></h3>
                </div>

                <input style="margin-left: 20%; background:gray; color: white;" type="button" onclick="salvar()" value="Salvar">
                
            </form>
            </div>
            </nav>  
        </div>
    </body>
</html>