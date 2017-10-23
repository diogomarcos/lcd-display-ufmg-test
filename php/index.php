<?php
/**
 * index
 *
 * @author  Diogo Marcos <contato@diogomarcos.com>
 * @version 1.0
 */

namespace php;

include_once __DIR__ . "/LcdDisplay.php";


$display = new LcdDisplay();
?>
<!DOCTYPE html>
<html>
<head>
    <title>LCD Display - UFMG Test</title>
    <style>
        .fancy {
            width: 800px;
            margin: 20px auto;
            padding: 0px 30px 30px 30px;
            border: solid #6AC5AC 5px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            border-radius: 5px;
        }
    </style>

</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        jQuery(function($) {
            $(document).on('keypress', 'input.just-number', function(e) {
                var key = (window.event)?event.keyCode:e.which;
                if((key > 47 && key < 58)) {
                    return true;

                } else {
                    return (key == 8 || key == 0)?true:false;

                }
            });

            $('input[type=submit]').click(function() {
                if($('#size').val()==='0' && $('#number').val()==='0') {
                    $(this).attr('disabled', 'disabled');
                    $(this).parents('form').submit();
                    $("#pre").remove();
                    $(".fancy pre").append('<p style="text-align: center">Execução terminada. <br/>Clique no botão Recomeçar para iniciar novamente!</p>');
                }
            })
        });
    </script>
    <div class="fancy">
        <h2>Entrada:</h2>
        <form method="post" action="" id="form">
            <input type="text" id="size" name="size" class="just-number" placeholder="Tamanho"/>
            <input type="text" id="number" name="number" class="just-number" placeholder="Número"/>
            <input type="submit" name="submit" value="Executar"/>
            <input type="button" onclick="location.href='/';" value="Recomeçar" />

        </form>
    </div>
    <div class="fancy">
        <h2>Saída:</h2>
        <?php
        if(isset($_POST['submit'])) {
            $size = $_POST['size'];
            $number = $_POST['number'];
        ?>
            <pre>
                <pre id="pre"><?php (($size!=='0' && $number!=='0') || ($size!=='' && $number!=='')) ? $display->runProgram($size, $number) :  printf(''); ?></pre>
            </pre>
        <?php
        } else {
        ?>
            <pre></pre>
        <?php
        }
        ?>
    </div>
</body>
</html>