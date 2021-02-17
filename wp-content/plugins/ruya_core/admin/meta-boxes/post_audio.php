<div class='tb_metabox'>
	<?php
	$this->select('audio_type',
			'Audio Type',
			array(
					'' 	=> 'HTML5',
					'soundcloud' 		=> 'SoundCloud'
			),
			'',
			''
	);
	?>
	<div id="post_audio_html5">
	<?php
	$this->select('post_audio_type',
			'Audio Type',
			array(
					'mp3' 		=> 'MP3',
					'ogg' 		=> 'OGG',
					'wav' 		=> 'WAV'
			),
			'',
			''
	);
	$this->upload('post_audio_url',
			'File URL',
			'',
			esc_html__('Please enter in the URL to the (OGG,MP3,WAV) file','ruya')
	);
	?>
	</div>
	<div id="post_audio_soundcloud">
		<?php
			$this->textarea('post_audio_iframe',
					'iframe',
					esc_html__('Please type the iframe for your audio soundcloud here.','ruya')
			);
		?>
	</div>
</div>