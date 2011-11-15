

<td id="td-tengah">
	<table border=1>
		<tr>
			<td>
				<div class="scroll">
				<table border=0 >
					<tr >
						<td border=1 width="20%" valign="top">
							<?php 	$data1 = '';
 								foreach ($query as $row):?>
								<?php 
									$data2 = $row->CAT_DESCRI;

								if ($data1!=$data2)
									{
									echo $row->CAT_DESCRI;
									$data1 = $row->CAT_DESCRI;
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
									<?php foreach ($query as $row):?>
								<tr onmouseover="ChangeColor(this, true);" 
								onmouseout="ChangeColor(this, false);" 
								onclick="DoNav('/main/komentar/<?php echo $row->CAT_CODESS;?>/<?php echo $row->DET_IDENTS;?>')";>
										<td border=1 width="40%">
											<?php echo $row->DET_TITLID;?> 
										</td>
										<td border=1 width="40%">
											<?php echo $row->DET_JAWAB;?> 
										</td>
										<td border=1 width="20%">
											<?php echo $row->DET_CAPAI;?> 
										</td>
								</tr>
									<?php endforeach;?>
							</table>
						</td>
					</tr>
				</table>
				</div>
			</td>
		<tr>
