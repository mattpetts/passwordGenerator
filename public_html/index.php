<!DOCTYPE html>
<html>

    <head>
        <title>Generate a secure password for free | getapassword.co.uk</title>

        <!--CSS Includes-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="/assets/css/style.min.css" />
        <!--Javascrip Includes-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>

    <body>
    <?php include($_SERVER["DOCUMENT_ROOT"] . '/assets/php/classes/generator.php') ?>
        <div class="container">
            <div class="jumbotron">
                <h1>Generate a secure password</h1>
                <form id="pref-form">
                    <div class="form-element elem-first">
                        <label>Length</label><input type="number" min="6" name="length" value="8"/>
                    </div>
                    <div class="form-element elem-check">
                        <label>Include capital letters</label><input type="checkbox" id="capitals" name="capitals" value="yes"/>
                    </div>
                    <div class="form-element elem-check">
                        <label>Include numbers</label><input type="checkbox" id="numbers" name="numbers" value="yes"/>
                    </div>
                    <div class="form-element elem-check">
                        <label>Include symbols</label><input type="checkbox" id="symbols" name="symbols" value="yes"/>
                    </div>
                    <div class="form-element">
                        <input type="submit" value="Get a password">
                    </div>
                </form> 
                <div class="output-wrapper">
                    <input type="text" value="" placeholder="Your New Password" id="output"/>
                    <button onClick="copy()" id="copy">Copy</button>
                </div>
            </div>
            <div class="leaderboard">
                <img src="/assets/images/leaderboard.jpg" />
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
                       $('#output').val(resultData);
                       $('#copy').css('display', 'block');
                    }
                });
            });

            function copy() {
                /* Get the text field */
                var copyText = document.getElementById('output');

                /* Select the text field */
                copyText.select();

                /* Copy the text inside the text field */
                document.execCommand("copy");

                /* Alert the copied text */
                alert("Copied the password " + copyText.value);
            }
        </script>
    </body>

</html>