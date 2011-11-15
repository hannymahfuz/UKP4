<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>UKP4</title>

        <link type="text/css" href="<?=$this->config->item('base_url');?>lib/css/style.css" rel="stylesheet" />
        <link type="text/css" href="<?=$this->config->item('base_url');?>lib/css/style.css" rel="stylesheet" />
        <link type="text/css" href="<?=$this->config->item('base_url');?>lib/css/menu_style.css" rel="stylesheet" />

		<script type="text/javascript" src="<?=$this->config->item('base_url');?>lib/js/jquery-1.6.4.js"></script>
		<script type="text/javascript" src="<?=$this->config->item('base_url');?>lib/js/jquery.scroll.js"></script>

		<script type="text/javascript">
			function ChangeColor(tableRow, highLight)
			{
				if (highLight)
				{
				  tableRow.style.backgroundColor = '#dcfac9';
				}
				else
				{
				  tableRow.style.backgroundColor = 'white';
				}
			 }

			  function DoNav(theUrl)
			  {
				document.location.href = '';
				document.location.href = theUrl;
			  }
			  
$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'moccaUItoTop', // fading element id
				containerHoverClass: 'moccaUIhover', // fading element hover class
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			$('selector').scrollbar({
arrows: false
});
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});


			  </script>

			<!-- OF COURSE YOU NEED TO ADAPT NEXT LINE TO YOUR tiny_mce.js PATH -->
			<script type="text/javascript" src="<?=$this->config->item('base_url');?>lib/js/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
tinyMCE.init({
        theme : "advanced",
        mode : "textareas",
        plugins : "fullpage",
        theme_advanced_buttons3_add : "fullpage"
});
</script>


<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Renaksi');
        data.addColumn('number', 'Bulan');
        data.addRows(4);
        data.setValue(0, 0, 'Rencana Aksi Belum Sesuai Target');
        data.setValue(0, 1, 11);
        data.setValue(1, 0, 'Rencana Aksi Memenuhi Terget');
        data.setValue(1, 1, 2);
        data.setValue(2, 0, 'Capaian Belum Dilaporkan');
        data.setValue(2, 1, 5);
        data.setValue(3, 0, 'Capaian Sangat Memuaskan');
        data.setValue(3, 1, 2);

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, {	width: 250, 
							height: 250, 
							title: 'Rencana Aksi', 
							legend: 'bottom'
							
						}
					);
      }
    </script>

	<link href="/lib/css/scrollbar.css" type="text/css" rel="stylesheet" />
		</head>
<body>


	 <table id="table-main" border=1>
		<tr>
			<td > RAPOR PELAKSANAAN RENCANA AKSI UNTUK MENGATASI KEMACETAN 
			</td>
		</tr>
		<tr>
			<td >
				<div >
					<ul class="menu">
						<?php foreach ($query as $row):?>
							<li class="top"><a href=<?php echo $row->MNU_DESCRE;?> target="_self" class="top_link"><span><?php echo $row->MNU_DESCRE;?></span></a></li>
						<?php endforeach;?>
					</ul>
				</div>			
			</td>
		</tr>
	</table>
	