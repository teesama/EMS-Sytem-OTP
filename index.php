<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>system EMS</title>

<?php
    include('./components/head.php');

?>

        
        <script>
            // List Function
                const check_swape = (e,v,c,d) => {
                    $(v).removeClass("active");
                    $(e).addClass("active");
                    $("#content").load(c);
                    $("#subdiv_heade").html(d);
                }

                const readCookie = (name) => {
                    var i, c, ca, nameEQ = name + "=";
                    ca = document.cookie.split(';');
                    for(i=0;i < ca.length;i++) {
                        c = ca[i];
                        while (c.charAt(0)==' ') {
                            c = c.substring(1,c.length);
                        }
                        if (c.indexOf(nameEQ) == 0) {
                            window.location.replace("panel.php");
                            return c.substring(nameEQ.length,c.length);
                        }
                    }
                    return '';
                }

                const writeCookie = (name,value,days) => {
                    var date, expires;
                    if (days) {
                        date = new Date();
                        date.setTime(date.getTime()+(days*24*60*60*1000));
                        expires = "; expires=" + date.toGMTString();
                    }else{
                        expires = "";
                    }
                    document.cookie = name + "=" + value + expires + "; path=/";
                }

            // Ready Load page
                $(document).ready(function() {
                    
                    // default
                        // Read session
                        var sId = readCookie('sessionId');
                        check_swape("#btn_login","#btn_register","components/login.php","login");
                    
                    $("#btn_login").click(function() {
                        check_swape("#btn_login","#btn_register","components/login.php","login");
                    })
                    $("#btn_register").click(function() {
                        check_swape("#btn_register","#btn_login","components/register.php","register");
                    })

                    $("#btn_tricket").click(function() {
                        let tricket_id = $("#tricket_id").val();
                        $.post("./components/showtricket.php", {
                            tricket_id:tricket_id
                        },function(result){
                            $("#tricket__Show").html(result);
                        });
                    })

                    
                });
        </script>
</head>
<body>
    <div class="container-fluid">

        <!-- Section Login & Register -->
        <section class="SectionLogin">
            <div class="row">
                <div class="d-flex align-items-center min-vh-100 bg-left col-lg-8 col-md-6  text-center bg-warning">
                    <div class="fxt-into text-white">
                        <h2>Welcome to</h2>
                        <h1>EMS system</h1>
                        <h3>Check Order by Tricket ID #XXXX</h3>
                        <div class="box-wrap">
                            <div class="m-3">
                                <input id="tricket_id" type="text" class="col-5 form-control" placeholder="press tricket by id" name="" id="">
                            </div>
                            <div class="m-3">
                                <button id="btn_tricket" type="submit" class="btn btn-danger">enter</button>
                            </div>
                            
                        </div>
                        <div id="tricket__Show" class="bg-warning">

                        </div>
                    </div>
                    
                </div>
                
                <div class="bg-right col-lg-4 col-md-6">
                <div class="m-3 fxt-header d-block">
                        <h1 class="text-center text-uppercase" id="subdiv_heade"></h1>
                    </div>
                    <div class="fxt-page-switcher position-absolute">
                        <a href="#" id="btn_login" class="switcher-text">Login</a>
                        <a href="#" id="btn_register" class="switcher-text ">Register</a>
                    </div>
                    <div class="contetn" id="content">

                    </div>
                </div>
            </div>
        </section>

        <!-- Section Check Tricket-->
        
    </div>
    
</body>
</html>