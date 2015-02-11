<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Fb id', 'fb_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('fb_id', Input::post('fb_id', isset($user) ? $user->fb_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Fb id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Fb name', 'fb_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('fb_name', Input::post('fb_name', isset($user) ? $user->fb_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Fb name')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>