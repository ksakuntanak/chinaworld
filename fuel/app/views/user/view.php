<h2>Viewing <span class='muted'>#<?php echo $user->id; ?></span></h2>

<p>
	<strong>Fb id:</strong>
	<?php echo $user->fb_id; ?></p>
<p>
	<strong>Fb name:</strong>
	<?php echo $user->fb_name; ?></p>

<?php echo Html::anchor('user/edit/'.$user->id, 'Edit'); ?> |
<?php echo Html::anchor('user', 'Back'); ?>