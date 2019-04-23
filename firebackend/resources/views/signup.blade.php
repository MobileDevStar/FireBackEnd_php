<html>

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="description" content="Login - Register Template">
    <meta name="author" content="Lorenzo Angelino aka MrLolok">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #303641;
        }
    </style>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-1.12.4.min.js') }}" defer></script>

</head>

<body>
    <div id="container-register">
        <div id="title">
            <i class="material-icons lock">lock</i> Register
        </div>

        <form action="#">
            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">email</i>
                </div>
                <input id="email" placeholder="Email" type="email" required class="validate" autocomplete="off">
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="username" placeholder="Username" type="text" required class="validate" autocomplete="off">
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">vpn_key</i>
                </div>
                <input id="password" placeholder="Password" type="password" required class="validate" autocomplete="off">
            </div>

            <div class="remember-me">
                <input type="checkbox">
                <span style="color: #DDD">I accept Terms of Service</span>
            </div>

            <input type="submit" value="Register" onclick="onRegister()"/>
        </form>

        <div class="privacy">
            <a href="#">Privacy Policy</a>
        </div>

        <div class="register">
            Do you already have an account?
            <a href="#"><button id="register-link">Log In here</button></a>
        </div>
    </div>
    <script>
        function onRegister() {
            var email = $("#email").val();
            var username = $("#username").val();
            var password = $("#password").val();

            // var data = {
            //     email: email,
            //     username: username,
            //     password: password
            // }
            var data = "email=" + email + "&username=" + username + "&password=" + password;
            
            $.get(
                'http://localhost:8000/api/register',
                data,
                function (data, status, xhr) {
                    console.log(data);
                    console.log(status);
                    alert(data);
                }
            );
        }
    </script>
</body>

</html>
