<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>UKP4</title>

        <link type="text/css" href="<?=$this->config->item('base_url');?>lib/css/style.css" rel="stylesheet" />
        <link type="text/css" href="<?=$this->config->item('base_url');?>lib/css/menu_style.css" rel="stylesheet" />
	<link href="<?=$this->config->item('base_url');?>lib/css/scrollbar.css" type="text/css" rel="stylesheet" />

		<script type="text/javascript" src="<?=$this->config->item('base_url');?>lib/js/jquery-1.6.4.js"></script>
		<script type="text/javascript" src="<?=$this->config->item('base_url');?>lib/js/jquery.scroll.js"></script>

		<script type="text/javascript">
			 $(document).ready(function() {
				$('.scrollbar').scrollbar();
			});
			
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
    <style type="text/css" media="screen">
      /* demo styles */
      .scrollbar{width:220px;height:140px;margin:0 0px 0 0;-moz-box-shadow:0px 0px 9px 3px #CCC;overflow:hidden;float:left;background:#FFF;border:6px solid #B2B2B2;}
      .scrollbar.tengah{width:750px;height:100px;margin:0 0px 0 0;overflow:hidden;float:left;-moz-box-shadow:none;border:none;}
      .scrollbar.noborder{border:none;}
      .scrollbar p{margin:0;padding:8px;line-height:1.4;}
      .plain {
        max-height: 100px;
      }	  
    </style>
		</head>
<body>
	<div id="header">
		<h1>rapor</h1>
		<ul>
			<li id="home"><a href="home">home</a></li>
			<li id="komentar"><a href="komentar">komentar</a></li>
			<li id="tentangkami"><a href="tentangkami">Tentang Kami</a></li>
		</ul>
	<div id="div-search"></div>
		<table border="0">
			<tr>
				<td>
					<div id="div-kiri1"></div>
					<div id="div-kiri2"></div>
					<div id="div-kiri3">
						<table border=0>
							<tr >
								<td>						
									<div class="scrollbar">
										<table >									
											<th>Rencana Aksi Sept - Okt 2011<th>
											<? foreach ($queryCodess as $rowCodess):?>
											<tr 
												onmouseover="ChangeColor(this, true);" 
												onmouseout="ChangeColor(this, false);" 
												onclick="DoNav('/mainx/detail/<?php echo $rowCodess->CAT_CODESS;?>/1');"
												
											>
												<td >
														<?php echo $rowCodess->CAT_DESCRI;?> 
												</td> 
											</tr>
											<?php endforeach;?>
										</table>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div id="div-kiri4"></div>
								</td>
							</tr>
						</table>
					</div>
				</td>
				<td >
					<table border=0 >
						<tr><td><br></td>
						</tr>
						<tr>
							<td>
								<div class="scrollbar tengah">
									<table border=0 >
										<tr >
											<td border=1 width="20%" valign="top">
												<?php 	$data1 = '';
													foreach ($queryDetail as $rowDetail):?>
													<?php 
														$data2 = $rowDetail->CAT_DESCRI;
		
													if ($data1!=$data2)
														{
														echo $rowDetail->CAT_DESCRI;
														$data1 = $rowDetail->CAT_DESCRI;
														}
		
														?> 
												<?php endforeach;?>
											</td>
											<td>
												<table border=1>
													<tr>
														<th>Kegiatan
														</th>
														<th>Penanggung Jawab
														</th>
														<th>Capaian
														</th>
													</tr>
														<?php foreach ($queryDetail as $rowDetail):?>
													<tr onmouseover="ChangeColor(this, true);" 
													onmouseout="ChangeColor(this, false);" 
													onclick="DoNav('/mainx/komentar/<?php echo $rowDetail->CAT_CODESS;?>/<?php echo $rowDetail->DET_IDENTS;?>')";>
															<td border=1 width="40%">
																<?php echo $rowDetail->DET_TITLID;?> 
															</td>
															<td border=1 width="40%">
																<?php echo $rowDetail->DET_JAWAB;?> 
															</td>
															<td border=1 width="20%">
																<?php echo $rowDetail->DET_CAPAI;?> 
															</td>
													</tr>
														<?php endforeach;?>
												</table>
											</td>
										</table>
									</div>

							</td>
						</tr>
							<th>
							<?php $data1 = ''; foreach ($queryKomentar as $rowKomentar):?>
							<?php 
								$data2 = $rowKomentar->DET_TITLID;
								if ($data1!=$data2)
									{
									echo $rowKomentar->DET_TITLID;
									$data1 = $rowKomentar->DET_TITLID;
									}
									?>
								<?php endforeach;?>
							</th>
						<tr>
							<td colspan=3>
								<textarea name="content" cols="90" rows="3">Komentar anda ....</textarea>
										<input type="submit" value="Save" />
							</td>
						</tr>
						<tr>
							<td><img src="/images/komentar.jpg" alt="komentar" /> </td>
					</table>

				</td>
			<td id="td-kanan"> <br><br>
				<table border=1 bgcolor="#FFFFFF">
					<?php foreach ($queryNews as $rowNews):?>
					<tr>
						<td><font size="3" color="red">
						<?php echo $rowNews->NEW_JUDLI;?></font>
						</td>
					</tr>
					<tr>
						<td valign="top">
						<?php echo $rowNews->NEW_DESCRI;?>
						</td>
					</tr>
					<?php endforeach;?>
					<tr height="50%">
						<td>
							<table border=0 >
								<tr>
									<td><div id="chart_div"></div>
									</td>
								</tr>
						</td>
					</tr>
				</table>
			</td>

			</tr>
		</table>

	</div>
	
	</div>
