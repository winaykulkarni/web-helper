  <?php
  
  Public function truncate_number( $number, $precision = 2) {
      // Zero causes issues, and no need to truncate
      if ( 0 == (int)$number ) {
          return $number;
      }
      // Are we negative?
      $negative = $number / abs($number);
      // Cast the number to a positive to solve rounding
      $number = abs($number);
      // Calculate precision number for dividing / multiplying
      $precision = pow(10, $precision);
      // Run the math, re-applying the negative value to ensure returns correctly negative / positive
      return floor( $number * $precision ) / $precision * $negative;
  }

	Public function generateRandomString($length = 10,$alphanumeric = true) {
    if($alphanumeric){
		  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    } else {
      $characters = '0123456789';
    } // End of If Else
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
  Public function load_global_settings(){
    $globalSettingsArray = $this->db->get("global_settings")->row();
    return $globalSettingsArray;
  }

	Public function get_client_ip()
     {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
          $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
          $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
          $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
          $ipaddress = getenv('REMOTE_ADDR');
        else
          $ipaddress = 'UNKNOWN';
        
        return $ipaddress;
     }

      Public function alert($string){ ?>
      <script>
        function decodeEntities(encodedString) {
            var textArea = document.createElement('textarea');
            textArea.innerHTML = encodedString;
            return textArea.value;
        }            
        var phpString = "<?php echo htmlentities($string); ?>";
        alert(decodeEntities(phpString));
      </script>
      <?php 
      }  
