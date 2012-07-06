<?php require_once('header.php'); ?>
<h1 property="dc:title" datatype="">Screenshots</h1>

<div class="content clearfix">
	<div class="field field-name-body field-type-text-with-summary field-label-hidden">
		<div class="field-items">
			<div class="field-item even" property="content:encoded">
				<?php
				$dir = "./screenshots/";

		    	$arrFiles = array();

				if (is_dir($dir)) {
				    if ($dh = opendir($dir)) {
				    
				        while (($file = readdir($dh)) !== false) {
				        		if (filetype($dir . $file) == 'file'){
				        		
				        			$arrExtension	= explode('.', $file);
				        			$arrFilename	= explode('_', $arrExtension[0]);
				        			$imageNo		= $arrFilename[0];

				        			$tempFile = array();
				        			$tempFile['note']	= str_replace($imageNo, "<b>".$imageNo."</b>. ", join(' ', $arrFilename));
				        			$tempFile['image']	= $dir . $file;
						            
						            $arrFiles[(int) $imageNo] = $tempFile;
						        }
				        }
			        	closedir($dh);
			    	}
				}
				ksort($arrFiles);
				foreach ($arrFiles as $f){
        			echo '<img style="border: thin solid #000;" width="550px" src="'.$f['image'].'"><br />';
		            echo '<i>'. $f['note'] .'</i><br /><br />';
				}
				
				?>
			</div>
		</div>
	</div>
</div>
<?php require_once('footer.php'); ?>