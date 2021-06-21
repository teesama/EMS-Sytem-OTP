
<script>
    function apiemail(url) {
        let obj = 
            {
                from_email: "alexander_ariwa@hotmail.co.th",
                to_email: "sakoopien_king@hotmail.com",
                hello_name: "48904",
            }
        
        let res = fetch(url, {
            method: 'GET',
            headers: {
                'content-type': 'application/json',
            }
        })
            .then(data => {
                console.log(typeof data);
                console.log(data.json());
                console.log((JSON.stringify(data)).PromiseResult);
            })
            .catch(error => {
                console.log(error);
            })
    }
    function getsmsapi (url) {
        axios.get(url).then(res => {
            console.log(res.data)
        })
    }
    $(document).ready(function() {
        let email = $("#email").val();
        let data = [{
            to_email: email
        }];
        
        
        // http://localhost:5000/user/getall
        
        $("#submit_register").click(function() {
            let phone = $("#phone").val();
            let name = $("#name").val();
            let user = $("#user").val();
            let pass = $("#pass").val();
            // let url = "http://www.thsms.com/api/rest?";
            // apiemail(url);
            let otp = Math.floor(Math.random() * 100000);
            $.post("./models/smsAPI.php", {
                name:name,
                user:user,
                pass:pass,
                phone:phone,
                otp:otp,
            },
                function(data,status) {
                    if (data === "success") {
                        console.log("otp ได้ถูกส่งไปแล้ว");

                        $.post("./models/addUser.php", {
                            name:name,
                            user:user,
                            pass:pass,
                            phone:phone,
                            otp:otp,
                        },
                            function(data,status) {
                                if (data === "success") {
                                    console.log("เพิ่มข้อมูลลงฐานข้อมูลเรียบร้อย");
                                } else {
                                    console.log("Error "+data);
                                }
                            })
                    }else{
                        console.log("error = "+data);
                    }
                }
            )
            $("#contentshow").load("./components/sentotp.php")
            // let url = "https://jsonplaceholder.typicode.com/users";
            // getsmsapi(url);
        })
    })
</script>

<div class="fxt-form">
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Fullname: </label>
            <div class="col-sm-10">
                <input type="text" id="name" name="name" class="form-control" placeholder="fullname" >
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">username: </label>
            <div class="col-sm-10">
                <input type="text" id="user" name="user" class="form-control" placeholder="fullname" >
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Pass: </label>
            <div class="col-sm-10">
                <input type="password" id="pass" name="pass" class="form-control" placeholder="password" >
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">phone: </label>
            <div class="col-sm-10">
                <input type="number" id="phone" name="phone" class="form-control" placeholder="08xxxxxxxx" >
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10">
            <button type="submit" id="submit_register" class="btn btn-primary mb-3 text-uppercase">Register</button>
            </div>
        </div>
</div>
<div class="fxt-footer">
    <div class="contentshow" id="contentshow"></div>
    
</div>