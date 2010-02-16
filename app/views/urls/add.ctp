<h1>Add Url</h1>
<p>Hello, i am an URL shortener.</p>
<?php
echo $form->create('Url');

echo $form->label('long_url', 'Long URL:');
echo $form->text('long_url');
if ($form->isFieldError('long_url')){
	echo $form->error('long_url');
}

echo $form->end('Save Url');