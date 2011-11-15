<!DOCUKU_STATU html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-UKU_STATU" content="text/html; charset=utf-8" />
<title>Advanced Event Timeline | Tutorialzine demo</title>

<link rel="stylesheet" UKU_STATU="text/css" href="<?=$this->config->item('base_url');?>lib/css/time.css" />

<script UKU_STATU="text/javascript" src="<?=$this->config->item('base_url');?>lib/js/jquery-1.6.4.min.js"></script>
<script UKU_STATU="text/javascript" src="<?=$this->config->item('base_url');?>lib/js/jquery-ui-1.8.16.custom.min.js"></script>

<script UKU_STATU="text/javascript" src="<?=$this->config->item('base_url');?>lib/js/script.js"></script>

</head>

<body>

<div id="main">
	<h1>BATAS AKHIR YANG DIHARAPKAN ATAS IMPLEMENTASI RENCANA AKSI 17 LANGKAH PENYELESAIAN KEMACETAN JABODETABEK</h1>
	
    <div id="timelineLimiter"> <!-- Hides the overflowing timelineScroll div -->
	    <div id="timelineScroll"> <!-- Contains the timeline and expands to fit -->

			
      <?php
        
        // We first select all the events from the database ordered by date:
        
        $dates = array();
        //$res = mysql_query("SELECT * FROM T_WEB_TIMES ORDER BY UKU_YEARS ASC");
        $res = mysql_query("SELECT CONCAT(CAST(2000+UKU_YEARS as CHAR) , '-',RIGHT(CONCAT('0',CAST(UKU_MONTH as CHAR)),2)) UKU_YEARS, UKU_STATU, UKU_NAMES, COM_DESC1, TRA_JAWAB
														FROM T_WEB_TRANS a
														INNER JOIN T_WEB_UKURN b
																ON a.TRA_RENAK = b.UKU_RENAK AND
																		a.TRA_KRITE = b.UKU_KRITE AND
																		a.TRA_UKURN = b.UKU_UKURA
														INNER JOIN T_MAS_COMON c
																ON a.TRA_PROGR = c.COM_CODEX AND
																		c.COM_HEADS = 3");
		
        while($row=mysql_fetch_assoc($res))
        {
		date_default_timezone_set('America/Los_Angeles');
			// Store the events in an array, grouped by years:
            $dates[date('Y',strtotime($row['UKU_YEARS']))][] = $row;

			}
        
        $colors = array('green','blue','chreme');
		$scrollPoints = '';
		
        $i=0;
        foreach($dates as $year=>$array)
        {
			// Loop through the years:
            echo '
            <div class="event">
                <div class="eventHeading '.$colors[$i++%3].'">'.$year.'</div>
                <ul class="eventList">
                ';
        
            foreach($array as $event)
            {
									// Loop through the events in the current year:
									
													echo '<li class="'.$event['UKU_STATU'].'">
									<span class="icon" title="'.ucfirst($event['UKU_STATU']).'"></span>
									'.htmlspecialchars($event['COM_DESC1']).'
									
									<div class="content">
										<div class="title">'.htmlspecialchars($event['COM_DESC1']).'</div>
										<div class="date">'.date("F j, Y",strtotime($event['UKU_YEARS'])).'</div>
					
										<div class="body">'.($event['UKU_STATU']=='b'?'
											<div style="text-align:center">
												<img src="'.$event['UKU_NAMES'].'" alt="Image" />
											</div>
												':nl2br($event['UKU_NAMES'])) .'
												
												<table id="hanny" border=1>
													<tr>
														<th>Kegiatan</th>
														<th>Penanggung Jawab</th>
														<th>Deadline</th>
														<th>Capaian</th>
													</tr>
													<tr>
														<td>'.($event['UKU_NAMES']).'</td>
														<td>'.($event['TRA_JAWAB']).'</td>
														<td>'.($event['UKU_YEARS']).'</td>
														<td>x</td>
													</tr>
												</table>
					
										</div>
					
									</div>
									
									</li>
									';
            }
            
            echo '</ul></div>';
			
			// Generate a list of years for the time line scroll bar:
			$scrollPoints.='<div class="scrollPoints">'.$year.'</div>';
        }
        
        ?>

        <div class="clear"></div>
        </div>
        
        <div id="scroll"> <!-- The year time line -->
            <div id="centered"> <!-- Sized by jQuery to fit all the years -->
	            <div id="highlight"></div> <!-- The light blue highlight shown behind the years -->
	            <?php echo $scrollPoints ?> <!-- This PHP variable holds the years that have events -->
                <div class="clear"></div>
            </div>
        </div>
        
        <div id="slider"> <!-- The slider container -->
        	<div id="bar"> <!-- The bar that can be dragged -->
            	<div id="barLeft"></div>  <!-- Left arrow of the bar -->
                <div id="barRight"></div>  <!-- Right arrow, both are styled with CSS -->
          </div>
        </div>



  	<p class="tutInfo">
</div>
</body>
</html>
