<table cellpadding="0" cellspacing="0" width="600px" align="center" style="text-align:left;">
	<tr>
		<td colspan="4"><img src="<?php echo $baseUrl;?>img/<?php echo ($subsite == 'pharmacy') ? 'ps' : 'dds';?>-email-header.png" alt="Dispensing Doctor Support Email" /></td>
	</tr>
	<tr>
		<th colspan="4" style="color:#0091d0; font-weight:bold; font-size:16px; font-family: Arial, Helvetica, sans-serif; line-height:30px;">
			<?php echo $data['FormId'];?>
		</th>
	</tr>
	<tr>
		<td colspan="4" style="color:#0091d0; font-weight:bold; font-size:14px; font-family: Arial, Helvetica, sans-serif; line-height:30px;">
			Teva Account Information
		</td>
	</tr>
	<tr>
		<td width="150px" style="color:#545454; font-weight:normal; font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:28px;">
			Full name
		</td>
		<td colspan="3" style="color:#545454; font-weight:bold; font-size:12px; font-family: Arial, Helvetica, sans-serif;">
			<?php echo $data['FirstName'];?>
		</td>
	</tr>
	<tr style="color:#545454; font-weight:normal; font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:28px;">
		<td width="150px">
			Teva Scheme
		</td>
		<td colspan="3" style="font-weight:bold;">
			<?php echo $data['TevaScheme'];?>
		</td>
	</tr>
	<tr style="color:#545454; font-weight:normal; font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:28px;">
		<td width="150px">
			Teva Account Number
		</td>
		<td colspan="3" style="font-weight:bold;">
			<?php echo $data['TevaAccountNumber'];?>
		</td>
	</tr>
	<!-- IF THERE IS NO DELIVERY ADDRESS - DRUM AND LEARNING ZONE -->
		<tr style="color:#0091d0; font-weight:bold; font-size:14px; font-family: Arial, Helvetica, sans-serif; line-height:30px;">
			<td>
				<?php echo ($subsite == 'pharmacy') ? 'Practice Information' : 'Surgery Information';?>
			</td>
		</tr>
		<tr style="color:#545454; font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:28px;">
			<td width="150px">
				Address 1
			</td>
			<td style="font-weight:bold;">
				<?php echo $data['Address1'];?>
			</td>
		</tr>
		<tr style="color:#545454; font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:28px;">
			<td width="150px" style="font-weight:normal;">
				Address 2
			</td>
			<td style="font-weight:bold;">
				<?php echo $data['Address2'];?>
			</td>
		</tr>
		<tr style="color:#545454; font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:28px;">
			<td width="150px">
				Address 3
			</td>
			<td style="font-weight:bold;">
				<?php echo $data['Address3'];?>
			</td>
		</tr>
		<tr style="color:#545454; font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:28px;">
			<td width="150px">
				Town/City
			</td>
			<td style="font-weight:bold;">
				<?php echo $data['Town'];?>
			</td>
		</tr>
		<tr style="color:#545454; font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:28px;">
			<td width="150px">
				County
			</td>
			<td style="font-weight:bold;">
				<?php echo $data['Country'];?>
			</td>
		</tr>
		<tr style="color:#545454; font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:28px;">
			<td width="150px">
				Postcode
			</td>
			<td style="font-weight:bold;">
				<?php echo $data['Postcode'];?>
			</td>
		</tr>

		<tr>
			<td colspan="4" style="color:#0091d0; font-weight:bold; font-size:14px; font-family: Arial, Helvetica, sans-serif; line-height:30px;">
				Users to register
			</td>
		</tr>
		<?php for ($i = 0; $i < sizeof($data['UserName']); $i++):?>
			<tr>
				<td colspan="4">
					<table cellpadding="0" cellspacing="0" width="100%">
						<tr style="color:#545454;font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:28px;">
							<td>
								Full Name
							</td>
							<td style="font-weight:bold;">
								<?php echo $data['UserName'][$i];?>
							</td>
							<td>
								Email Address
							</td>
							<td style="font-weight:bold;">
								<?php echo $data['UserEmail'][$i];?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		<?php endfor;?>
		
	<tr>
		<td colspan="4" style="color:#0091d0; font-weight:bold; font-size:14px; font-family: Arial, Helvetica, sans-serif; line-height:30px;">
			Contact Details
		</td>
	</tr>
	<tr style="color:#545454; font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:28px;">
		<td width="150px">
			Contact Name
		</td>
		<td style="font-weight:bold;">
			<?php echo $data['ContactName'];?>
		</td>
	</tr>
	<tr style="color:#545454; font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:28px;">
		<td width="150px">
			Telephone Number
		</td>
		<td style="font-weight:bold;">
			<?php echo $data['TelephoneNumberCode'];?> <?php echo $data['TelephoneNumber'];?>
		</td>
	</tr>
	<tr style="color:#545454; font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:28px;">
		<td width="150px">
			Email Address
		</td>
		<td style="font-weight:bold;">
			<?php echo $data['EmailAddress'];?>
		</td>
	</tr>
	<tr style="color:#545454; font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:28px;">
		<td width="150px">
			Payment Type
		</td>
		<td colspan="3" style="font-weight:bold;">
			<?php echo $data['PaymentType'];?>
		</td>
	</tr>
	<tr>
		<td>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td>
			<img src="<?php echo $baseUrl;?>img/<?php echo ($subsite == 'pharmacy') ? 'ps' : 'dds';?>-email-footer-logo.png" alt="Dispensing Doctor Support" />
		</td>
	</tr>
</table>