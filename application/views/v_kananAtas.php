					<td id="td-kanan">
						<table border=1>
							<?php foreach ($query as $row):?>
							<tr>
								<td>
								<?php echo $row->NEW_JUDLI;?>
								</td>
							</tr>
							<tr>
								<td valign="top">
								<?php echo $row->NEW_DESCRI;?>
								</td>
							</tr>
							<?php endforeach;?>
							