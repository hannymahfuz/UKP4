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
// tinyMCE.init({
        // theme : "advanced",
        // mode : "textareas",
        // plugins : "fullpage",
        // theme_advanced_buttons3_add : "fullpage"
// });
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
      .scrollbar{width:380px;height:80px;margin:0 60px 0 0;-moz-box-shadow:0px 0px 12px 3px #CCC;overflow:hidden;float:left;background:#FFF;border:6px solid #B2B2B2;}
      .scrollbar.tengah{width:450px;height:200px;margin:0 60px 0 0;overflow:hidden;float:left;-moz-box-shadow:none;border:none;}
      .scrollbar.noborder{border:none;}
      .scrollbar p{margin:0;padding:8px;line-height:1.4;}
      .plain {
        max-height: 100px;
      }	  
    </style>
		</head>
<body>

	 <table id="table-main" border=1>
		<tr>
			<td colspan=3> RAPOR PELAKSANAAN RENCANA AKSI UNTUK MENGATASI KEMACETAN 
			</td>
		</tr>
		<tr>
			<td  colspan=3>
				<div >
					<ul class="menu">
						<?php foreach ($query as $row):?>
							<li class="top"><a href=<?php echo $row->MNU_DESCRE;?> target="_self" class="top_link"><span><?php echo $row->MNU_DESCRE;?></span></a></li>
						<?php endforeach;?>
					</ul>
				</div>			
			</td>
		</tr>
		<tr>
			<td  id="td-kiri">
				<table border=0>
					<tr><td><img src="/images/kiri1.png" alt="Kiri" /> </td></tr>
					<tr>
						<td>						
							<div class="scrollbar">
								<table >									
									<th>Rencana Aksi Sept - Okt 2011<th>
									<? foreach ($queryCodess as $rowCodess):?>
									<tr 
										onmouseover="ChangeColor(this, true);" 
										onmouseout="ChangeColor(this, false);" 
										onclick="DoNav('/maind/detail/<?php echo $rowCodess->CAT_CODESS;?>/1');"
										
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
							<table border =0 width="100%">
								<tr>
									<td width="50%" border=1><< Rencana Aksi 2 Bulan Sebelumny
									</td>
									<td>Rencana Aksi >> 2 Bulan  Selanjutnya
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
			<td id="td-tengah">
				<table border=1>
					<tr>
						<td style=vertical-align:top>
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
												<th>Penanggun Jawab
												</th>
												<th>Capaian
												</th>
											</tr>
												<?php foreach ($queryDetail as $rowDetail):?>
											<tr onmouseover="ChangeColor(this, true);" 
											onmouseout="ChangeColor(this, false);" 
											onclick="DoNav('/maind/komentar/<?php echo $rowDetail->CAT_CODESS;?>/<?php echo $rowDetail->DET_IDENTS;?>')";>
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
					<tr>
						
						<td> 
							<table id="table-main">
								<td>
							<?=$comment?>
								</td>
							</table>
						</td>
					</tr>
					<!--tr>
						<td>
							<table>
							<tr>
								<td>Nama
								</td>
								<td>:
								</td>
								<td><input type="text" name="firstname" />
								</td>
							</tr>
							<tr>
								<td>email
								</td>
								<td>:
								</td>
								<td><input type="text" name="email" />
								</td>
							</tr>
							<tr>
								<td colspan=3>
									<textarea name="content" cols="90" rows="5">This is some content that will be editable with TinyMCE.</textarea>
											<input type="submit" value="Save" />
								</td>
							</tr>
											</table>
									
						</td>
					</tr-->
					
				</table>
			</td>
			<td id="td-kanan">
				<table border=1>
					<?php foreach ($queryNews as $rowNews):?>
					<tr>
						<td>
						<?php echo $rowNews->NEW_JUDLI;?>
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
