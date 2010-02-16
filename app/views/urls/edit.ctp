<h1>Edit Url</h1>
<?php
	echo $form->create('Url', array('action' => 'edit'));
	echo $form->input('long_url');
	echo $form->input('id', array('type'=>'hidden')); 
	echo $form->end('Save Url');