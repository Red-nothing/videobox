<!-- indexer::stop -->
<div id="<?php echo $this->id; ?>"><noscript><?php echo $this->noscript; ?></noscript></div>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
if (!Browser.Plugins.Flash.version > 0)
{
	$('<?php echo $this->id; ?>').set('text', '<?php echo $this->noflash; ?>');
}
else
{
	var obj = new Swiff('<?php echo $this->youtubelink; ?>', {
		id: '<?php echo $this->id; ?>',
		width: <?php echo $this->width; ?>,
		height: <?php echo $this->height; ?>,
		container: '<?php echo $this->id; ?>',
		params: {
			wmode: 'transparent',
			allowscriptaccess: 'true',
			allowFullScreen: 'true'
		}
	});
}
//--><!]]>
</script>
<!-- indexer::continue -->