<?php

    if( current_user_can( 'edit_users' ) ){
          $customize_url = add_query_arg( 'return', urlencode( remove_query_arg( wp_removable_query_args(), wp_unslash( $_SERVER['REQUEST_URI'] ) ) ), 'customize.php' );
          $customize_background_url  = add_query_arg( array( 'autofocus' => array( 'control' => 'background_image' ) ), $customize_url );
    ?>
<div class="wrap">
      <h1 class="admin-page-title"><?= esc_html( get_admin_page_title() ); ?></h1>

      <form method="post" action="<?= esc_html( admin_url( 'admin-post.php' ) ); ?>">

            <div class="form-description">
                  Plugin description in here
            </div>

            <table class="form-table">
                  <tbody>
                        <tr>
                              <th scope="row">
                                    <label for="wp-clickable-background-active">
                                          Active/Deactive Click :
                                    </label>
                              </th>
                              <td>
                                    <input name="wp-clickable-background-active" 
                                          type="checkbox"
                                          id="wp-clickable-background-active"
                                          <?= ( get_option('wp-clickable-background-active') ? 'checked' : '') ?>
                                          value="1"
                                          class="regular-text" />
                                    <p class="description" id="wp-clickable-background-active-description">
                                          If this is checked the event Click will be active for the background.
                                    </p>
                              </td>
                        </tr>

                        <tr>
                              <th scope="row">
                                    <label for="wp-clickable-background-bglink">
                                          Customizing Background Image :
                                    </label>
                              </th>
                              <td>
                              
                                    <a href="<?= admin_url($customize_background_url); ?>" target="_blank">
                                          <button name="wp-clickable-background-bglink" 
                                                type="button"
                                                id="wp-clickable-background-bglink" >
                                                Customizing Background
                                                </button>
                                    </a>
                                    <p class="description" id="wp-clickable-background-bglink-description">
                                          Click the button above to manage your background image.
                                    </p>
                              </td>
                        </tr>

                        <tr>
                              <th scope="row">
                                    <label for="wp-clickable-background-link">
                                          Page Link/URL :
                                    </label>
                              </th>
                              <td>
                                    <input name="wp-clickable-background-link" 
                                          type="text"
                                          id="wp-clickable-background-link"
                                          value="<?= esc_url(get_option('wp-clickable-background-link')) ?>"
                                          class="regular-text" />
                                    <p class="description" id="wp-clickable-background-link-description">
                                          The page where you will be redirect.
                                    </p>
                              </td>
                        </tr>

                        <tr>
                              <th scope="row">
                                    <label for="wp-clickable-background-new">
                                          Where to open the Link :
                                    </label>
                              </th>
                              <td>
                                    <input name="wp-clickable-background-new" 
                                          type="radio"
                                          id="wp-clickable-background-new-same"
                                          <?= ( get_option('wp-clickable-background-new') == 'same' ? 'checked' : '') ?>
                                          value="same"
                                          class="regular-text" />
                                    <label for="wp-clickable-background-new-same">Same Tab</label><br/>
                                    <input name="wp-clickable-background-new" 
                                          type="radio"
                                          id="wp-clickable-background-new-tab"
                                          <?= ( get_option('wp-clickable-background-new') == 'tab' ? 'checked' : '') ?>
                                          value="tab"
                                          class="regular-text" />
                                    <label for="wp-clickable-background-new-tab">New Tab</label><br/>
                                    <input name="wp-clickable-background-new" 
                                          type="radio"
                                          id="wp-clickable-background-new-window"
                                          <?= ( get_option('wp-clickable-background-new') == 'window' ? 'checked' : '') ?>
                                          value="window"
                                          class="regular-text" />
                                    <label for="wp-clickable-background-new-window">New Window</label><br/>
                                    <p class="description" id="wp-clickable-background-new-description">
                                          Target of the click, the link can be open in the same tab, in a new tab or in a new window.
                                    </p>
                              </td>
                        </tr>

                        <tr>
                              <th scope="row">
                                    <label for="wp-clickable-background-javascript">
                                          Javascript :
                                    </label>
                              </th>
                              <td>
                                    <textarea name="wp-clickable-background-javascript" 
                                          id="wp-clickable-background-javascript"
                                          class="large-text code"
                                          rows="10"><?= stripslashes(get_option('wp-clickable-background-javascript')) ?></textarea>
                                    <p class="description" id="wp-clickable-background-javascript-description">
                                          Add a custom javascript to your link.
                                    </p>
                              </td>
                        </tr>

                  </tbody>
            </table>

            <div class="form-messages">
                  <?php echo get_option('wp-clickable-background-form-message'); ?>
            </div>

            <?php
                wp_nonce_field( 'wp-clickable-background-settings-save', 'wp-clickable-background-form-message' );
                submit_button();
            ?>
      </form>
</div><!-- .wrap -->
<?php
    }
    else {
    ?>
<p> <?php __("You are not authorized to perform this operation.") ?> </p>
<?php   
    }
