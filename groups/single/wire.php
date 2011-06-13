<?php get_header();?>
        <div id="container">
		
			<?php do_action( 'template_notices' ) // (error/success feedback) ?>
		
		<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>

			<?php do_action( 'bp_before_group_content' ) ?>

			 <div id="left-column">
				<?php locate_template( array( 'groups/group-menu.php' ), true ) ?>
            </div><!--end of left column -->

			<div id="right-column-wide">
				 <!-- group profile section -->
				 <div class='box basics'>
			 		<div class='box-content'>

						<div id="profile-name">
								<?php do_action( 'bp_before_group_name' ) ?>
								<h1 class="fn"><a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>"><?php bp_group_name() ?></a>&raquo;<?php _e("Wire");?></h1>
								<?php do_action( 'bp_after_group_name' ) ?>
								<!-- breadcrumb -->
								<!--end of breadcrum -->
						</div>
						
					</div>
				</div><!-- end of group profile -->
									
				
					
						<?php do_action( 'bp_before_group_wire_content' ) ?>
						
						<?php if ( function_exists('bp_wire_get_post_list') ) : ?>
							
							<?php bp_wire_get_post_list( bp_group_id( false, false), __( 'Group Wire', 'buddypress' ), sprintf( __( 'There are no wire posts for %s', 'buddypress' ), bp_group_name(false) ), bp_group_is_member(), true ) ?>
						
						<?php endif; ?>
					
					
				
					
					
					

				</div><!-- end of center column -->
		 

			<?php do_action( 'bp_after_group_content' ) ?>

		<?php endwhile; else: ?>

			<div id="message" class="error">
				<p><?php _e("Sorry, the group does not exist.", "buddypress"); ?></p>
			</div>

		<?php endif;?>
			<br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>