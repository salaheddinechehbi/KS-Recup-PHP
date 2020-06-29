


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>KS Recup</title>
        <link href="pc/vendor/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="pc/vendor/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="pc/vendor/dist/css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="pc/vendor/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" id="emailU" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" id="passU" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <a class="btn btn-lg btn-success btn-block loginU">Login</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
         <!-- jQuery -->
    <script src="pc/vendor/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="pc/vendor/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="pc/vendor/vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="pc/vendor/dist/js/sb-admin-2.js"></script>
    
    <script>
        $(document).on('click', '.loginU', function () {
            var email = $("#emailU").val();
            var pass = $("#passU").val();
            $.ajax({
                url: 'api/login.php',
                type: 'POST',
                cache: false,
                dataType: 'JSON',
                data: {emailU:email,passU:pass},
                success: function (data, textStatus, jqXHR) {
                        //console.log(data);
                        if(data["email"] === email && data["pass"] === pass){
                            window.location.href = "pc/admin/index.php";
                        }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus+" "+ errorThrown+" "+jqXHR);
                }
            });

        });
    </script>
</body>
</html>
