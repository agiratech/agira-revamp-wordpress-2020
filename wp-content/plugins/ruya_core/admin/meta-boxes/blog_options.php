<div id="tb-blog-metabox" class='tb_metabox' style="display: none;">
	<div id="tb-tab-blog" class='categorydiv'>
		<ul class='category-tabs'>
		   <li class='tb-tab'><a href="#tabs-general"><i class="dashicons dashicons-admin-generic"></i> <?php echo esc_html_e('GENERAL','ruya');?></a></li>
		   <li class='tb-tab'><a href="#tabs-header"><i class="dashicons dashicons-menu"></i> <?php echo esc_html_e('HEADER','ruya');?></a></li>
		   <li class='tb-tab'><a href="#tabs-titlebar"><i class="dashicons dashicons-menu"></i> <?php echo esc_html_e('TITLEBAR','ruya');?></a></li>
		   <li class='tb-tab'><a href="#tabs-footer"><i class="dashicons dashicons-menu"></i> <?php echo esc_html_e('FOOTER','ruya');?></a></li>
		</ul>
		<div class='tb-tabs-panel'>
			<div id="tabs-general">
				<?php
					$body_layout = array('global' => 'Global', 'boxed' => 'Boxed' , 'wide' => 'Wide' , 'lines' => 'lines' , 'shapes' => 'shapes' );
					$this->select('body_layout',
							'Body Layout',
							$body_layout,
							'',
							'',
							''
					);
				?>
				<?php
				    $container_width = array('global' => 'Global', '1170px' => '1170px' , '1240px' => '1240px' , '1440px' => '1440px' );
					$this->select('container_width',
							'Container Width',
							$container_width,
							'',
							'',
							''
					);				
				?>
				<?php
				  $select_cursor = array('global' => 'Global', 'default' => 'Default' , 'style1' => 'Style1' , 'style2' => 'Style2' , 'style3' => 'Style3' );
				  $this->select('select_cursor',
							'Mouse Cursor',
							$select_cursor,
							'',
							'',
					     	''
					);				
				?>
				<?php
				  $select_stylesheet = array('' => 'Global', 'blue.css' => 'Blue', 'darkblue.css' => 'Dark Blue', 'purple.css' => 'Purple', 'rose.css' => 'Rose',  'red.css' => 'Red', 'orange.css' => 'Orange', 'gold.css' => 'Gold');
				  $this->select('select_stylesheet',
							'Theme Color',
							$select_stylesheet,
							'',
							'',
					     	''
					);				
				?>
				<?php
				  $select_font = array('' => 'Global', 'Poppins' => 'Poppins', 'Nunito' => 'Nunito', 'Muli' => 'Muli', 'Hind' => 'Hind', 'Cookie' => 'Cookie', 'Lato' => 'Lato', 'Oswald' => 'Oswald' , 'karla' => 'karla', 'Cabin' => 'Cabin', 'Nunito Sans' => 'Nunito Sans', 'Playfair Display' => 'Playfair Display', 'Alegreya Sans' => 'Alegreya Sans');
				  $this->select('select_font',
							'Theme Primary Font',
							$select_font,
							'',
							'',
					     	''
					);				
				?>
				<?php
					$this->picker('body_background',
							'Body Background',
							''
					);
				?>
			</div>
			
			<div id="tabs-header">
				<p class="tb_info tb-title-mb"><i class="dashicons dashicons-admin-tools"></i><?php echo esc_html_e('Manage Header','ruya'); ?></p>
				<?php
				   $headers = array('global' => 'Global', 'sidepanel' => 'Header V1','header-v2' => 'Header V2', 'header-v3' => 'Header V3', 'header-v4' => 'Header V4', 'header-v5' => 'Header V5', 'header-v6' => 'Header V6', 'header-v7' => 'Header V7' , 'header-onepage' => 'Header One Page');

					$this->select('header',
							'Select Header',
							$headers,
							'',
							''
					);
				?>
				<p class="tb_info tb-title-mb"><i class="dashicons dashicons-admin-tools"></i><?php echo esc_html_e('Manage Logo','ruya'); ?></p>
				<?php
					$this->upload('logo',
							'Logo',
							''
					);
				?>
				<p class="tb_info tb-title-mb"><i class="dashicons dashicons-admin-tools"></i><?php echo esc_html_e('Manage Menu','ruya'); ?></p>
				<?php
					$menus = array();
					$menus_obj = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
					$menus['global'] = 'Global';
					foreach ( $menus_obj as $menu_obj ) {
						$menus[$menu_obj->slug] = $menu_obj->name;
					}
					$this->select('menu',
							'Select Menu',
							$menus,
							'',
							''
					);
					$menu_positon = array('global' => 'Global', 'text-left' => 'Align Left','text-center' => 'Align Center','text-right' => 'Align Right');
					$this->select('menu_positon',
							'Select Position',
							$menu_positon,
							'',
							''
					);
					$this->checkbox('disable_stick_menu',
							'Disable Stick Menu',
							'off',
							'',
							''
					);
				?>
			</div>
			
			<div id="tabs-titlebar">
				<?php
					$this->upload('bg_title_bar', 'Background');
				    $page_title = array('global' => 'Global', 'pagetitle-v1' => 'No page title', 'pagetitle-v2' => 'Page title V2' ,'pagetitle-v3' => 'Page title V3', 'pagetitle-v4' => 'Page title V4', 'pagetitle-v5' => 'Page title V5');
					$this->select('page_title',
							'Select page title',
							$page_title,
							'',
							''
					);
				?>
			</div>
			
			<div id="tabs-footer">
				<?php
					$footers = array('global' => 'Global',  'footer-v0' => 'No footer', 'footer-v1' => 'Footer V1', 'footer-v2' => 'Footer V2' ,'footer-v3' => 'Footer V3' ,'footer-v4' => 'Footer V4', 'footer-v5' => 'Footer V5', 'footer-v6' => 'Footer V6' );
					$this->select('footer',
							'Select Footer',
							$footers,
							'',
							''
					);
				?>
			</div>
		</div>
	</div>
</div>