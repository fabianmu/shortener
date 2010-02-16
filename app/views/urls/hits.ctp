<h1>URL Hits</h1>

<table id="hits">
	<tr>
		<th>Long URL</th>
		<th>Short URL</th>
		<th>Hits</th>
	</tr>

	<?php foreach ($urls as $url): ?>
	<tr>
		<td><?php echo $html->link($url['Url']['long_url'], $url['Url']['long_url']); ?></td>
		<td><?php echo $html->link($url['Url']['short_url'], '/'.$url['Url']['short_url']); ?></td>
		<td><?php echo $url['Url']['hits']; ?></td>
	</tr>
	<?php endforeach; ?>

</table>
