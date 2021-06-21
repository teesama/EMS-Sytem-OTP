
<script>
    $(document).ready(function() {
        $("#submit_login").click(function() {
            console.log("Login");
            var user = $("#user").val();
            var pass  = $("#pass").val();

            $.post("./models/getUser.php",{
                user:user,
                pass:pass,
            },
                function(data,status){
                    // alert("data = "+data);
                    if(data!="ไม่มีข้อมุล"){

                        if (data === "unotp") {
                            // wait OTP
                            alert("กรุณายืนยัน OTP ก่อนเข้าใช้งาน");
                            $("#contentshow").load("./components/sentotp.php");
                            
                        } else {
                            var sId = data;
                            writeCookie('sessionId', sId, 3);
                            readCookie('sessionId');
                        }
                        
                    }else{
                        console.log(data);
                        alert(data);
                    }
                }
            )
        })
    })
</script>

<div class="fxt-form">
    <form action="">
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">User: </label>
            <div class="col-sm-10">
                <input 
                    type="text" 
                    class="form-control" 
                    id="user" 
                    placeholder="username" 
                />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Pass: </label>
            <div class="col-sm-10">
                <input 
                    type="password" 
                    class="form-control" 
                    id="pass" 
                    placeholder="password" 
                />
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10">
            <button type="submit" id="submit_login" class="btn btn-primary mb-3 text-uppercase">login</button>
            </div>
        </div>
    </form>
</div>
<div class="fxt-footer">
    <div class="contentshow" id="contentshow"></div>
    <!-- <ul class="list-group fxt-social">
        <li class="list-group-item list-group-item-action fxt-facebook">facebook</li>
        <li class="list-group-item list-group-item-action fxt-facebook">Google</li>
        <li class="list-group-item list-group-item-action fxt-facebook">line</li>
    </ul> -->
</div>