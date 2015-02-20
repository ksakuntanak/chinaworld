<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>

        <!-- Bootstrap -->
        <link href="<?php echo Uri::base(); ?>public/assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- custom css -->
        <link href="<?php echo Uri::base(); ?>public/assets/css/app.css?ts=<?php echo date('YmdHis'); ?>" rel="stylesheet">

    </head>
    <body class="<?php echo (Uri::segment(2)&&Uri::segment(2)!="index")?"app":"index"; ?>">
        <div class="container-fluid">
            <?php echo $content; ?>
        </div>
        <div id="fb-root"></div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo Uri::base(); ?>public/assets/js/bootstrap.min.js"></script>
        <!-- facebook -->
        <script src="//connect.facebook.net/en_US/sdk.js"></script>
        <script>

            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '439397266212203',
                    xfbml      : true,
                    version    : 'v2.2'
                });
            };

            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

        </script>
        <!-- app -->
        <script type="text/javascript">
            var url_base = "<?php echo Uri::base(); ?>";
        </script>
        <script src="<?php echo Uri::base(); ?>public/assets/js/app.js?ts=<?php echo date('YmdHis'); ?>"></script>
    </body>
</html>