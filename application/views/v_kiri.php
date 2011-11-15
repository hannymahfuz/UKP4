
  
	<table id="table-main" border=0>
		<tr>
			<td align="center">
			<table border=0>
				<tr>
					<td  >
						
						<table border=1>
							<tr><td align="center"><img src="/images/kiri1.png" alt="Kiri" /> </td>
							</tr>
							<tr>
								<td align="center"><img src="/images/rencanaAkasiBulanInix.jpg" alt="Kiri" /> </td>
							</tr>

							<tr>
								<td>

									<div class="scroll">
									
									<table >
											<th>Rencana Aksi Sept - Okt 2011<th>
											<?php foreach ($query as $row):?>
											<tr 
												onmouseover="ChangeColor(this, true);" 
												onmouseout="ChangeColor(this, false);" 
												onclick="DoNav('/main/detail/<?php echo $row->CAT_CODESS;?>/1');"
												
											>
												<td >
														<?php echo $row->CAT_DESCRI;?> 
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