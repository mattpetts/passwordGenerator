<!DOCTYPE html>
<html>

    <head>
        <title>Generate a secure password for free | getapassword.co.uk</title>

        <!--CSS Includes-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!--Javascrip Includes-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>

    <body>
    <?php include($_SERVER["DOCUMENT_ROOT"] . '/assets/php/classes/generator.php') ?>
        <div class="container">
            <div class="jumbotron">
                <h1>Generate a secure password for free</h1>
                <form id="pref-form">
                    <input type="number" name="length" value="6"/>
                    <label>Include capital letters</label><input type="checkbox" id="capitals" name="capitals" value="yes"/>
                    <label>Include numbers</label><input type="checkbox" id="numbers" name="numbers" value="yes"/>
                    <label>Include symbols</label><input type="checkbox" id="symbols" name="symbols" value="yes"/>
                    <input class="btn btn-primary" type="submit" value="Get a password">
                </form> 
                <h3 id="output"></h3>
            </div>
        </div>
        <script>
            $('#pref-form').submit(function(event){
                event.preventDefault();

              
                $.ajax({
                    type: "POST",
                    url: "/assets/php/classes/generator.php",
                    data: $('#pref-form').serialize(),
                    success: function(resultData){
                       $('#output').html(resultData);
                    }
                });
            });
        </script>]
    </body>

</html>