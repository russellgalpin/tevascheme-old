<div class="login_form">
	<?php echo $this->Form->create('User',array('action'=>'login'));?>
	<fieldset> 		
		<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		?>
		<div class="submit">
			<input type="submit" name="data[User][login]" value="Login" />
		</div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>