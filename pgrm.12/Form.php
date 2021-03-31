<html>

<head>
    <title>Registration from</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #66717F;
            width: 100%;
            height: 100vh;
            padding-top: 4em;
        }

        .regform {
            background: #2E3740;
            color: #858f99;
            margin: auto;
            width: 50%;
            border: 1px solid black;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
        }

        .content {
            margin: auto;
            width: 60%;
        }

        h1 {
            color: #6D7781;
            font-family: 'Akaya Telivigala', cursive;
            text-align: center;
        }
        label{
            font-family: 'Akaya Telivigala', cursive;
        }

        .first {
            text-align: right;
            width: 40%;
        }

        .button {
            margin-top:10px;
            text-align: center;
        }

        input {
            padding: 5px 10px 5px 10px;
            height: 2em;
            border-radius: 5px;
            border:1px solid #858f99;
            background: #2E3740;
            color: #858f99;
        }
        textarea{
            background: #2E3740;
            padding: 5px;
            border-radius: 5px;
            border:1px solid #858f99;
            color: #858f99;
        }

        input[type="submit"],input[type="reset"] {
            margin-top: 4em;
            width: 8em;
            height:2.5em;
            text-align: right;
            text-align: center;
            background-color: #1FCE6D;
            cursor:pointer;
            color:#2E3740;
        }
        input[type="text"],input[type="password"],input[type="email"],input[type="number"],textarea,select{
            width:90%;
        }
        .row{
            margin-top: 0.5em;
        }
        form{
            margin-top: 1em;
        }
    </style>
</head>

<body>
    <div class="regform">
        <h1>REGISTRATION FORM</h1>
        <hr width="50%">
	<div id="error" style="color:#e25e5e;" align="center"></div>
        <div class="content">
            <form  method="POST">
                <div class="row">
                    <label for="name">Name:</label><br>
                </div>
                <div class="row">
                    <input type="text" name="name"><br>
                </div>

                <div class="row">
                    <label for="mail">Email ID:</label><br>
                </div>
                <div class="row">
                    <input type="email" name="mail"><br>
                </div>

                <div class="row">
                    <label for="username">Username:</label><br>
                </div>
                <div class="row">
                    <input type="text" name="user"><br>
                </div>

                <div class="row">
                    <label for="password">Password:</label><br>
                </div>
                <div class="row">
                    <input type="password" name="password"><br>
                </div>

                <div class="row"></div>
                <label for="ph">Contact No:</label><br>
                <div class="row"></div>
                <span>+91<input type="tel" name="ph" id="phone" style="width:82%;"></span><br>

                <div class="row" style="display: flex;flex-direction: row-reverse;">
                    <input type="submit" value="submit" name="submit" style="justify-content: end; margin:0 0 0 10px;">
                    <input type="reset" value="clear" style="margin:0 0 0 10px;">
                </div>
            </form>
        </div>
    </div>

<?php
    $con = Mysqli_Connect("localhost","root","");

    if(isset($_POST['submit'])){
        $name = $_POST['name'];  
        $email = $_POST['mail'];  
        $mobile = $_POST['ph'];  
        $user = $_POST['user'];  
        $password = $_POST['password'];

        if($_POST['name'] == ""){
            echo "<script>document.getElementById('error').innerHTML = '*Enter First Name !!'</script>";
        }
        else if(!preg_match("/^[a-zA-Z ]*$/",$name)){
            echo "<script>document.getElementById('error').innerHTML = '*Enter First Name !!'</script>";
        }
        else if($_POST['mail'] == ""){
            echo "<script>document.getElementById('error').innerHTML = '*Enter Email !!'</script>";
        }
        else if(!preg_match('/^[0-9]{10}+$/', $_POST['ph'])){
            echo "<script>document.getElementById('error').innerHTML = '*Enter Valid Mobile Number !!'</script>";
        }
        else if($_POST['user'] == ""){
            echo "<script>document.getElementById('error').innerHTML = '*Enter User Name !!'</script>";
        }
        else if($_POST['password'] == ""){
            echo "<script>document.getElementById('error').innerHTML = '*Enter Password !!'</script>";
        }
        else if (strlen($_POST["password"]) < 8) {
                echo "<script>document.getElementById('error').innerHTML = '*Your Password Must Contain At Least 8 Characters!'</script>";
        }
        else if(!preg_match("#[0-9]+#",$password)) {
                echo "<script>document.getElementById('error').innerHTML = '*Your Password Must Contain At Least 1 Number!'</script>";
         }
        else if(!preg_match("#[A-Z]+#",$password)) {
                echo "<script>document.getElementById('error').innerHTML = '*Your Password Must Contain At Least 1 Capital Letter!'</script>";
        }
        else if(!preg_match("#[a-z]+#",$password)) {
                echo "<script>document.getElementById('error').innerHTML = '*Your Password Must Contain At Least 1 Lowercase Letter!'</script>";
        } else
	{
		echo "<script>alert('registration successfull')</script>";
	}
    }
?>
</body>
</html>