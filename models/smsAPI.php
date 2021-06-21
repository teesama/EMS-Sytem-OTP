<?php
include("../configs/connect.php");
// SMS
$sms = new thsms();

$sms->username = "istee123";
$sms->password = "f34465";

$a = $sms->getCredit();
// var_dump($a);
// echo "ยังเหลือฟรีอีก ".$a." ครั้ง";

$name = $_POST['name'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$phone = $_POST['phone'];


$otp = $_POST['otp'];

$mem_id = uniqid();
// echo "mem_id = ".$mem_id;
// echo "name = ".$name;
// echo "user = ".$user;
// echo "pass = ".$pass;
// echo "phone = ".$phone;
// echo "otp = ".$otp;

$b = $sms->send('0000',$phone,'otp = '.$otp);
// var_dump($b);
echo "success";


class thsms {
	var $api_url = "http://www.thsms.com/api/rest";
	var $username = null;
	var $password = null;

	public function getCredit() {
		$params['method'] = "credit";
		$params['username'] = $this->username;
		$params['password'] = $this->password;

		$result = $this->curl( $params);

		$xml = @simplexml_load_string($result);

		if (!is_object($xml)) {
			return array(FALSE, 'Respond error');
		} else {
			if ($xml->credit->status == 'success') {
                // return $xml->credit->amount;
				return array(TRUE, $xml->credit->amount);
			} else {
				return array(FALSE, $xml->credit->message);
			}
		}

	}
	public function send( $from='0000', $to=null, $message=null)
    {
        $params['method']   = 'send';
        $params['username'] = $this->username;
        $params['password'] = $this->password;
 
        $params['from']     = $from;
        $params['to']       = $to;
        $params['message']  = $message;
 
        if (is_null( $params['to']) || is_null( $params['message']))
        {
            return FALSE;
        }
 
        $result = $this->curl( $params);
        $xml = @simplexml_load_string( $result);
        if (!is_object($xml))
        {
            return array( FALSE, 'Respond error');
        } else {
            if ($xml->send->status == 'success')
            {
                return "success";
                // return array( TRUE, $xml->send->uuid);
            } else {
                // return "error";
                return array( FALSE, $xml->send->message);
            }
        }
    }
     
    private function curl( $params=array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->api_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( $params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
        $response  = curl_exec($ch);
        $lastError = curl_error($ch);
        $lastReq = curl_getinfo($ch);
        curl_close($ch);
 
        return $response;
    }
}


?>