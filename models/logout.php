<?php
    include('../components/headM.php');

?>
<script>
    $(document).ready(function() {


        function deletecookie(name) {   
            document.cookie = name+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"; 
        }
        // function get_cookie(name){
        //     return document.cookie.split(';').some(c => {
        //         return c.trim().startsWith(name + '=');
        //     });
        // }
        let vv = deletecookie("sessionId");
    })
</script>




<h1>Delete Cookie</h1>


