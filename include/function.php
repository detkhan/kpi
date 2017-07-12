<?php
function start_session()
{
	ini_set('session.gc_maxlifetime', 28800); // 8 Hour
	ini_set('session.gc_divisor', 1);
	@session_start();
}

function regiser_session($arr_session)
{
	foreach($arr_session as $k=>$v)
	{
		$_SESSION[$k]=$v;
	}
}

function destroy_session()
{
	start_session();
	session_unset();
	session_destroy();
}

function check_session()
{
	start_session();
	if($_SESSION["mysession_start"]!="yes")
	{
		?>
		<SCRIPT LANGUAGE="Javascript">
		alert("กรุณาเข้าระบบใหม่อีกครั้ง");
		history.back();
		</SCRIPT>
		<?php
		exit();
	}
}

function setpagecounter($url) {
	$nowdate = date('Y-m-d H:i:s');
	$sql = "SELECT ip,date from pagecounter where url='$url' and ip='$_SERVER[REMOTE_ADDR]' and timediff('$nowdate',date) < '03:00:00' ";
	$query = mysql_query($sql) or die ("ไม่สามารถ Query ข้อมูลได้ 101");
	if (mysql_num_rows($query)==0)
	{
		$strSQL = "INSERT INTO pagecounter (url, ip) VALUES ('$url','$_SERVER[REMOTE_ADDR]') ";
		$objQuery = mysql_query($strSQL);
	}
}

function getpagecounter($url) {
	setpagecounter($url);
	$sql = "SELECT count(*) as count from pagecounter where url='$url' ";
	$query = mysql_query($sql) or die ("ไม่สามารถ Query ข้อมูลได้ 102");
	$row = mysql_fetch_array($query);
	if (mysql_num_rows($query)>0)
	{
		return $row["count"];
	}
	else
	{
		return "0";
	}
}

function viewbox()
{
	include_once('gaapi.class.php');
	$ga=new gaApi('mscis.jin@gmail.com','46044273','ga:53006137');
	$allTimeSummery=$ga->getSummery('2011-11-01',date("Y-m-d"));


	?>
	<link rel="stylesheet" type="text/css" href="css/viewbox/style.css" media="screen"/><?php

	/*เขียนเอง
	$sql = "SELECT count(Distinct ip,substr(date,1,10)) as count FROM `pagecounter`";
	$query = mysql_query($sql) or die ("ไม่สามารถ Query ข้อมูลได้ 102");
	$row = mysql_fetch_array($query);
	*/
	//$row["count"]+262 เอาตัวนี้แสดง
	?>
		<div class="view_counter_box right2"><?=$allTimeSummery['ga:visits']?><img src="css/viewbox/images/arrow_box_del.png" class="view_button_arrow_box"></div>
		<a title="Google Analytics: Visits"><div class="view_button_box right2">Visits</div></a>

		<div class="view_counter_box right3"><?=$allTimeSummery['ga:pageviews']?><img src="css/viewbox/images/arrow_box_del.png" class="view_button_arrow_box"></div>
		<a title="Google Analytics: Pageviews"><div class="view_button_box right3">Page</div></a>
	<?php
}

function pdf($orientation,$margin,$topic,$header,$table,$data,$output,$path) {
	require_once($path.'fpdf16/fpdf.php');
    $pdf=new FPDF( $orientation , 'mm' , 'A4' );
	$pdf->SetLeftMargin($margin);
	$pdf->AddFont('angsana','','angsa.php');
	$pdf->AddFont('angsana','B','angsab.php');
	$pdf->AddPage($orientation);
	$pdf->SetFont('angsana','B',16);
	
	$pdf->Cell(0,10,iconv( 'UTF-8','cp874',$topic),0,1);
	$data=$pdf->LoadData($data);
	if ($table == "Table4colL")
		$pdf->Table4colL($header,$data);
	else
	if ($table == "Table5col")
		$pdf->Table5col($header,$data);
	else
	if ($table == "Table8col")
		$pdf->Table8col($header,$data);

	$pdf->Output($output,"F");
	$pdf->Close();
}

function pdfProduct($orientation,$margin,$topic,$header,$table,$data,$output,$path,$pic,$qrcode) {
	//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
	require_once($path.'fpdf16/fpdf.php');
    $pdf=new FPDF( $orientation , 'mm' , 'A4' );
	$pdf->SetLeftMargin($margin);
	$pdf->AddFont('angsana','','angsa.php');
	$pdf->AddFont('angsana','B','angsab.php');
	$pdf->AddPage($orientation);

	$topic = explode("|", $topic);
	$pdf->SetFont('angsana','B',36);
	$pdf->Cell(0,10,iconv( 'UTF-8','cp874',$topic[0]),0,1);
	$pdf->SetFont('angsana','B',16);
	$pdf->Cell(0,10,iconv( 'UTF-8','cp874',$topic[1]),0,1);

	$pdf->Cell(0,6,iconv( 'UTF-8','cp874' ,''),'T',0,'L',false); // ขีดเล้น
	$pdf->Ln();
	
	$pdf->Image($path.$pic,65,35,0,70,'',''); //Image($file, $x=null, $y=null, $w=0, $h=0, $type='', $link='')
	$pdf->Image($path.$qrcode,175,12,0,25,'','');
	$pdf->SetFont('angsana','',11);
	$pdf->SetXY(177, 35);
	$pdf->Cell(1,5,'Request Quotation');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();

	$data=$pdf->LoadData($data);
	foreach($data as $row)
	{
		$pdf->SetFont('angsa','',16);
		$pdf->Cell(0,6,iconv( 'UTF-8','cp874' ,$row[0]),'',0,'L',false);
		$pdf->Ln();
	}

	$pdf->InFooter=true;
	$pdf->FooterEsco();
	$pdf->InFooter=false;
	$pdf->Output($output,"F");
	$pdf->Close();
}

function DateDiff($strDate1,$strDate2)
 {
			return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
 }
 function TimeDiff($strTime1,$strTime2)
 {
			return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
 }
 function DateTimeDiff($strDateTime1,$strDateTime2)
 {
			return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
 }

function change_date_format($date,$oldformat,$newformat,$olddelimited,$newdelimited) // (2008/01/20,ymd,dmy,/,-)
{
	$arr = split("$olddelimited",$date);
	switch($oldformat)
	{
		case "ymd": $arr2 = array("y"=>$arr[0],"m"=>$arr[1],"d"=>$arr[2]); break;
		case "dmy": $arr2 = array("d"=>$arr[0],"m"=>$arr[1],"y"=>$arr[2]); break;
	}

	switch($newformat)
	{
		case "ymd": $newdate=$arr2[y].$newdelimited.$arr2[m].$newdelimited.$arr2[d]; break;
		case "dmy": $newdate=$arr2[d].$newdelimited.$arr2[m].$newdelimited.$arr2[y]; break;
	}
	return $newdate;
}

function check_admin()
{
	start_session();
	if($_SESSION["mysession_accLevel"]!="admin")
	{
		?>
		<SCRIPT LANGUAGE="Javascript">
		alert("ขออภัย! คุณไม่มีสิทธิ์เข้าถึงหน้านี้ค่ะ");
		window.location="http://www.escopremium.com";
		</SCRIPT>
		<?php
		exit();
	}
}

function check_customer()
{
	start_session();
	if (($_SESSION["mysession_accLevel"]=="customer") or ($_SESSION["mysession_accLevel"]==""))
	{
		?>
		<SCRIPT LANGUAGE="Javascript">
		alert("ขออภัย! คุณไม่มีสิทธิ์เข้าถึงหน้านี้ค่ะ");
		window.location="http://www.escopremium.com";
		</SCRIPT>
		<?php
		exit();
	}
}

function check_sales()
{
	start_session();
	if (($_SESSION["mysession_accLevel"]!="saler") and ($_SESSION["mysession_accLevel"]!="sm") and ($_SESSION["mysession_accLevel"]!="boss"))
	{
		?>
		<SCRIPT LANGUAGE="Javascript">
		alert("ขออภัย! คุณไม่มีสิทธิ์เข้าถึงหน้านี้ค่ะ");
		window.location="http://www.escopremium.com";
		</SCRIPT>
		<?php
		exit();
	}
}

function check_sm_boss()
{
	start_session();
	if (($_SESSION["mysession_accLevel"]!="sm") and ($_SESSION["mysession_accLevel"]!="boss"))
	{
		?>
		<SCRIPT LANGUAGE="Javascript">
		alert("ขออภัย! คุณไม่มีสิทธิ์เข้าถึงหน้านี้ค่ะ");
		window.location="http://www.escopremium.com";
		</SCRIPT>
		<?php
		exit();
	}
}

function br2nl($string)
{
    //return replace('/\<br(\s*)?\/?\>/i', "\n", $string);
	return str_replace("<br />", "\n", $string);
} 

	/* =Time&Date Config
-------------------------------------------------------------- */
$SuffixTime = array(
	"th"=>array(
		"time"=>array(
			"Seconds"			=>		" วินาทีที่แล้ว",
			"Minutes"				=>		" นาทีที่แล้ว",
			"Hours"					=>		" ชั่วโมงที่แล้ว"
		),
		"day"=>array(
			"Yesterday"		=>		"เมื่อวาน เวลา ",
			"Monday"				=>		"เมื่อวันจันทร์ที่ผ่านมา เวลา ",
			"Tuesday"			=>		"เมื่อวันอังคารที่ผ่านมา เวลา ",
			"Wednesday"	=>		"เมื่อวันพุธที่ผ่านมา เวลา ",
			"Thursday"			=>		"เมื่อวันพฤหัสบดีที่ผ่านมา เวลา ",
			"Friday"				=>		"เมื่อวันศุกร์ที่ผ่านมา เวลา ",
			"Saturday"			=>		"เมื่อวันวันเสาร์ที่ผ่านมา เวลา ",
			"Sunday"				=>		"เมื่อวันอาทิตย์ที่ผ่านมา เวลา ",
		)
	),
	"en"=>array(
		"time"=>array(
			"Seconds"				=>		" seconds ago",
			"Minutes"				=>		" minutes ago",
			"Hours"					=>		" hours ago"
		),
		"day"=>array(
			"Yesterday"		=>		"Yesterday at ",
			"Monday"				=>		"Monday at ",
			"Tuesday"			=>		"Tuesday at ",
			"Wednesday"	=>		"Wednesday at ",
			"Thursday"			=>		"Thursday at ",
			"Friday"				=>		"Friday at ",
			"Saturday"			=>		"Saturday at ",
			"Sunday"				=>		"Sunday at ",
		)
	)
);

$DateThai = array(
	// Day
	"l" => array(	// Full day
		"Monday"				=>		"วันจันทร์",
		"Tuesday"			=>		"วันอังคาร",
		"Wednesday"	=>		"วันพุธ",
		"Thursday"			=>		"วันพฤหัสบดี",
		"Friday"				=>		"วันศุกร์",
		"Saturday"			=>		"วันวันเสาร์",
		"Sunday"				=>		"วันอาทิตย์",
	),
	"D" => array(	// Abbreviated day
		"Monday"				=>		"จันทร์",
		"Tuesday"			=>		"อังคาร",
		"Wednesday"	=>		"พุธ",
		"Thursday"			=>		"พฤหัส",
		"Friday"				=>		"ศุกร์",
		"Saturday"			=>		"วันเสาร์",
		"Sunday"				=>		"อาทิตย์",
	),
	
	// Month
	"F" => array(	// Full month
		"January"				=>		"มกราคม",
		"February"			=>		"กุมภาพันธ์",
		"March"					=>		"มีนาคม",
		"April"					=>		"เมษายน",
		"May"					=>		"พฤษภาคม",
		"June"					=>		"มิถุนายน",
		"July"						=>		"กรกฎาคม",
		"August"				=>		"สิงหาคม",
		"September"		=>		"กันยายน",
		"October"				=>		"ตุลาคม",
		"November"		=>		"พฤศจิกายน",
		"December"		=>		"ธันวาคม"
	),
	"M" => array(	// Abbreviated month
		"January"				=>		"ม.ค.",
		"February"			=>		"ก.พ.",
		"March"					=>		"มี.ค.",
		"April"					=>		"เม.ย.",
		"May"					=>		"พ.ค.",
		"June"					=>		"มิ.ย.",
		"July"						=>		"ก.ค.",
		"August"				=>		"ส.ค.",
		"September"		=>		"ก.ย.",
		"October"				=>		"ต.ค.",
		"November"		=>		"พ.ย.",
		"December"		=>		"ธ.ค."
	)
);
/* =Time&Date Config
-------------------------------------------------------------- */
function generate_date_today($Format, $Timestamp, $Language = "en", $TimeText = true )
{

	global $SuffixTime, $DateThai;
	//return date("i:H d-m-Y", $Timestamp) ." | ". date("i:H d-m-Y", time());
	if( date("Ymd", $Timestamp) >= date("Ymd", (time()-345600)) && $TimeText)				// Less than 3 days.
	{
		$TimeStampAgo = (time()-$Timestamp);
		
		if(($TimeStampAgo < 86400))			// Less than 1 day.
		{
			
			$TimeDay = "time";				// Use array time
			
			if($TimeStampAgo < 60)				// Less than 1 minute.
			{
				$Return = (time() - $Timestamp);
				$Values = "Seconds";
			}
			else if($TimeStampAgo < 3600)			// Less than 1 hour.
			{
				$Return = floor( (time() - $Timestamp)/60 );
				$Values = "Minutes";
			}
			else			// Less than 1 day.
			{
				$Return = floor( (time() - $Timestamp)/3600 );
				$Values = "Hours";
			}
			
		}
		else if($TimeStampAgo < 172800)			// Less than 2 day.
		{
			$Return = date("H:i", $Timestamp);
			$TimeDay = "day";
			$Values = "Yesterday";
		}
		else		// More than 2 hours..
		{
			$Return = date("H:i", $Timestamp);
			$TimeDay = "day";
			$Values = date("l", $Timestamp);
		}
		
		if($TimeDay == "time")
			$Return .= $SuffixTime[$Language][$TimeDay][$Values];
		else if($TimeDay == "day")
			$Return = $SuffixTime[$Language][$TimeDay][$Values] . $Return;
		
		return $Return;
	}
	else
	{
		if($Language == "en")
		{
			return date($Format, $Timestamp);
		}
		else if($Language == "th")
		{
			$Format = str_replace("l", "|1|", $Format);
			$Format = str_replace("D", "|2|", $Format);
			$Format = str_replace("F", "|3|", $Format);
			$Format = str_replace("M", "|4|", $Format);
			$Format = str_replace("y", "|x|", $Format);
			$Format = str_replace("Y", "|X|", $Format);

			$DateCache = date($Format, $Timestamp);
			
			$AR1 = array ("", "l", "D", "F", "M");
			$AR2 = array ("", "l", "l", "F", "F");
			
			for($i=1; $i<=4; $i++)
			{
				if(strstr($DateCache, "|". $i ."|"))
				{
					//$Return .= $i;
					
					$split = explode("|". $i ."|", $DateCache); 
					for($j=0; $j<count($split)-1; $j++)
					{
						$StrCache .= $split[$j];
						$StrCache .= $DateThai[$AR1[$i]][date($AR2[$i], $Timestamp)];
					}
					$StrCache .= $split[count($split)-1];
					$DateCache = $StrCache;
					$StrCache = "";
					empty($split);
				}
			}
			
			if(strstr($DateCache, "|x|"))
				{
					
					$split = explode("|x|", $DateCache); 
					
					for($i=0; $i<count($split)-1; $i++)
					{
						$StrCache .= $split[$i];
						$StrCache .= substr((date("Y", $Timestamp)+543), -2);
					}
					$StrCache .= $split[count($split)-1];
					$DateCache = $StrCache;
					$StrCache = "";
					empty($split);
				}

			if(strstr($DateCache, "|X|"))
				{
					
					$split = explode("|X|", $DateCache); 
					
					for($i=0; $i<count($split)-1; $i++)
					{
						$StrCache .= $split[$i];
						$StrCache .= (date("Y", $Timestamp)+543);
					}
					$StrCache .= $split[count($split)-1];
					$DateCache = $StrCache;
					$StrCache = "";
					empty($split);
				}

				$Return = $DateCache;
				
			return $Return;
		}
	}
}

function dateTH($prefix,$value){
$DateThai = array(
	// Day
	"l" => array(	// Full day
		"Monday"				=>		"วันจันทร์",
		"Tuesday"			=>		"วันอังคาร",
		"Wednesday"	=>		"วันพุธ",
		"Thursday"			=>		"วันพฤหัสบดี",
		"Friday"				=>		"วันศุกร์",
		"Saturday"			=>		"วันวันเสาร์",
		"Sunday"				=>		"วันอาทิตย์",
	),
	"D" => array(	// Abbreviated day
		"Monday"				=>		"จันทร์",
		"Tuesday"			=>		"อังคาร",
		"Wednesday"	=>		"พุธ",
		"Thursday"			=>		"พฤหัส",
		"Friday"				=>		"ศุกร์",
		"Saturday"			=>		"วันเสาร์",
		"Sunday"				=>		"อาทิตย์",
	),
	
	// Month
	"F" => array(	// Full month
		"January"				=>		"มกราคม",
		"February"			=>		"กุมภาพันธ์",
		"March"					=>		"มีนาคม",
		"April"					=>		"เมษายน",
		"May"					=>		"พฤษภาคม",
		"June"					=>		"มิถุนายน",
		"July"						=>		"กรกฎาคม",
		"August"				=>		"สิงหาคม",
		"September"		=>		"กันยายน",
		"October"				=>		"ตุลาคม",
		"November"		=>		"พฤศจิกายน",
		"December"		=>		"ธันวาคม"
	),
	"M" => array(	// Abbreviated month
		"January"				=>		"ม.ค.",
		"February"			=>		"ก.พ.",
		"March"					=>		"มี.ค.",
		"April"					=>		"เม.ย.",
		"May"					=>		"พ.ค.",
		"June"					=>		"มิ.ย.",
		"July"						=>		"ก.ค.",
		"August"				=>		"ส.ค.",
		"September"		=>		"ก.ย.",
		"October"				=>		"ต.ค.",
		"November"		=>		"พ.ย.",
		"December"		=>		"ธ.ค."
	),
	"N" => array(	// Full month
		"01"				=>		"มกราคม",
		"02"			=>		"กุมภาพันธ์",
		"03"					=>		"มีนาคม",
		"04"					=>		"เมษายน",
		"05"					=>		"พฤษภาคม",
		"06"					=>		"มิถุนายน",
		"07"						=>		"กรกฎาคม",
		"08"				=>		"สิงหาคม",
		"09"		=>		"กันยายน",
		"10"				=>		"ตุลาคม",
		"11"		=>		"พฤศจิกายน",
		"12"		=>		"ธันวาคม"
	),
	"n" => array(	// Full month
		"1"				=>		"มกราคม",
		"2"			=>		"กุมภาพันธ์",
		"3"					=>		"มีนาคม",
		"4"					=>		"เมษายน",
		"5"					=>		"พฤษภาคม",
		"6"					=>		"มิถุนายน",
		"7"						=>		"กรกฎาคม",
		"8"				=>		"สิงหาคม",
		"9"		=>		"กันยายน",
		"10"				=>		"ตุลาคม",
		"11"		=>		"พฤศจิกายน",
		"12"		=>		"ธันวาคม"
	)
);

	return $DateThai[$prefix][$value];
}


function sendsms($message,$msisdn)
{
	include("function-sms.php");

	$username = "escopremium";
	$password = "Esco3637666";
	$sender = "Escopremium";

	$url = "http://www.thaibulksms.com/sms_api.php";
	$data_string = "username=$username&password=$password&msisdn=$msisdn&message=$message&sender=$sender";

	$agent = "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4) Gecko/20030624 Netscape/7.1 (ax)";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERAGENT, $agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
	$result = curl_exec ($ch);
	curl_close ($ch);


	$xml = xml($result);
	$count = count($xml['SMS']['QUEUE']);
	if($count > 0){
		$count_pass = 0;
		$count_fail = 0;
		$used_credit = 0;
		for($i=0;$i<$count;$i++){
			if($xml['SMS']['QUEUE'][$i]['Status']){	
				$count_pass++;	
				$used_credit += 				
				$xml['SMS']['QUEUE'][$i]['UsedCredit'];
				}else{						
				$count_fail++; 
			}
		}
		if($count_pass > 0){return true;} 				
		if($count_fail > 0){return false;}
	}else{
		return false;
	}
}

function mobileOnly(){

	$useragent = $_SERVER['HTTP_USER_AGENT'];

	if(preg_match('/android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
	{
		return true;
	}
	else
	{?>
		<SCRIPT LANGUAGE="Javascript">
			alert("เพจนี้จำกัดการเข้าชมด้วยอุปกรณ์เคลื่อนที่เท่านั้น");
		</SCRIPT>
	<?php
		exit();
	}

}



function productSlideBar($id)
{
	echo "<br>";
	$sTypeId = $id;
	$numShow = 6;
	unset($arrProductsPic,$arrProductsName,$arrProductsCode);

	$qproductsPromote = mysql_query("SELECT p.pId,p.pCode,if (CHAR_LENGTH(p.pNameTh)>25,CONCAT(SUBSTR(p.pNameTh,1,25),'...'),p.pNameTh) as pNameThSubstr,p.pNameTh,CONCAT(picPath,pic.picName) as picName,p.sTypeId,
	(select count(*) from history where pId=p.pId) as history,
	(select count(*) from viewhistory where pId=p.pId) as viewhistory,
	(select count(*) from bookmark where pId=p.pId) as bookmark  
	FROM products p LEFT JOIN picture pic ON p.pId=pic.pId LEFT JOIN history h ON p.pId=h.pId LEFT JOIN rating r ON p.pId=r.pId LEFT JOIN bookmark b ON p.pId=b.pId WHERE p.pPromote='yes' and p.sTypeId=$sTypeId and pic.picType='Full' GROUP BY p.pId ORDER BY bookmark DESC, viewhistory DESC, history DESC LIMIT $numShow");
	WHILE ($rowPromote = mysql_fetch_array($qproductsPromote))
	{
		$arrProductsPic[$rowPromote[pId]] = $rowPromote[picName];
		$arrProductsName[$rowPromote[pId]] = $rowPromote[pNameTh];
		$arrProductsNameSubstr[$row[pId]] = $rowPromote[pNameThSubstr];
		$arrProductsCode[$rowPromote[pId]] = $rowPromote[pCode];
	}

	$numrowsPromote = mysql_num_rows($qproductsPromote);
	$limit = $numShow - $numrowsPromote;
	$limit = ($limit < 0) ? 0 : $limit ;
		
	$qproducts = mysql_query("SELECT p.pId,p.pCode,if (CHAR_LENGTH(p.pNameTh)>25,CONCAT(SUBSTR(p.pNameTh,1,25),'...'),p.pNameTh) as pNameThSubstr,p.pNameTh,CONCAT(picPath,pic.picName) as picName,p.sTypeId,
	(select count(*) from history where pId=p.pId) as history,
	(select count(*) from viewhistory where pId=p.pId) as viewhistory,
	(select count(*) from bookmark where pId=p.pId) as bookmark  
	FROM products p LEFT JOIN picture pic ON p.pId=pic.pId LEFT JOIN history h ON p.pId=h.pId LEFT JOIN rating r ON p.pId=r.pId LEFT JOIN bookmark b ON p.pId=b.pId WHERE p.pPromote='no' and p.sTypeId=$sTypeId and pic.picType='Full' GROUP BY p.pId ORDER BY bookmark DESC, viewhistory DESC, history DESC LIMIT $limit");
	WHILE ($row = mysql_fetch_array($qproducts))
	{
		$arrProductsPic[$row[pId]] = $row[picName];
		$arrProductsNameSubstr[$row[pId]] = $row[pNameThSubstr];
		$arrProductsName[$row[pId]] = $row[pNameTh];
		$arrProductsCode[$row[pId]] = $row[pCode];
	}
	?>
	<div class="blockslideproduct">
			<table>
			<tr>
			<?php
			if (count($arrProductsPic)>0)
			{
				foreach ($arrProductsPic as $pId => $picName)
				{
					?><th><a target="_blank" href="productDetailFull.php?pid=<?=$pId?>"><img src="<?=$picName?>" height="120" border="0" alt="<?=$arrProductsName[$pId]?>" title="<?=$arrProductsName[$pId]?>"></a></th><?php
				}
				?>
				</tr>
				<tr>
				<?php
				foreach ($arrProductsNameSubstr as $pId => $pName)
				{
					?><td><a target="_blank" href="productDetailFull.php?pid=<?=$pId?>" style="color:#3366cc" title="<?=$arrProductsName[$pId]?>"><?=$pName?></a></td><?php
				}
				?>
				</tr>
				<tr>
				<?php
				foreach ($arrProductsCode as $pCode)
				{
					?><td>รหัส: <?=$pCode?> <img src="images/icon_q.png" width="11" height="9" border="0" alt=""></td><?php
				}
			}// END if (count($arrProductsPic)>0)
			else
			{
				echo ".";
			}
			?>
			</tr>
			</table>
	</div>
<?php
}
?>