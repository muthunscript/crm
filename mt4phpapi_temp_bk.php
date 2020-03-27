<?php
//set_time_limit(0);

 //require_once ('functions.php');

 class mt4api1
 {

 	private $host_real;
 	private $host_demo;

 	private $port = 443;

 	private $mode;
 	private $real_pwd = 'Tradeu2@123';
 	private $demo_pwd = 'Tradelevel@123';
 	private $spass = 'password';


 	function __construct($val)
 	{
 		global $_site_config;
 		$this->mode = $val;
 		$this->host_real = $_site_config['mt4_live'];
 		$this->host_demo = $_site_config['mt4_demo'];
 	}
 	public static function MQ_Query($query, $host, $port)
 	{
 		$ret = 'error';
 		//loge($host . "|" . $port . "|" . $query);
		
		global $log;
		log->debug($host . "|" . $port . "|" . $query);
		
 		/**** new content to access data from another server to mt4 ****/
 		if (false /*MODE!='LOCAL'*/ )
 		{
 			$url = 'http://webdesigninginchennai.com/tradize/mt4op.php';
 			$fields = array(
 				'query' => ($query),
 				'host' => ($host),
 				'port' => ($port) //'mode' => urlencode($this->mode)
 					);

 			//url-ify the data for the POST
 			$fields_string = '';
 			foreach ($fields as $key => $value)
 			{
 				$fields_string .= $key . '=' . $value . '&';
 			}
 			rtrim($fields_string, '&');

 			//open connection
 			$ch = curl_init();

 			//set the url, number of POST vars, POST data
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
 			curl_setopt($ch, CURLOPT_URL, $url);
 			curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
 			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 			curl_setopt($ch, CURLOPT_POST, count($fields));
 			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

 			//execute post
 			$ret = curl_exec($ch);
 			//loge($ret);
			log->debug($ret);
 			curl_close($ch);
 		}
 		else
 		{
 			/**** old data to access mt4 server ***/
 			$ptr = @fsockopen($host, $port, $errno, $errstr, 5);

 			if ($ptr)
 			{

 				if (fputs($ptr, "W$query\nQUIT\n") != false)
 				{

 					$ret = '';
 					while (!feof($ptr))
 					{

 						$line = fgets($ptr, 128);
 						// logm($line);
 						if ($line == "end\r\n")
 							break;
 						$ret .= $line;
 					}
 				}
 				fclose($ptr);
 			}
 			//loge($ret);
			log->debug($ret);
 		}
 		return $ret;
 	}

	
 	public function open_account($group, $name, $passsword, $email, $agent, $country, $state, $city, $address, $phone, $phone_password, $status, $zipcode, $id, $leverage, $comment, $investor, $login = '')
 	{
		global $log;

 		global $account_socket, $_exe_array, $_site_config,$site,$tr_array,$explore_serv_array,$updemo_array;
 		//var_dump($deposit_socket);
 		if ($login == '')
 		{
 			$query = 'MODE=DP_NEWACCOUNT|SPASS=' . $this->spass . '|GROUP=' . $group . '|INVESTOR=' . $investor . '|NAME=' . $name . '|PASSWORD=' . $passsword . '|EMAIL=' . $email . '|AGENT=' . $agent . '|COUNTRY=' . $country . '|STATE=' . $state . '|CITY=' . $city . '|ADDRESS=' . $address . '|COMMENT=' . $comment . '|PHONE=' . $phone . '|P_WORD=' . $phone_password . '|STATUS=' . $status . '|ZIPCODE=' . $zipcode . '|ID=' . $id . '|LEVERAGE=' . $leverage; //P_WORD
 		}
 		else
 		{
 			$query = 'MODE=DP_NEWACCOUNT|SPASS=' . $this->spass . '|GROUP=' . $group . '|INVESTOR=' . $investor . '|NAME=' . $name . '|PASSWORD=' . $passsword . '|EMAIL=' . $email . '|AGENT=' . $agent . '|COUNTRY=' . $country . '|STATE=' . $state . '|CITY=' . $city . '|ADDRESS=' . $address . '|COMMENT=' . $comment . '|PHONE=' . $phone . '|P_WORD=' . $phone_password . '|STATUS=' . $status . '|ZIPCODE=' . $zipcode . '|ID=' . $id . '|LEVERAGE=' . $leverage . '|LOGIN=' . $login; //P_WORD
 		}
 		//loge($query);
		log->debug($query);
		
		if(!in_array($site,$tr_array)&&!in_array($site,$explore_serv_array)&&!in_array($site,$updemo_array)&&$this->mode == 1)
		{
			$ws = new ws(array(
							'host' => 'easyfx.nscript.com',
							'port' => '1011',
							'path' => '',
							'secure_socket' => true));
						$query = time().rand(1111,9999).'|-|NEWUSER|-|0|-|' . $group . '|-|' . $passsword . '|-|' . $name . '|-|' . $country . '|-|' . $email . '|-|' . $agent . '|-|' . $state . '|-|' . $city . '|-|' . $address . '|-|' . $phone . '|-|' . $zipcode . '|-|' . $leverage . '|-|' . $investor . '|-|0|-|';
						$query=preg_replace('/\s+/', '',$query);
						//loge($query);
						log->debug($query);
						$login1 = $ws->send($query);
						//loge($login1);
						log->debug($login1);
						$ret = json_decode($login1, true);
						if ($ret['status'] == 'OK')
						{
							$response = 'OK , LOGIN=' . $ret['accno'];
						}
						else
						{
								$ws = new ws(array(
								'host' => '23.81.66.123',
								'port' => '1011',
								'path' => '',
								'secure_socket' => false));
							$query = time().rand(1111,9999).'|-|NEWUSER|-|0|-|' . $group . '|-|' . $passsword . '|-|' . $name . '|-|' . $country . '|-|' . $email . '|-|' . $agent . '|-|' . $state . '|-|' . $city . '|-|' . $address . '|-|' . $phone . '|-|' . $zipcode . '|-|' . $leverage . '|-|' . $investor . '|-|0|-|';
							$query=preg_replace('/\s+/', '',$query);
							//loge($query);
							log->debug($query);
							$login1 = $ws->send($query);
							//loge($login1);
							log->debug($login1);
							$ret = json_decode($login1, true);
							if ($ret['status'] == 'OK')
							{
								$response = 'OK , LOGIN=' . $ret['accno'];
							}
							else
							{
								goto open_account;
								$response = 'Invalid Data';
							}
						}
						return $response;
			
		}
		else if(!in_array($site,$tr_array)&&!in_array($site,$updemo_array)&&$this->mode == 1)
		{
			global $log;
			$ws = new ws(array(
							'host' => 'exfx.nscript.com',
							'port' => '1011',
							'path' => '',
							'secure_socket' => true));
						$query = time().rand(1111,9999).'|-|NEWUSER|-|0|-|' . $group . '|-|' . $passsword . '|-|' . $name . '|-|' . $country . '|-|' . $email . '|-|' . $agent . '|-|' . $state . '|-|' . $city . '|-|' . $address . '|-|' . $phone . '|-|' . $zipcode . '|-|' . $leverage . '|-|' . $investor . '|-|0|-|';
						$query=preg_replace('/\s+/', '',$query);
						//loge($query);
						log->debug($query);
						$login1 = $ws->send($query);
						//loge($login1);
						log->debug($login1);
						$ret = json_decode($login1, true);
						if ($ret['status'] == 'OK')
						{
							$response = 'OK , LOGIN=' . $ret['accno'];
						}
						else
						{
								goto open_account;
								$response = 'Invalid Data';
						}
						return $response;
			
		
		}
		else if(!in_array($site,$tr_array)&&$this->mode == 1)
		{
			
			$ws = new ws(array(
							'host' => 'upfxdemo.nscript.com',
							'port' => '1002',
							'path' => '',
							'secure_socket' => true));
						$query = time().rand(1111,9999).'|-|NEWUSER|-|0|-|' . $group . '|-|' . $passsword . '|-|' . $name . '|-|' . $country . '|-|' . $email . '|-|' . $agent . '|-|' . $state . '|-|' . $city . '|-|' . $address . '|-|' . $phone . '|-|' . $zipcode . '|-|' . $leverage . '|-|' . $investor . '|-|0|-|';
						$query=preg_replace('/\s+/', '',$query);
						//loge($query);
						log->debug($query);
						$login1 = $ws->send($query);
						//loge($login1);
						log->debug($login1);
						$ret = json_decode($login1, true);
						if ($ret['status'] == 'OK')
						{
							$response = 'OK , LOGIN=' . $ret['accno'];
						}
						else
						{
								goto open_account;
								$response = 'Invalid Data';
						}
						return $response;
			
		
		}
 		else if (isset($_site_config['exe']) && isset($_exe_array[$_site_config['exe']]))
 		{
			open_account:
 			if ($this->mode == 1)
 			{
 				$ret = exec_exe(DR . 'dep' . DS . 'acreate.exe "NEWUSER|-|0|-|' . $group . '|-|' . $passsword . '|-|' . $name . '|-|' . $country . '|-|' . $email . '|-|' . $agent . '|-|' . $state . '|-|' . $city . '|-|' . $address . '|-|' . $phone . '|-|' . $zipcode . '|-|' . $leverage . '|-|' . $investor . '|-||-|" "' . $_exe_array[$_site_config['exe']]['live'][0] . '" "' . $_exe_array[$_site_config['exe']]['live'][1] . '" "' . $_exe_array[$_site_config['exe']]['live'][2] . '"  ');

				//loge($ret);
				log->debug($ret);
 			}
 			else
 			{
 				$ret = exec_exe(DR . 'dep' . DS . 'acreate.exe "NEWUSER|-|0|-|' . $group . '|-|' . $passsword . '|-|' . $name . '|-|' . $country . '|-|' . $email . '|-|' . $agent . '|-|' . $state . '|-|' . $city . '|-|' . $address . '|-|' . $phone . '|-|' . $zipcode . '|-|' . $leverage . '|-|' . $investor . '|-||-|" "' . $_exe_array[$_site_config['exe']]['demo'][0] . '" "' . $_exe_array[$_site_config['exe']]['demo'][1] . '" "' . $_exe_array[$_site_config['exe']]['demo'][2] . '"  ');

 			}
 			$ret = json_decode($ret, true);
 			if ($ret['status'] == 'OK')
 			{
 				$response = 'OK , LOGIN=' . $ret['accno'];
 			}
 			else
 			{
 				$response = 'Invalid Data';
 			}
 			return $response;
 		}
 		else
 			if (isset($account_socket) && $account_socket['status'])
 			{
 				if ($this->mode == 1)
 				{
 					$ws = $account_socket["real"];
 				}
 				else
 				{
 					$ws = $account_socket["demo"];
 				}
 				$login = '';
 				$curl = curl_init();

 				curl_setopt_array($curl, array(
 					CURLOPT_URL => "http://terminal.nsuite.in/api.php",
 					CURLOPT_RETURNTRANSFER => true,
 					CURLOPT_ENCODING => "",
 					CURLOPT_MAXREDIRS => 10,
 					CURLOPT_TIMEOUT => 30,
 					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 					CURLOPT_CUSTOMREQUEST => "POST",
 					CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ip\"\r\n\r\n" . $ws . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"query\"\r\n\r\n" . $query . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
 					CURLOPT_HTTPHEADER => array(
 						"cache-control: no-cache",
 						"content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
 						"postman-token: f1e809b8-7594-4e69-e19b-5c6324eeed19"),
 					));

 				$response = curl_exec($curl);
 				$err = curl_error($curl);

 				curl_close($curl);

 				if ($err)
 				{
 					//loge("cURL Error #:" . $err);
					log->debug("cURL Error #:" . $err);
 				}
 				else
 				{
 					$login = $response;
 				}
 				//loge($login);
				log->debug($login);
 				return $login;
 			}
 			else
 			{
 				//loge(json_encode(get_defined_vars()));
				log->debug(json_encode(get_defined_vars()));
 				return $this->open_account_old($group, $name, $passsword, $email, $agent, $country, $state, $city, $address, $phone, $phone_password, $status, $zipcode, $id, $leverage, $comment, $investor, $login);
 			}
 	}

 	public function open_account_old($group, $name, $passsword, $email, $agent, $country, $state, $city, $address, $phone, $phone_password, $status, $zipcode, $id, $leverage, $comment, $investor, $login = '')
 	{
		global $log;
 		//echo $this->mode;
 		if ($login == '')
 		{
 			$query = 'MODE=NEWACCOUNT|SPASS=' . $this->spass . '|GROUP=' . $group . '|INVESTOR=' . $investor . '|NAME=' . $name . '|PASSWORD=' . $passsword . '|EMAIL=' . $email . '|AGENT=' . $agent . '|COUNTRY=' . $country . '|STATE=' . $state . '|CITY=' . $city . '|ADDRESS=' . $address . '|COMMENT=' . $comment . '|PHONE=' . $phone . '|P_WORD=' . $phone_password . '|STATUS=' . $status . '|ZIPCODE=' . $zipcode . '|ID=' . $id . '|LEVERAGE=' . $leverage; //P_WORD
 		}
 		else
 		{
 			$query = 'MODE=NEWACCOUNT|SPASS=' . $this->spass . '|GROUP=' . $group . '|INVESTOR=' . $investor . '|NAME=' . $name . '|PASSWORD=' . $passsword . '|EMAIL=' . $email . '|AGENT=' . $agent . '|COUNTRY=' . $country . '|STATE=' . $state . '|CITY=' . $city . '|ADDRESS=' . $address . '|COMMENT=' . $comment . '|PHONE=' . $phone . '|P_WORD=' . $phone_password . '|STATUS=' . $status . '|ZIPCODE=' . $zipcode . '|ID=' . $id . '|LEVERAGE=' . $leverage . '|LOGIN=' . $login; //P_WORD
 		}
 		//echo $query;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;
		//loge($query);
		log->debug($query);
 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
		//loge($returned);
		log->debug($returned);
 		return $returned;
 	}


 	public function edit_account($group, $login, $passsword, $name)
 	{
 		//echo $this->mode;

 		$query = 'MODE=EDITACCOUNT|SPASS=' . $this->spass . '|LOGIN=' . $login . '|NAME=' . $name . '|ZIPCODE=' . $passsword . '|GROUP=' . $group;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}
 	public function edit_account_for_app($edit_fields)
 	{
 		//echo $this->mode;

 		$query = 'MODE=EDITACCOUNT|' . $edit_fields . '|SPASS=' . $this->spass;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned . " " . $query;
 	}

 	public function add_account($group, $name, $passsword, $phone_password, $id, $leverage, $comment, $investor, $email, $login = '')
 	{
		global $log;
 		//echo $this->mode;
 		//$query=		 'MODE=NEWACCOUNT|GROUP=hrmanager|MASTER=grandmaster|NAME=om|PASSWORD=PaulPandi|INVESTOR=TRUE|EMAIL=pp1@gmail.com|AGENT=6142|COUNTRY=India|STATE=TN|CITY=MADURAI|ADDRESS=E221|COMMENT=Ok|PHONE=112213344|PHONE_PASSWORD=443|STATUS=k|ZIPCODE=625207|ID=12345|LEVERAGE=99|SEND_REPORTS=813';
 		global $account_socket, $_exe_array, $_site_config,$site,$tr_array,$explore_serv_array,$updemo_array;
 		//var_dump($deposit_socket);
 		if ($login == '')
 		{
 			$query = 'MODE=DP_NEWACCOUNT|SPASS=' . $this->spass . '|GROUP=' . $group . '|INVESTOR=' . $investor . '|NAME=' . $name . '|PASSWORD=' . $passsword . '|EMAIL=' . $email . '|AGENT=' . $agent . '|COUNTRY=' . $country . '|STATE=' . $state . '|CITY=' . $city . '|ADDRESS=' . $address . '|COMMENT=' . $comment . '|PHONE=' . $phone . '|P_WORD=' . $phone_password . '|STATUS=' . $status . '|ZIPCODE=' . $zipcode . '|ID=' . $id . '|LEVERAGE=' . $leverage; //P_WORD
 		}
 		else
 		{
 			$query = 'MODE=DP_NEWACCOUNT|SPASS=' . $this->spass . '|GROUP=' . $group . '|INVESTOR=' . $investor . '|NAME=' . $name . '|PASSWORD=' . $passsword . '|EMAIL=' . $email . '|AGENT=' . $agent . '|COUNTRY=' . $country . '|STATE=' . $state . '|CITY=' . $city . '|ADDRESS=' . $address . '|COMMENT=' . $comment . '|PHONE=' . $phone . '|P_WORD=' . $phone_password . '|STATUS=' . $status . '|ZIPCODE=' . $zipcode . '|ID=' . $id . '|LEVERAGE=' . $leverage . '|LOGIN=' . $login; //P_WORD
 		}
 		//loge($query);
		log->debug($query);
		if(!in_array($site,$tr_array)&&!in_array($site,$explore_serv_array)&&!in_array($site,$updemo_array)&&$this->mode == 1)
		{
			$ws = new ws(array(
							'host' => 'easyfx.nscript.com',
							'port' => '1011',
							'path' => '',
							'secure_socket' => true));
						$query = time().rand(1111,9999).'|-|NEWUSER|-|0|-|' . $group . '|-|' . $passsword . '|-|' . $name . '|-|' . $country . '|-|' . $email . '|-|' . $agent . '|-|' . $state . '|-|' . $city . '|-|' . $address . '|-|' . $phone . '|-|' . $zipcode . '|-|' . $leverage . '|-|' . $investor . '|-|0|-|';
						$query=preg_replace('/\s+/', '',$query);
						//loge($query);
						log->debug($query);
						$login1 = $ws->send($query);
						//loge($login1);
						log->debug($login1);
						$ret = json_decode($login1, true);
						if ($ret['status'] == 'OK')
						{
							$response = 'OK , LOGIN=' . $ret['accno'];
						}
						else
						{
								$ws = new ws(array(
								'host' => '23.81.66.122',
								'port' => '1011',
								'path' => '',
								'secure_socket' => false));
							$query = time().rand(1111,9999).'|-|NEWUSER|-|0|-|' . $group . '|-|' . $passsword . '|-|' . $name . '|-|' . $country . '|-|' . $email . '|-|' . $agent . '|-|' . $state . '|-|' . $city . '|-|' . $address . '|-|' . $phone . '|-|' . $zipcode . '|-|' . $leverage . '|-|' . $investor . '|-|0|-|';
							$query=preg_replace('/\s+/', '',$query);
							//loge($query);
							log->debug($query);
							$login1 = $ws->send($query);
							//loge($login1);
							log->debug($login1);
							$ret = json_decode($login1, true);
							if ($ret['status'] == 'OK')
							{
								$response = 'OK , LOGIN=' . $ret['accno'];
							}
							else
							{
								goto add_account;
								$response = 'Invalid Data';
							}
						}
						return $response;
			
		}
		else if(!in_array($site,$tr_array)&&!in_array($site,$updemo_array)&&$this->mode == 1)
		{
			
			$ws = new ws(array(
							'host' => 'exfx.nscript.com',
							'port' => '1011',
							'path' => '',
							'secure_socket' => true));
						$query = time().rand(1111,9999).'|-|NEWUSER|-|0|-|' . $group . '|-|' . $passsword . '|-|' . $name . '|-|' . $country . '|-|' . $email . '|-|' . $agent . '|-|' . $state . '|-|' . $city . '|-|' . $address . '|-|' . $phone . '|-|' . $zipcode . '|-|' . $leverage . '|-|' . $investor . '|-|0|-|';
						$query=preg_replace('/\s+/', '',$query);
						//loge($query);
						log->debug($query);
						$login1 = $ws->send($query);
						//loge($login1);
						log->debug($login1);
						$ret = json_decode($login1, true);
						if ($ret['status'] == 'OK')
						{
							$response = 'OK , LOGIN=' . $ret['accno'];
						}
						else
						{
								goto add_account;
								$response = 'Invalid Data';
						}
						return $response;
			
		
		}
		else if(!in_array($site,$tr_array)&&$this->mode == 1)
		{
			
			$ws = new ws(array(
							'host' => 'upfxdemo.nscript.com',
							'port' => '1002',
							'path' => '',
							'secure_socket' => true));
						$query = time().rand(1111,9999).'|-|NEWUSER|-|0|-|' . $group . '|-|' . $passsword . '|-|' . $name . '|-|' . $country . '|-|' . $email . '|-|' . $agent . '|-|' . $state . '|-|' . $city . '|-|' . $address . '|-|' . $phone . '|-|' . $zipcode . '|-|' . $leverage . '|-|' . $investor . '|-|0|-|';
						$query=preg_replace('/\s+/', '',$query);
						//loge($query);
						log->debug($query);
						$login1 = $ws->send($query);
						//loge($login1);
						log->debug($login1);
						$ret = json_decode($login1, true);
						if ($ret['status'] == 'OK')
						{
							$response = 'OK , LOGIN=' . $ret['accno'];
						}
						else
						{
								goto add_account;
								$response = 'Invalid Data';
						}
						return $response;
			
		
		}
 		else if (isset($_site_config['exe']) && isset($_exe_array[$_site_config['exe']]))
 		{
			add_account:
 			if ($this->mode == 1)
 			{
 				$ret = exec_exe(DR . 'dep' . DS . 'acreate.exe "NEWUSER|-|0|-|' . $group . '|-|' . $passsword . '|-|' . $name . '|-|' . $country . '|-|' . $email . '|-|' . $agent . '|-|' . $state . '|-|' . $city . '|-|' . $address . '|-|' . $phone . '|-|' . $zipcode . '|-|' . $leverage . '|-|' . $investor . '|-||-|" "' . $_exe_array[$_site_config['exe']]['live'][0] . '" "' . $_exe_array[$_site_config['exe']]['live'][1] . '" "' . $_exe_array[$_site_config['exe']]['live'][2] . '"  ');
				//loge($ret);
				//loge(DR . 'dep' . DS . 'acreate.exe "NEWUSER|-|0|-|' . $group . '|-|' . $passsword . '|-|' . $name . '|-|' . $country . '|-|' . $email . '|-|' . $agent . '|-|' . $state . '|-|' . $city . '|-|' . $address . '|-|' . $phone . '|-|' . $zipcode . '|-|' . $leverage . '|-|' . $investor . '|-||-|" "' . $_exe_array[$_site_config['exe']]['live'][0] . '" "' . $_exe_array[$_site_config['exe']]['live'][1] . '" "' . $_exe_array[$_site_config['exe']]['live'][2] . '"  ');
 				//logw(DR.'dep'.DS.'acreate.exe "NEWUSER|-|0|-|'.$group.'|-|'.$passsword.'|-|'.$name.'|-|'.$country.'|-|'.$email.'|-|'.$agent.'|-|'.$state.'|-|'.$city.'|-|'.$address.'|-|'.$phone.'|-|'.$zipcode.'|-|'.$leverage.'|-|'.$investor.'|-||-|" "'.$_exe_array[$_site_config['exe']]['live'][0].'" "'.$_exe_array[$_site_config['exe']]['live'][1].'" "'.$_exe_array[$_site_config['exe']]['live'][2].'"  ');
 			}
 			else
 			{
 				$ret = exec_exe(DR . 'dep' . DS . 'acreate.exe "NEWUSER|-|0|-|' . $group . '|-|' . $passsword . '|-|' . $name . '|-|' . $country . '|-|' . $email . '|-|' . $agent . '|-|' . $state . '|-|' . $city . '|-|' . $address . '|-|' . $phone . '|-|' . $zipcode . '|-|' . $leverage . '|-|' . $investor . '|-||-|" "' . $_exe_array[$_site_config['exe']]['demo'][0] . '" "' . $_exe_array[$_site_config['exe']]['demo'][1] . '" "' . $_exe_array[$_site_config['exe']]['demo'][2] . '"  ');
				//loge(DR . 'dep' . DS . 'acreate.exe "NEWUSER|-|0|-|' . $group . '|-|' . $passsword . '|-|' . $name . '|-|' . $country . '|-|' . $email . '|-|' . $agent . '|-|' . $state . '|-|' . $city . '|-|' . $address . '|-|' . $phone . '|-|' . $zipcode . '|-|' . $leverage . '|-|' . $investor . '|-||-|" "' . $_exe_array[$_site_config['exe']]['demo'][0] . '" "' . $_exe_array[$_site_config['exe']]['demo'][1] . '" "' . $_exe_array[$_site_config['exe']]['demo'][2] . '"  ');
 				//logw(DR.'dep'.DS.'acreate.exe "NEWUSER|-|0|-|'.$group.'|-|'.$passsword.'|-|'.$name.'|-|'.$country.'|-|'.$email.'|-|'.$agent.'|-|'.$state.'|-|'.$city.'|-|'.$address.'|-|'.$phone.'|-|'.$zipcode.'|-|'.$leverage.'|-|'.$investor.'|-||-|" "'.$_exe_array[$_site_config['exe']]['demo'][0].'" "'.$_exe_array[$_site_config['exe']]['demo'][1].'" "'.$_exe_array[$_site_config['exe']]['demo'][2].'"  ');
 			}
 			$ret = json_decode($ret, true);
 			if ($ret['status'] == 'OK')
 			{
 				$response = 'OK , LOGIN=' . $ret['accno'];
 			}
 			else
 			{
 				$response = 'Invalid Data';
 			}
 			return $response;
 		}
 		else
 			if (isset($account_socket) && $account_socket['status'])
 			{
 				if ($this->mode == 1)
 				{
 					$ws = $account_socket["real"];
 				}
 				else
 				{
 					$ws = $account_socket["demo"];
 				}
 				$login = '';
 				$curl = curl_init();

 				curl_setopt_array($curl, array(
 					CURLOPT_URL => "http://terminal.nsuite.in/api.php",
 					CURLOPT_RETURNTRANSFER => true,
 					CURLOPT_ENCODING => "",
 					CURLOPT_MAXREDIRS => 10,
 					CURLOPT_TIMEOUT => 30,
 					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 					CURLOPT_CUSTOMREQUEST => "POST",
 					CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ip\"\r\n\r\n" . $ws . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"query\"\r\n\r\n" . $query . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
 					CURLOPT_HTTPHEADER => array(
 						"cache-control: no-cache",
 						"content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
 						"postman-token: f1e809b8-7594-4e69-e19b-5c6324eeed19"),
 					));

 				$response = curl_exec($curl);
 				$err = curl_error($curl);

 				curl_close($curl);

 				if ($err)
 				{
 					//loge("cURL Error #:" . $err);
					log->debug("cURL Error #:" . $err);
 				}
 				else
 				{
 					$login = $response;
 				}
 				//loge($login);
				log->debug($login);
 				return $login;
 			}
 			else
 			{
 				return $this->add_account_old($group, $name, $passsword, $phone_password, $id, $leverage, $comment, $investor, $email, $login);
 			}
 	}
 	public function add_account_old($group, $name, $passsword, $phone_password, $id, $leverage, $comment, $investor, $email, $login = '')
 	{
 		//echo $this->mode;
 		//$query=		 'MODE=NEWACCOUNT|GROUP=hrmanager|MASTER=grandmaster|NAME=om|PASSWORD=PaulPandi|INVESTOR=TRUE|EMAIL=pp1@gmail.com|AGENT=6142|COUNTRY=India|STATE=TN|CITY=MADURAI|ADDRESS=E221|COMMENT=Ok|PHONE=112213344|PHONE_PASSWORD=443|STATUS=k|ZIPCODE=625207|ID=12345|LEVERAGE=99|SEND_REPORTS=813';
 		if ($login == '')
 		{
 			$query = 'MODE=NEWACCOUNT|SPASS=' . $this->spass . '|GROUP=' . $group . '|INVESTOR=' . $investor . '|NAME=' . $name . '|PASSWORD=' . $passsword . '|P_WORD=' . $phone_password . '|ID=' . $id . '|LEVERAGE=' . $leverage . '|COMMENT=' . $comment . '|EMAIL=' . $email;
 		}
 		else
 		{
 			$query = 'MODE=NEWACCOUNT|SPASS=' . $this->spass . '|GROUP=' . $group . '|INVESTOR=' . $investor . '|NAME=' . $name . '|PASSWORD=' . $passsword . '|P_WORD=' . $phone_password . '|ID=' . $id . '|LEVERAGE=' . $leverage . '|COMMENT=' . $comment . '|EMAIL=' . $email . '|LOGIN=' . $login;
 		}

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}


 	public function delete_account($login)
 	{
 		//echo $this->mode;

 		$query = 'MODE=DELETEACCOUNT|SPASS=' . $this->spass . '|LOGIN=' . $login;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}

 	public function user_info($login)
 	{
 		//echo $this->mode;
		global $_site_config,$sql_manager;
		if(isset($_site_config['sql'])&&isset($sql_manager[$_site_config['sql']]))
		{
			$result=sql_user_info($login,($this->mode == 1?'live':'demo'));
			if(!$result){goto olduser_info;}
			//loge("info============================================================>".$result);
			return $result;
		}
		else
		{
			//echo $this->mode;
			olduser_info:
	
			$query = 'MODE=USERINFO|SPASS=' . $this->spass . '|LOGIN=' . $login;
	
			$host = $this->mode == 1 ? $this->host_real : $this->host_demo;
	
			$returned = mt4api1::MQ_Query($query, $host, $this->port);
			return $returned;
		}
 	}
 	public function deposit($login, $deposit, $comment)
 	{
		global $log;
 		set_time_limit(0);
 		global $deposit_socket, $_site_config,$site,$tr_array,$explore_serv_array,$updemo_array;
 		//var_dump($deposit_socket);
		if(!in_array($site,$tr_array)&&!in_array($site,$explore_serv_array)&&!in_array($site,$updemo_array)&&$this->mode == 1)
		{
			$ws = new ws(array(
							'host' => 'easyfx.nscript.com',
							'port' => '1011',
							'path' => '',
							'secure_socket' => true));
						$query = time().rand(1111,9999).'|-|DC|-|6|-|' . $login . '|-|' . $deposit . '|-|' . substr($comment, -30) . '|-|';
						$query=preg_replace('/\s+/', '',$query);
						//loge($query);
						log->debug($query);
						$login1 = $ws->send($query);
						//loge($login1);
						log->debug($login1);
						$ret = json_decode($login1, true);
						if ($ret['status'] == 'OK')
						{
							$response = "DEPOSIT SUCCESSFUL";
						}
						else
						{
								$ws = new ws(array(
								'host' => '23.81.66.122',
								'port' => '1011',
								'path' => '',
								'secure_socket' => false));
							$query = time().rand(1111,9999).'|-|DC|-|6|-|' . $login . '|-|' . $deposit . '|-|' . substr($comment, -30) . '|-|';
							$query=preg_replace('/\s+/', '',$query);
							//loge($query);
							log->debug($query);
							$login1 = $ws->send($query);
							//loge($login1);
							log->debug($login1);
							$ret = json_decode($login1, true);
							if ($ret['status'] == 'OK')
							{
								$response = "DEPOSIT SUCCESSFUL";
							}
							else
							{
								goto deposit;
								$response = 'Invalid Data';
							}
						}
						return $response;
			
		}
		else if(!in_array($site,$tr_array)&&!in_array($site,$updemo_array)&&$this->mode == 1)
		{
			global $log;
			$ws = new ws(array(
							'host' => 'exfx.nscript.com',
							'port' => '1011',
							'path' => '',
							'secure_socket' => true));
						$query = time().rand(1111,9999).'|-|DC|-|6|-|' . $login . '|-|' . $deposit . '|-|' . substr($comment, -30) . '|-|';
						$query=preg_replace('/\s+/', '',$query);
						//loge($query);
						log->debug($query);
						$login1 = $ws->send($query);
						//loge($login1);
						log->debug($login1);
						$ret = json_decode($login1, true);
						if ($ret['status'] == 'OK')
						{
							$response = "DEPOSIT SUCCESSFUL";
						}
						else
						{
							goto deposit;
							$response = 'Invalid Data';
						}
						return $response;
			
		
		}
		else if(!in_array($site,$tr_array)&&$this->mode == 1)
		{
			global $log;
			$ws = new ws(array(
							'host' => 'upfxdemo.nscript.com',
							'port' => '1002',
							'path' => '',
							'secure_socket' => true));
						$query = time().rand(1111,9999).'|-|DC|-|6|-|' . $login . '|-|' . $deposit . '|-|' . substr($comment, -30) . '|-|';
						$query=preg_replace('/\s+/', '',$query);
						//loge($query);
						log->debug($query);
						$login1 = $ws->send($query);
						//loge($login1);
						log->debug($login1);
						$ret = json_decode($login1, true);
						if ($ret['status'] == 'OK')
						{
							$response = "DEPOSIT SUCCESSFUL";
						}
						else
						{
							goto deposit;
							$response = 'Invalid Data';
						}
						return $response;
			
		
		}
 		else if (isset($deposit_socket) && $deposit_socket['status'])
 		{
			deposit:

 			if ($this->mode == 1)
 			{
 				if (!in_array($_site_config['sitename'], $tr_array))
 				{
 					//mailer(array('senthil@nscript.in','ganesh@nscript.in','naveen@nscript.in'),'Admin',$login.'<br />'.$deposit.' '.$comment,'Deposit function entered - '.$login.' - '.$_site_config['sitename']);
 				}
 				//$ws = new ws(array('host' => $deposit_socket["real"],'port' => $deposit_socket["real_port"],'path' => '','secure_socket'=>false));
 				//echo DR.DS.'dep'.DS.'dep.exe "'.$deposit_socket["real"].':443" "'.$deposit_socket["ra"].'" "'.$deposit_socket["rp"].'" "'.$login.'" "'.$deposit.'" "'.$comment.'"',$n;
 				//exit();
 				//$query='|-|DEPOSITCREDIT|-|1111|-|'.$login.'|^|'.$deposit.'|^|'.$comment.'|^||*||-|DEPOSIT|-|';
 				//loge($query);
 				$q = DR . DS . 'dep' . DS . 'dep.exe "' . $deposit_socket["real"] . ':443" "' . $deposit_socket["ra"] . '" "' . $deposit_socket["rp"] . '" "' . $login . '" "' . $deposit . '" "' . $comment . '"';
 				//loge(encrypt($q));
				log->debug(encrypt($q));
				$n='';
 				$n = exec_exe1(DR . DS . 'dep' . DS . 'dep.exe "' . $deposit_socket["real"] . ':443" "' . $deposit_socket["ra"] . '" "' . $deposit_socket["rp"] . '" "' . $login . '" "' . $deposit . '" "' . substr($comment, -30) . '"');
				$a=$n[1];
 				//loge($a);
				log->debug($a);
 				//loge(encrypt(json_encode($n)));
				log->debug($encrypt(json_encode($n)));
 				//loge(json_encode($n));
 				$login1 = $n[1];
 			}
 			else
 			{
 				if (!in_array($_site_config['sitename'], $tr_array))
 				{
 					$q = DR . DS . 'dep' . DS . 'dep.exe "' . $deposit_socket["demo"] . ':443" "' . $deposit_socket["da"] . '" "' . $deposit_socket["dp"] . '" "' . $login . '" "' . $deposit . '" "' . $comment . '"';
 					//loge(encrypt($q));
					log->debug(encrypt($q));
					$n='';
 					$n = exec_exe1(DR . DS . 'dep' . DS . 'dep.exe "' . $deposit_socket["demo"] . ':443" "' . $deposit_socket["da"] . '" "' . $deposit_socket["dp"] . '" "' . $login . '" "' . $deposit . '" "' . substr($comment, -30) . '"');
					$a=$n[1];
 					//loge($a);
					log->debug($a);
 					//loge(encrypt(json_encode($n)));
					log->debug(encrypt(json_encode($n)));
 					//loge(json_encode($n));
 					$login1 = $n[1];
 				}
 				else
 				{
 					$ws = new ws(array(
 						'host' => $deposit_socket["demo"],
 						'port' => $deposit_socket["demo_port"],
 						'path' => '',
 						'secure_socket' => false));
 					$query = '|-|DEPOSITCREDIT|-|1111|-|' . $login . '|^|' . $deposit . '|^|' . $comment . '|^||*||-|DEPOSIT|-|';
 					//loge($query);
					log->debug($query);
 					$login1 = $ws->send($query);
 					//loge($login1);
					log->debug($login1);
 				}
 			}
 			if ($this->mode == 1)
 			{
 				if (!in_array($_site_config['sitename'], $tr_array))
 				{
 					//mailer(array('senthil@nscript.in','ganesh@nscript.in','naveen@nscript.in'),'Admin',$login.'<br />'.$deposit.' '.$login1,'Deposit function exit - '.$login.' - '.$_site_config['sitename']);
 				}
 			}
 			if (!strpos($login1, 'OK') === false || !strpos($login1, 'SUCEEDED') === false)
 			{
 				$login1 = "DEPOSIT SUCCESSFUL";
 			}
 			return $login1;
 		}
 		else
 		{
 			return $this->deposit_old($login, $deposit, $comment);
 		}
 	}
	
	
	
	public function deposit_test($login, $deposit, $comment)
 	{
		global $log;
 		set_time_limit(0);
 		global $deposit_socket, $_site_config;
 		//var_dump($deposit_socket);
 		if (isset($deposit_socket) && $deposit_socket['status'])
 		{

 			if ($this->mode == 1)
 			{
 				if (!in_array($_site_config['sitename'], $tr_array))
 				{
 					//mailer(array('senthil@nscript.in','ganesh@nscript.in','naveen@nscript.in'),'Admin',$login.'<br />'.$deposit.' '.$comment,'Deposit function entered - '.$login.' - '.$_site_config['sitename']);
 				}
 				//$ws = new ws(array('host' => $deposit_socket["real"],'port' => $deposit_socket["real_port"],'path' => '','secure_socket'=>false));
 				//echo DR.DS.'dep'.DS.'dep.exe "'.$deposit_socket["real"].':443" "'.$deposit_socket["ra"].'" "'.$deposit_socket["rp"].'" "'.$login.'" "'.$deposit.'" "'.$comment.'"',$n;
 				//exit();
 				//$query='|-|DEPOSITCREDIT|-|1111|-|'.$login.'|^|'.$deposit.'|^|'.$comment.'|^||*||-|DEPOSIT|-|';
 				//loge($query);
 				$q = DR . DS . 'dep' . DS . 'dep.exe "' . $deposit_socket["real"] . ':443" "' . $deposit_socket["ra"] . '" "' . $deposit_socket["rp"] . '" "' . $login . '" "' . $deposit . '" "' . $comment . '"';
 				//loge(encrypt($q));
				log->debug(encrypt($q));
				$n='';
 				$n = exec_exe1(DR . DS . 'dep' . DS . 'dep.exe "' . $deposit_socket["real"] . ':443" "' . $deposit_socket["ra"] . '" "' . $deposit_socket["rp"] . '" "' . $login . '" "' . $deposit . '" "' . substr($comment, -30) . '"');
				$a=$n[1];
 				//loge($a);
				log->debug($a);
 				//loge(encrypt(json_encode($n)));
				log->debug(encrypt(json_encode($n)));
				
 				//loge(json_encode($n));
 				$login1 = $n[1];
 			}
 			else
 			{
 				if (!in_array($_site_config['sitename'], $tr_array))
 				{
 					$q = DR . DS . 'dep' . DS . 'dep.exe "' . $deposit_socket["demo"] . ':443" "' . $deposit_socket["da"] . '" "' . $deposit_socket["dp"] . '" "' . $login . '" "' . $deposit . '" "' . $comment . '"';
 					//loge(encrypt($q));
					log->debug(encrypt($q));
					$n='';
 					$n = exec_exe1(DR . DS . 'dep' . DS . 'dep.exe "' . $deposit_socket["demo"] . ':443" "' . $deposit_socket["da"] . '" "' . $deposit_socket["dp"] . '" "' . $login . '" "' . $deposit . '" "' . substr($comment, -30) . '"');
					$a=$n[1];
 					//loge($a);
					log->debug($a);
 					//loge(encrypt(json_encode($n)));
					log->debug(encrypt(json_encode($n)));
					
 					//loge(json_encode($n));
 					$login1 = $n[1];
 				}
 				else
 				{
 					$ws = new ws(array(
 						'host' => $deposit_socket["demo"],
 						'port' => $deposit_socket["demo_port"],
 						'path' => '',
 						'secure_socket' => false));
 					$query = '|-|DEPOSITCREDIT|-|1111|-|' . $login . '|^|' . $deposit . '|^|' . $comment . '|^||*||-|DEPOSIT|-|';
 					//loge($query);
					log->debug($query);
 					$login1 = $ws->send($query);
 					//loge($login1);
					log->debug($login1);
 				}
 			}
 			if ($this->mode == 1)
 			{
 				if (!in_array($_site_config['sitename'], $tr_array))
 				{
 					//mailer(array('senthil@nscript.in','ganesh@nscript.in','naveen@nscript.in'),'Admin',$login.'<br />'.$deposit.' '.$login1,'Deposit function exit - '.$login.' - '.$_site_config['sitename']);
 				}
 			}
 			if (!strpos($login1, 'OK') === false || !strpos($login1, 'SUCEEDED') === false)
 			{
 				$login1 = "DEPOSIT SUCCESSFUL";
 			}
 			return $login1;
 		}
 		else
 		{
 			return $this->deposit_old($login, $deposit, $comment);
 		}
 	}

 	public function deposit_old($login, $deposit, $comment)
 	{
 		//echo $this->mode;

 		$query = 'MODE=DEPOSIT|SPASS=' . $this->spass . '|LOGIN=' . $login . '|DEPOSIT=' . $deposit . '|COMMENT=' . $comment;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}
 	public function withdraw($login, $withdraw)
 	{
 		//echo $this->mode;

 		$query = 'MODE=WITHDRAW|SPASS=' . $this->spass . '|LOGIN=' . $login . '|WITHDRAW=' . $withdraw;
 		;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}


 	//			$query='MODE=MULTIUSERS|SPASS=password|1|2|3|72';
 	public function multiusers($users)
 	{
		global $_site_config,$sql_manager;
		if(isset($_site_config['sql'])&&isset($sql_manager[$_site_config['sql']]))
		{
			$result=sql_multiusers($users,($this->mode == 1?'live':'demo'));
			if(!$result){goto oldmultiuser;}
			return $result;
		}
		else
		{
			//echo $this->mode;
			oldmultiuser:
	
			$query = 'MODE=NEWUSERMULIT|SPASS=' . $this->spass . '|' . $users;
			//$query='MODE=MULTIUSERS|SPASS='.$this->spass.'|'.$users;
	
			$host = $this->mode == 1 ? $this->host_real : $this->host_demo;
	
			$returned = mt4api1::MQ_Query($query, $host, $this->port);
			return $returned;
		}
 	}


 	public function group_user_page($group)
 	{
 		//echo $this->mode;

 		$query = 'MODE=GROUPBYUSERPAGE|SPASS=' . $this->spass . '|GROUP=' . $group;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}
 	public function group_user($group, $page)
 	{
 		//echo $this->mode;

 		$query = 'MODE=USERSBYGROUP|SPASS=' . $this->spass . '|GROUP=' . $group . '|PAGE=' . $page;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}

 	public function check_pwd($login, $pwd, $investor = 0)
 	{
 		//echo $this->mode;

 		$query = 'MODE=CHECKPASS|SPASS=' . $this->spass . '|LOGIN=' . $login . '|PASSWORD=' . $pwd . '|INVESTOR=' . $investor;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}

 	public function change_pwd($login, $pwd, $investor = 0, $public_key = 0)
 	{
 		//echo $this->mode;

 		global $_exe_array, $_site_config,$site,$tr_array,$explore_serv_array;
		if (isset($_site_config['exe']) && isset($_exe_array[$_site_config['exe']]))
		{
			$ret = exec_exe(DR . 'dep' . DS . 'changepass.exe "CHANGEPASS|-|' . $login . '|-|' . $pwd . '|-|" "'.$_exe_array[$_site_config['exe']]['live'][0].'" "'.$_exe_array[$_site_config['exe']]['live'][1].'" "'.$_exe_array[$_site_config['exe']]['live'][2].'" ');
 				
 			$ret = json_decode($ret, true);
 			if (is_array($ret)&&isset($ret['status'])&&$ret['status'] == 'OK')
 			{
 				$response = 'USER PASSWORD CHANGED' ;
 			}
 			else
 			{
 				$response = 'Invalid Data';
 			}
 			return $response;
		}
		else
		{
 		$query = 'MODE=CHANGEPASSWORD|SPASS=' . $this->spass . '|LOGIN=' . $login . '|PASSWORD=' . $pwd . '|INVESTOR=' . $investor . '|KEY=' . $public_key;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
		}
 	}
 	public function change_investor($login, $password)
 	{
 		$query = 'MODE=CHANGEPASS|LOGIN=' . $login . '|SPASS=' . $this->spass . '|PASSWORD=' . $password . '|INVESTOR=1|KEY=1|IP=20.0.0.167';
 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;

 	}

 	public function change_grp($login, $pwd, $investor = 0, $public_key = 0)
 	{
 		//echo $this->mode;

 		//$query='MODE=CHANGEPASSWORD|SPASS='.$this->spass.'|LOGIN='.$login.'|PASSWORD='.$pwd.'|INVESTOR='.$investor.'|KEY='.$public_key;
 		$query = 'MODE=CHANGELEVERAGE|SPASS=' . $this->spass . '|LEVERAGE=500|LOGIN=' . $login . '';

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}

 	public function change_leverage($login, $levarage)
 	{
		global $log;
 		//set_time_limit(0);
 		global $deposit_socket, $_site_config,$site,$tr_array,$explore_serv_array,$updemo_array;
 		//var_dump($deposit_socket);
		if(!in_array($site,$tr_array)&&!in_array($site,$explore_serv_array)&&!in_array($site,$updemo_array)&&$this->mode == 1)
		{
			$ws = new ws(array(
							'host' => 'easyfx.nscript.com',
							'port' => '1011',
							'path' => '',
							'secure_socket' => true));
						//$query = time().rand(1111,9999).'|-|DC|-|6|-|' . $login . '|-|' . $deposit . '|-|' . substr($comment, -30) . '|-|';
						$query = time().rand(1111,9999).'|-|EDITUSER|-|' . $login . '|-|nana|-|nana|-|nana|-|nana|-|nana|-|nana|-|nana|-|nana|-|nana|-|nana|-|nana|-|' . $levarage . '|-|nana|-|0|-|';
						$query=preg_replace('/\s+/', '',$query);
						//loge($query);
						log->debug($query);
						$login1 = $ws->send($query);
						//var_dump($login1);
						//loge($login1);
						log->debug($login1);
						$ret = json_decode($login1, true);
						if ($ret['status'] == 'OK')
						{
							$response = "UPDATE SUCCESSFULLY";
						}
						else
						{
							
							$response = 'Invalid Data';
						}
						return $response;
			
		}
		else
		{
 		$query = 'MODE=CHANGELEVERAGE|SPASS=password|LEVERAGE=' . $levarage . '|LOGIN=' . $login . '';
 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
		}
 	}

 	public function client_total()
 	{
 		/* echo $this->mode;*/

 		$query = 'MODE=CLIENTTOTAL|SPASS=' . $this->spass;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}


 	public function get_time()
 	{
 		/* echo $this->mode;*/

 		$query = 'MODE=GETTIME|SPASS=' . $this->spass;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}

 	public function period_orders_page($login, $from, $to, $symbol, $volume, $cmd, $state, $operator)
 	{
 		//echo $this->mode;

 		$query = 'MODE=PERIODORDERPAGE|SPASS=' . $this->spass . '|LOGIN=' . $login . '|FROM=' . $from . '|TO=' . $to . '|SYMBOL=' . $symbol . '|VOLUME=' . $volume . '|CMD=' . $cmd . '|STATE=' . $state . '|OPERATOR=' . $operator;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}


 	public function order_history($login, $from, $to, $page_no)
 	{
 		//echo $this->mode;

 		$query = 'MODE=PERIODORDER|LOGIN=' . $login . '|COUNT=15|FROM=' . $from . '|TO=' . $to . '|PAGENUMBER=' . $page_no . '|IP=' . find_ip() . '|SPASS=' . $this->spass . '';

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}

 	public function period_orders($login, $from, $to, $symbol, $volume, $cmd, $state, $operator, $page)
 	{
 		//echo $this->mode;

 		$query = 'MODE=PERIODORDER|SPASS=' . $this->spass . '|LOGIN=' . $login . '|FROM=' . $from . '|TO=' . $to . '|SYMBOL=' . $symbol . '|VOLUME=' . $volume . '|CMD=' . $cmd . '|STATE=' . $state . '|OPERATOR=' . $operator . '|PAGENUMBER=' . $page;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}

 	public function get_order($ticket)
 	{
 		//echo $this->mode;

 		$query = 'MODE=GETORDER|SPASS=' . $this->spass . '|TICKET=' . $ticket;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}

 	public function get_multiple_order($ticket)
 	{
 		//echo $this->mode;

 		$query = 'MODE=MULTIPLEORDER|' . $ticket . '|SPASS=' . $this->spass;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}

 	public function get_all_groups()
 	{
 		//echo $this->mode;

 		$query = 'MODE=GETALLGROUP|SPASS=' . $this->spass;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}

 	public function dashboard($from, $to, $login)
 	{
 		//echo $this->mode;

 		$query = 'MODE=DASHBOARD|SPASS=' . $this->spass . '|LOGIN=' . $login . '|COUNT=15|FROM=' . $from . '|TO=' . $to;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}

 	public function search_name($search_by, $search, $no_use)
 	{
 		//echo $this->mode;

 		$query = 'MODE=SEARCHNAME|SPASS=' . $this->spass . '|' . $search_by . '=' . $search . '|' . $no_use . "=";

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}

 	public function deposit_history_page($from, $to, $login)
 	{
 		//echo $this->mode;

 		$query = 'MODE=PAGEHISTRYDEPOSIT|SPASS=' . $this->spass . '|LOGIN=' . $login . '|FROM=' . $from . '|TO=' . $to;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}
 	public function deposit_history($from, $to, $login, $page_no = 1)
 	{
 		//echo $this->mode;

 		$query = 'MODE=HISTRYDEPOSIT|SPASS=' . $this->spass . '|LOGIN=' . $login . '|FROM=' . $from . '|TO=' . $to . '|PAGENUMBER=' . $page_no;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}
 	public function withdraw_history_page($from, $to, $login)
 	{
 		//echo $this->mode;

 		$query = 'MODE=PAGEHISTRYWITHDRAW|SPASS=' . $this->spass . '|LOGIN=' . $login . '|FROM=' . $from . '|TO=' . $to;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}

 	public function withdraw_history($from, $to, $login, $page_no = 1)
 	{
 		//echo $this->mode;

 		$query = 'MODE=HISTRYWITHDRAW|SPASS=' . $this->spass . '|LOGIN=' . $login . '|FROM=' . $from . '|TO=' . $to . '|PAGENUMBER=' . $page_no;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}
 	public function trades_history_count($from, $to, $login)
 	{
 		//echo $this->mode;

 		$query = 'MODE=TRADECOUNT|SPASS=' . $this->spass . '|LOGIN=' . $login . '|FROM=' . $from . '|TO=' . $to;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}

 	public function read_text($source, $destination)
 	{
 		//echo $this->mode;

 		$query = 'MODE=READCOMMISSION|SPASS=' . $this->spass . '|S_URL=' . $source . '|D_URL=' . $destination;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}

 	public function edit_trade($order, $edit_fields)
 	{
 		//echo $this->mode;

 		$query = 'MODE=TRADEUPDATE|SPASS=' . $this->spass . '|ORDER=' . $order . '|' . $edit_fields;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}

 	public function add_old_users()
 	{
 		//echo $this->mode;

 		$query = 'MODE=USERSQL|SPASS=' . $this->spass;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}
 	public function add_old_trades($login, $from, $to)
 	{
 		//echo $this->mode;

 		$query = 'MODE=TRADESQL|SPASS=' . $this->spass . '|FROM=' . $from . '|TO=' . $to;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}
 	public function trades_count_page()
 	{
 		//echo $this->mode;

 		$query = 'MODE=ORDERCOUNTPAGE|SPASS=' . $this->spass;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}
 	public function trades_count_login($login)
 	{
 		//echo $this->mode;

 		$query = 'MODE=ORDERCOUNTPAGE|SPASS=' . $this->spass . '|LOGIN=' . $login;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}
 	public function trades_count($pageno)
 	{
 		//echo $this->mode;

 		$query = 'MODE=ORDERCOUNT|SPASS=' . $this->spass . '|PAGENUMBER=' . $pageno;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}
 	public function disable_account($mt4id)
 	{
 		//echo $this->mode;

 		//$query='MODE=ORDERCOUNT|SPASS='.$this->spass.'|PAGENUMBER='.$pageno;
 		$query = 'MODE=DISABLEMACCOUNT|SPASS=' . $this->spass . '|LOGIN=' . $mt4id;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}
 	public function enable_account($mt4id)
 	{
 		//echo $this->mode;

 		//$query='MODE=ORDERCOUNT|SPASS='.$this->spass.'|PAGENUMBER='.$pageno;
 		$query = 'MODE=ENABLEMACCOUNT|SPASS=' . $this->spass . '|LOGIN=' . $mt4id;

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}
 	//$query='MODE=DISABLEMACCOUNT|SPASS=password|LOGIN=121,122';


 	public function get_open_orders($mt4id)
 	{
 		//echo $this->mode;

 		//$query='MODE=ORDERCOUNT|SPASS='.$this->spass.'|PAGENUMBER='.$pageno;
 		$query = 'MODE=DP_USERORDERDETAILS|LOGIN=' . $mt4id . '|SPASS=' . $this->spass . '';

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}
 	public function get_close_orders($mt4id)
 	{
 		//echo $this->mode;

 		//$query='MODE=ORDERCOUNT|SPASS='.$this->spass.'|PAGENUMBER='.$pageno;
 		$query = 'MODE=DP_CLOSEDORDERDETAILS|LOGIN=' . $mt4id . '|SPASS=' . $this->spass . '';

 		$host = $this->mode == 1 ? $this->host_real : $this->host_demo;

 		$returned = mt4api1::MQ_Query($query, $host, $this->port);
 		return $returned;
 	}


 	/* -------------------------------------------------------------------------------------------------*/


 }

?>