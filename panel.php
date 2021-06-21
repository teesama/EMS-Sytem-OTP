<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel for member</title>
    <?php
        include('./components/head.php');
    ?>
    <script>
        $(document).ready(function() {


            // Default
                // $("#content-tricket").load("./components/showtricket.php");

            const getCookie = (cname) => {
                var name = cname + "=";
                var ca = document.cookie.split(';');
                for(var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                    }
                }
                return "";
            }

            const checkCookie = (name) => {
                var user = getCookie(name);
                if (user != "") {
                    $.post("./models/findUser.php",{
                        id:user
                    },
                        (data,status) => {
                            if (data != "ไม่มีข้อมูล") {
                                // alert("ยินดีต้อนรับกลับคุณ " + data);
                            }
                        })
                    
                } else {
                    window.location.replace("index.php");

                    // For Guest

                    // user = prompt("please enter your name Guest:", "");
                    // if (user != "" && user != null) {
                    //     setCookie("username", user, 365);
                    // }
                }
            }

            // if click button add order
                $("#addOrder").click(() => {
                    var toname = $("#toname").val();
                    var local_in = $("#local_in").val();
                    var local_out = $("#local_out").val();
                    var product_name = $("#product_name").val();
                    var product_amout = $("#product_amout").val();
                    var user = getCookie("sessionId");

                    if (toname != "" && local_in != "" && local_out != "" && product_name != "" && product_amout != "" && user != "") {
                        $.post("./models/addOrder.php", {
                            mem_id:user,
                            toname:toname,
                            local_in:local_in,
                            local_out:local_out,
                            product_name:product_name,
                            product_amout:product_amout,
                        },((data,status) => {
                            
                            if (data === "success") {
                                alert("success");
                                $("#formOrder input[type='text']").val("");
                            } else {
                                alert(data);
                            }
                        })
                        
                        )
                    } else {
                        $("#formOrder input[type='text']").val("");
                        alert("กรุณากรอกข้อมูลให้ครบ");
                    }
                    
                })

            $("#search_tricket").click(function() {
                var tricket_id = $("#tricket_id").val();
                if (tricket_id != "" ) {
                    $.post("./components/showtricket.php", {
                        tricket_id:tricket_id
                    },function(result){
                        $("#content-tricket").html(result);
                    });
                    // $.post("./components/showtricket.php", {
                    //     tricket_id:tricket_id,
                    // },
                    //     function(data) {
                    //         425a195i75
                    //         $('#prod_name').html(data);
                    // });
                    
                } else {
                    alert("กรุณากรอกข้อมูล ");
                }
            })
            checkCookie('sessionId');

        })
    </script>
</head>
<body>

    <div class="container">
        
        <section class="getshowtricket">
            <div class="row">
                <div class="col-md-12">
                <!-- <form action="" method="post"> -->
                    <div class="row justify-content-center">
                        
                            <div class="col-md-4">
                                <div class="m-3">
                                    <input id="tricket_id" type="text" class="form-control" name="tricket_id" placeholder="Enter Your Tricket ID" id="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="m-3">
                                    <button id="search_tricket" class="btn btn-danger col-md-12" type="submit">Search Now</button>
                                </div>
                            </div> 
                                      
                    </div>
                    <!-- </form>   -->
                </div>
                <div class="col-md-12">
                    <div class="content-tricket" id="content-tricket">
                        
                </div>
                <div class="col-md-12">
                    <form class="was-validated" id="formOrder">
                        <div class="mb-3 row justify-content-center">
                            <label for="" class="col-sm-2 col-form-label">ผู้รับ: </label>
                            <div class="col-sm-5">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="toname" 
                                    placeholder="กรอกชื่อ" 
                                    required
                                />
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-center">
                            <label for="" class="col-sm-2 col-form-label">สถานที่ส่ง: </label>
                            <div class="col-sm-5">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="local_in" 
                                    placeholder="สถานที่ส่ง" 
                                    required
                                />
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-center">
                            <label for="" class="col-sm-2 col-form-label">สถานที่รับ: </label>
                            <div class="col-sm-5">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="local_out" 
                                    placeholder="สถานที่รับ" 
                                    required
                                />
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-center">
                            <label for="" class="col-sm-2 col-form-label">สินค้า: </label>
                            <div class="col-sm-5">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="product_name" 
                                    placeholder="สินคา" 
                                    required
                                />
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-center">
                            <label for="" class="col-sm-2 col-form-label">จำนวน: </label>
                            <div class="col-sm-5">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="product_amout" 
                                    placeholder="จำนวน" 
                                    required
                                />
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-center">
                            <div class="col-sm-5">
                                <button 
                                    type="submit" 
                                    class="btn btn-danger" 
                                    id="addOrder" 
                                >Add Order</button>
                            </div>
                        </div>
                    
                    </form>
                </div>
            </div>      
        </section>
        
    </div>
    
</body>
</html>