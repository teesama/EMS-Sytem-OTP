<script>
    $("#btn_otp").click(function() {

        let otp_send = $("#otp_send").val();
        console.log("Send data");
        $.post("./models/send_otp.php", {
            otp_send:otp_send,
        },
            function(data,status) {
                if (data === "success") {
                    alert("Correct OTP");
                    console.log("Correct OTP");
                } else {
                    alert("otp ผิด");
                    console.log(data);
                }
            })
    })
</script>

<div class="col-md-12 text-center">
    <h2>SENT OTP</h2>
    <div class="m3">
        <span>OTP :</span>
        <input type="number" name="otp_send" id="otp_send">
        <button id="btn_otp" class="btn btn-primary" type="submit">Enter</button>
    </div>
</div>