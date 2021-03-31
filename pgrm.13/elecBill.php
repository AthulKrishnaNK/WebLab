<html>

<head>
    <title>form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        .container {
            display: block;
            margin-top: 10em;
            margin: auto;
            width: 50%;
            border: 1px solid black;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
            padding: 1em;
        }

        .content {
            margin: auto;
            width: 80%;
        }

        table {
            margin: auto;
            width: 100%;
        }

        h1 {
            color: #6D7781;
            font-family: 'Akaya Telivigala', cursive;
            text-align: center;
        }

        input {
            padding: 5px 10px 5px 10px;
            height: 2em;
            border-radius: 5px;
            border: 1px solid #858f99;
        }

        input[type="submit"] {
            margin-top: 4em;
            width: 9em;
            height: 2.5em;
            text-align: center;
            background-color: #1FCE6D;
            cursor: pointer;
            color: #2E3740;
        }

        label {
            font-family: 'Akaya Telivigala', cursive;
            width: 40%;
            text-align: right;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="number"],
        textarea,
        select {
            width: 60%;
        }

        .row {
            margin-top: 0.5em;
        }

        form {
            margin-top: 1em;
        }

        .bill {
            position: relative;
            margin-top: 5em;
            margin: auto;
            width: 50%;
            border: 1px solid black;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
            padding: 1em;
        }
    </style>
</head>

<center>

    <body>
        <div class="container">
            <h1>ELECTRICITY BILL</h1>
            <div id="error" style="color:#e25e5e;" align="center"></div>
            <div class="content">
                <form method="POST">
                    <table>
                        <tr>
                            <td> Name</td>
                            <td> <input type="text" id="name" name="name"></td>
                        </tr>
                        <tr>
                            <td> Consumer Number</td>
                            <td>
                                <input type="number" name="consumer">
                            </td>
                        </tr>
                        <tr>
                            <td> Unit used</td>
                            <td>
                                <input type="number" name="unit">
                            </td>
                        </tr>
                    </table>
            </div>
            <div class="row">
                <input type="submit" value="Check bill" name="bill" style=" margin:1em 0 0 10px;">
            </div>
            </form>
        </div>
        </div>
        <div class="bill" id="bill" style="display:none;">
            <h1>BILL</h1>
            <p id="data"></p>
        </div>
        <?php
        $a = "<h3 style='color:red'>";
        $b = "<h3 style='color:green'>";
        $c = "</h3>";
        if (isset($_POST["bill"])) {
            $name = $_POST["name"];
            if ($name == null) {
                echo "$a Name can not be Empty $c";
                exit;
            } else {
                if (!preg_match("^[a-zA-Z]^", $name)) {
                    echo "$a Only characters and white space allowed in names $b";
                    exit;
                }
            }

            $consumer = $_POST["consumer"];
            if ($consumer == null) {
                echo "$a Consumer number cannot be empty $c";
                exit;
            } else {
                if (mb_strlen($consumer) != 10) {
                    echo "$a consumer number must contain 10 digit only $b";
                    exit;
                }
            }

            $unit = $_POST["unit"];
            if ($unit == null) {
                echo "$a Enter unit used $c";
                exit;
            } else {
                if ($unit <= 100) {
                    $amount = 3 * $unit;
                } elseif ($unit <= 200) {
                    $amount = 4 * $unit;
                } elseif ($unit <= 300) {
                    $amount = 5 * $unit;
                } else {
                    $amount = 6 * $unit;
                }
            }

            $m = $a . 'Payment server offline....' . $c;
            $t = "<div class='bill' id='bill' style='margin-top:2em;'>
<h1>BILL</h1>
";
            echo "$t <table align='center' cellspacing='3em' style='margin:auto;width:40%'> <tr><td>Name</td><td>Unit</td></tr>";
            echo "<tr><td>$name</td><td>$unit</td></tr>";
            echo "<tr><td colspan='2' align='center' style='color:red;'>Total\t:$amount</td></tr></table>";
        }

        ?>
    </body>

</html>