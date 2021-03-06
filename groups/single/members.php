<?php get_header();?>
        <div id="container">
		
			<?php do_action( 'template_notices' ) // (error/success feedback) ?>
		
		<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>

			<?php do_action( 'bp_before_group_members_content' ) ?>

			   <div id="left-column">
				<?php locate_template( array( 'groups/group-menu.php' ), true ) ?>
            </div><!--end of left column -->

			<div id="right-column-wide">
				 <!-- group profile section -->
				 <div class='box basics'>
			 		<div class='box-content'>

						<div id="profile-name">
								<?php do_action( 'bp_before_group_name' ) ?>
								<h1 class="fn"><a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>"><?php bp_group_name() ?></a>&raquo; <?php _e("Members");?></h1>
								<?php do_action( 'bp_after_group_name' ) ?>
								<!-- breadcrumb -->
								<!--end of breadcrum -->
						</div>
						
					
									
						<?php do_action( 'bp_before_group_administrators_list' ) ?>
		
					<div class="bp-widget">
						<h4><?php _e( 'Administrators', 'buddypress' ); ?></h4>
						<?php bp_group_admin_memberlist() ?>
					</div>

					<?php do_action( 'bp_after_group_administrators_list' ) ?>
		
					<?php if ( bp_group_has_moderators() ) : ?>

						<?php do_action( 'bp_before_group_moderators_list' ) ?>

						<div class="bp-widget">
							<h4><?php _e( 'Moderators', 'buddypress' ); ?></h4>
							<?php bp_group_mod_memberlist() ?>
						</div>

						<?php do_action( 'bp_after_group_moderators_list' ) ?>

					<?php endif; ?>

					<div class="bp-widget">
						<h4><?php _e( 'Group Members', 'buddypress' ); ?></h4>
			
						<form action="<?php bp_group_form_action('members') ?>" method="post" id="group-members-form">
							<?php if ( bp_group_has_members() ) : ?>
				
								<?php if ( bp_group_member_needs_pagination() ) : ?>
									
									<div class="pagination">

										<div id="member-count" class="pag-count">
											<?php bp_group_member_pagination_count() ?>
										</div>

										<div id="member-pagination" class="pagination-links">
											<?php bp_group_member_pagination() ?>
										</div>

									</div>
									
								<?php endif; ?>

								<?php do_action( 'bp_before_group_members_list' ) ?>

								<ul id="member-list" class="item-list">
									<?php while ( bp_group_members() ) : bp_group_the_member(); ?>
										
										<li>
											<?php bp_group_member_avatar_thumb() ?>
											<h5><?php bp_group_member_link() ?></h5>
											<span class="activity"><?php bp_group_member_joined_since() ?></span>
						
											<?php do_action( 'bp_group_members_list_item' ) ?>
											
											<?php if ( function_exists( 'friends_install' ) ) : ?>
												
												<div class="action">
													<?php bp_add_friend_button( bp_get_group_member_id() ) ?>
													
													<?php do_action( 'bp_group_members_list_item_action' ) ?>
												</div>
												
											<?php endif; ?>
										</li>
										
									<?php endwhile; ?>
									
								</ul>

								<?php do_action( 'bp_after_group_members_list' ) ?>
								
							<?php else: ?>

								<div id="message" class="info">
									<p><?php _e( 'This group has no members.', 'buddypress' ); ?></p>
								</div>

							<?php endif;?>
			
						<input type="hidden" name="group_id" id="group_id" value="<?php bp_group_id() ?>" />
						</form>
					</div>
					
					</div>
				</div><!-- end of group profile -->
					
				<?php do_action( 'bp_after_group_content' ) ?>
				</div><!-- end of right column -->
		 
			

		<?php endwhile; else: ?>

			<div id="message" class="error">
				<p><?php _e("Sorry, the group does not exist.", "buddypress"); ?></p>
			</div>

		<?php endif;?>
			<br class="clear" />
        </div>
        <!--end of container -->
       <?php get_footer();?>