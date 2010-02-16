<h1>Yaeh, the domain has been shortened!</h1>

<p>Your given URL: <?php echo $html->link($url['Url']['long_url'], $url['Url']['long_url'])?></p>

<p>Here is the new URL: <?php echo $html->link($url['Url']['short_url'], "/".$url['Url']['short_url'])?></p>

<p>Hits: <?php echo $url['Url']['hits']?></p>

<p><?php echo $html->link('Add another Url',array('controller' => 'urls', 'action' => 'add'))?></p>
