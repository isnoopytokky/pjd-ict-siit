<style>
.no{ width : 100px; text-align : center;}
.highlight{ background-color : #cccccc; }
.title{ text-align : center;}
</style>
<?php

$timeArr = array( 
			0 => array( "start" => "08:30", "stop" => "09:20"), 
			1 => array( "start" => "09:20", "stop" => "10:10"), 
			2 => array( "start" => "10:15", "stop" => "11:05"), 
			3 => array( "start" => "11:05", "stop" => "11:55"), 
			4 => array( "start" => "11:55", "stop" => "12:45"), 
			5 => array( "start" => "12:45", "stop" => "13:35"), 
			6 => array( "start" => "13:35", "stop" => "14:30"), 
			7 => array( "start" => "14:30", "stop" => "15:20"), 
			8 => array( "start" => "15:20", "stop" => "16:10"), 
			9 => array( "start" => "16:10", "stop" => "17:00"), 
			10 => array( "start" => "17:00", "stop" => "17:50")
		);

//DATABASE to Array
//วนลูปฐานข้อมูล มาเก็บในรูปแบบ Array
$timeTeach = array(
	0 => array( 
			array('time' => '08:30-11:55', 'title' => '4312405 เทคโนโลยีสารสนเทศ และการสื่อสาร'), 
			array('time' => '13:35-15:20', 'title' => '4312605 ระบบฐานข้อมูล')
			),
	1 => array(
			array('time' => '12:45-16:10', 'title' => '4312502 หัวข้อพิเศษเกี่ยวกับวิทยาการคอมพิวเตอร์')
			),
	2 => array(),
	3 => array(),
	4 => array(),
	5 => array(),
	6 => array(),
	7 => array()
);
//End การจัดรูปแบบข้อมูล

/* Head Column */
function createCol($arr){
	$row = "";
	foreach( $arr as $data )
	{
		$row .= '<td>' . $data['start'] . '-' . $data['stop'] . '</td>';
	}
	return $row;
}

/* Key Positon */
function getCol($haystack, $keyNeedle)
{
    $i = 0;
    foreach($haystack as $arr)
    {
        if($arr['start'] == $keyNeedle)
        {
            return $i;
        }
        $i++;
    }
}

/* Time Range */
function getTimeRange($timeT, $timeCol){
	$data = array();
	foreach($timeT as $timeA){
		$time = $timeA['time'];
		if(!$time) continue;
		$tm = explode("-", $time);
		//echo '<pre>', print_r($tm,true) ,'</pre>';
		$start = getCol($timeCol, $tm[0]);
		$end = getCol($timeCol, $tm[1] );
		$colspan = $end - $start;
		$data[$tm[0]] = array('colspan' => $colspan, 'title' => $timeA['title']);
	}
	return $data;
}

$list = "";
echo '<table border="1" width="90%" align="center" cellspacing="0">';
echo '<tr><td>&nbsp;</td><td>&nbsp;</td>'. createCol( $timeArr ) .'</tr>';
foreach($timeTeach as $i=>$arr){

	//ค้นหาข้อมูลในตารางลงทะเบียน
	//นับช่วงเวลา start_time กับ stop_time ว่ามีกี่ช่อง
	$timeT = $timeTeach[$i];
	
	$arrRange = getTimeRange($timeT, $timeArr);
	
	//echo '<pre>', print_r($arrRange,true) ,'</pre>';
	
	$no = $i + 1;

	$list = '<tr>';
	$list.= '<td rowspan="2" class="no">'.$no.'</td>';
	$list.= '<td>ลายเซ็น</td>';
	$chkCol = 0;
	$col = 0;
	foreach( $timeArr as $timeA )
	{	
		$highlight = "";
		$colspan = "";
		if($chkCol < ($col-1) && $col != 0){
			$chkCol++;
			continue;
		}
		$col = 0;
		$chkCol = 0;
		if(!empty($arrRange[trim($timeA['start'])])){
			$col = $arrRange[trim($timeA['start'])]['colspan'];
			$highlight = "highlight";
			$colspan = 'colspan="'.$col.'"';
		}
		$list.= '<td '.$colspan.' class="'. $highlight .'">&nbsp;</td>';
	}
	$list.= '</tr>';
	
	$list.= '<tr>';
	$list.= '<td>เอก/รุ่น/ห้อง</td>';
	foreach( $timeArr as $timeA )
	{	
		$highlight = "";
		$colspan = "";
		if($chkCol < ($col-1) && $col != 0){
			$chkCol++;
			continue;
		}
		$title = "&nbsp;";
		$col = 0;
		$chkCol = 0;
		if(!empty($arrRange[trim($timeA['start'])])){
			$col = $arrRange[trim($timeA['start'])]['colspan'];
			$title = $arrRange[trim($timeA['start'])]['title'];
			$highlight = "highlight";
			$colspan = 'colspan="'.$col.'"';
		}
		
		$list .= '<td '.$colspan.' class="'. $highlight .' title">' . $title . '</td>';
	}
	$list .= '</tr>';
	echo $list;
	
}
echo '</table>';

?>
