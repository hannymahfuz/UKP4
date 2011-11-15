		<tr>
			<td> 
				<table id="table-main">
					<tr>
						<th> Komentar Terakhir Tentang "
							<?php $data1 = ''; foreach ($query as $row):?>
							<?php 
								$data2 = $row->DET_TITLID;
								if ($data1!=$data2)
									{
									echo $row->DET_TITLID;
									$data1 = $row->DET_TITLID;
									}
									?>
								<?php endforeach;?>"</th>
					</tr>
					<?php foreach ($query as $row):?>
					<tr id="tr-tengah">
						<td>
							<?php echo $row->USR_NAMES;?> <br>
							<?php echo $row->COM_COMEN;?> 
						</td>
					</tr>
					<?php endforeach;?>
				</table>
			</td>
		</tr>

