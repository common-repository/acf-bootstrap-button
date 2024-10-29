<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('acf_field_bbutton') ) :


    class acf_field_bbutton extends acf_field {

        // vars
        var $settings, // will hold info such as dir / path
            $defaults; // will hold default field options


        /*
        *  __construct
        *
        *  Set name / label needed for actions / filters
        *
        *  @since	3.6
        *  @date	23/01/13
        */

        function __construct( $settings )
        {
            // vars
            $this->name = 'bbutton';
            $this->label = __('Button','acf-bootstrap-button');
            $this->category = __('Bootstrap','acf-bootstrap-button'); // Basic, Content, Choice, etc
            $this->defaults = array(
                'bootstrap_version' => 3,
                'allow_advanced_3'=> array(
                    'text', 'tag', 'rel', 'style', 'size', 'block', 'active_state', 'disabled_state', 'css_class'
                ),
                'allow_advanced_4'=> array(
                    'text', 'tag', 'rel', 'style', 'outline', 'size', 'block', 'active_state', 'disabled_state', 'css_class'
                ),
                'default_text'	=> '',
                'default_tag'	=> 'a',
                'default_rel'	=> '',
                'default_style_3'	=> 'default',
                'default_style_4'	=> 'primary',
                'default_outline_4' => 0,
                'default_size_3'	=> '',
                'default_size_4'	=> '',
                'default_block'	=> 0,
                'default_active_state'	=> 0,
                'default_disabled_state'	=> 0,
                'default_css_class'	=> '',
            );


            // do not delete!
            parent::__construct();


            // settings
            $this->settings = $settings;

        }


        /**
        *  create_options()
        *
        *  Create extra options for your field. This is rendered when editing a field.
        *  The value of $field['name'] can be used (like below) to save extra data to the $field
        *
        *  @type	action
        *  @since	3.6
        *  @date	23/01/13
        *
        *  @param	$field	- an array holding all the field's data
        */

        function create_options( $field )
        {
            // defaults?
            $field = array_merge($this->defaults, $field);


            // key is needed in the field names to correctly save the data
            $key = $field['name'];


            // Create Field Options HTML
            ?>
            <tr class="field_option field_option_<?php echo $this->name; ?> acf-field-setting-bootstrap_version">
                <td class="label">
                    <label><?php _e("Bootstrap Version",'acf-bootstrap-button'); ?></label>
                    <p class="description"><?php _e("Choose the bootstrap version of your theme.",'acf-bootstrap-button'); ?></p>
                </td>
                <td>
                    <?php

                    do_action('acf/create_field', array(
                        'type'		=>	'radio',
                        'name'		=>	'fields['.$key.'][bootstrap_version]',
                        'value'		=>	$field['bootstrap_version'],
                        'layout'	=>	'horizontal',
                        'choices'		=> array(
                            3	=>	__( 'Bootstrap 3', 'acf-bootstrap-button' ),
                            4	=>	__( 'Bootstrap 4', 'acf-bootstrap-button' ),
                        )
                    ));

                    ?>
                </td>
            </tr>
            <tr class="field_option field_option_<?php echo $this->name; ?> acf-field-setting-allow_advanced_3">
                <td class="label">
                    <label><?php _e("Allow Advanced Options",'acf-bootstrap-button'); ?></label>
                    <p class="description"><?php _e("Display advanced button options (text, tag, rel, style, size, block, active state, disabled state and css class).",'acf-bootstrap-button'); ?></p>
                </td>
                <td>
                    <?php

                    do_action('acf/create_field', array(
                        'type'		=>	'checkbox',
                        'name'		=>	'fields['.$key.'][allow_advanced_3]',
                        'value'		=>	$field['allow_advanced_3'],
                        'layout'	=>	'horizontal',
                        'choices'	=> array(
                            'text'              => __('Text', 'acf-bootstrap-button'),
                            'tag'	            => __("Tag",'acf-bootstrap-button'),
                            'rel'	            => __("Rel",'acf-bootstrap-button'),
                            'style'	            => __("Style",'acf-bootstrap-button'),
                            'size'		        => __("Size",'acf-bootstrap-button'),
                            'block'		        => __("Block",'acf-bootstrap-button'),
                            'active_state'	    => __("Active State",'acf-bootstrap-button'),
                            'disabled_state'	=> __("Disabled State",'acf-bootstrap-button'),
                            'css_class'	        => __("CSS Class",'acf-bootstrap-button'),
                        )
                    ));

                    ?>
                </td>
            </tr>
            <tr class="field_option field_option_<?php echo $this->name; ?> acf-field-setting-allow_advanced_4">
                <td class="label">
                    <label><?php _e("Allow Advanced Options",'acf-bootstrap-button'); ?></label>
                    <p class="description"><?php _e("Display advanced button options (text, tag, rel, style, outline, size, block, active state, disabled state and css class).",'acf-bootstrap-button'); ?></p>
                </td>
                <td>
                    <?php

                    do_action('acf/create_field', array(
                        'type'		=>	'checkbox',
                        'name'		=>	'fields['.$key.'][allow_advanced_4]',
                        'value'		=>	$field['allow_advanced_4'],
                        'layout'	=>	'horizontal',
                        'choices'	=> array(
                            'text'              => __('Text', 'acf-bootstrap-button'),
                            'tag'	            => __("Tag",'acf-bootstrap-button'),
                            'rel'	            => __("Rel",'acf-bootstrap-button'),
                            'style'	            => __("Style",'acf-bootstrap-button'),
                            'outline'	        => __("Outline",'acf-bootstrap-button'),
                            'size'		        => __("Size",'acf-bootstrap-button'),
                            'block'		        => __("Block",'acf-bootstrap-button'),
                            'active_state'	    => __("Active State",'acf-bootstrap-button'),
                            'disabled_state'	=> __("Disabled State",'acf-bootstrap-button'),
                            'css_class'	        => __("CSS Class",'acf-bootstrap-button'),
                        )
                    ));

                    ?>
                </td>
            </tr>
            <tr class="field_option field_option_<?php echo $this->name; ?>">
                <td class="label">
                    <label><?php _e("Default Button Text",'acf-bootstrap-button'); ?></label>
                    <p class="description"><?php _e("Set the default text of the button when you create a new button.",'acf-bootstrap-button'); ?></p>
                </td>
                <td>
                    <?php

                    do_action('acf/create_field', array(
                        'type'		=>	'text',
                        'name'		=>	'fields['.$key.'][default_text]',
                        'value'		=>	$field['default_text'],
                        'layout'	=>	'horizontal',
                    ));

                    ?>
                </td>
            </tr>
            <tr class="field_option field_option_<?php echo $this->name; ?>">
                <td class="label">
                    <label><?php _e("Default Tag",'acf-bootstrap-button'); ?></label>
                    <p class="description"><?php _e("Set the default button tag when creating a new button.",'acf-bootstrap-button'); ?></p>
                </td>
                <td>
                    <?php

                    do_action('acf/create_field', array(
                        'type'		=>	'select',
                        'name'		=>	'fields['.$key.'][default_tag]',
                        'value'		=>	$field['default_tag'],
                        'choices'	=> array(
                            'a'		    => __("Link",'acf-bootstrap-button'),
                            'button'    => __("Button",'acf-bootstrap-button'),
                            'input' 	=> __("Input",'acf-bootstrap-button'),
                            'submit'	=> __("Submit",'acf-bootstrap-button'),
                            'reset'	    => __("Reset",'acf-bootstrap-button'),
                        )
                    ));

                    ?>
                </td>
            </tr>
            <tr class="field_option field_option_<?php echo $this->name; ?>">
                <td class="label">
                    <label><?php _e("Default Rel",'acf-bootstrap-button'); ?></label>
                    <p class="description"><?php _e("Set the default button relationship when creating a new button.",'acf-bootstrap-button'); ?></p>
                </td>
                <td>
                    <?php

                    do_action('acf/create_field', array(
                        'type'		=>	'select',
                        'name'		=>	'fields['.$key.'][default_rel]',
                        'value'		=>	$field['default_rel'],
                        'choices'	=> array(
                            ''              => __("No Rel",'acf-bootstrap-button'),
                            'alternate'     => __("Alternate",'acf-bootstrap-button'),
                            'author'        => __("Author",'acf-bootstrap-button'),
                            'bookmark'      => __("Bookmark",'acf-bootstrap-button'),
                            'external'      => __("External",'acf-bootstrap-button'),
                            'help'          => __("Help",'acf-bootstrap-button'),
                            'license'       => __("License",'acf-bootstrap-button'),
                            'next'          => __("Next",'acf-bootstrap-button'),
                            'nofollow'      => __("Nofollow",'acf-bootstrap-button'),
                            'noreferrer'    => __("Noreferrer",'acf-bootstrap-button'),
                            'noopener'      => __("Noopener",'acf-bootstrap-button'),
                            'prev'          => __("Prev",'acf-bootstrap-button'),
                            'search'        => __("Search",'acf-bootstrap-button'),
                            'tag'           => __("Tag",'acf-bootstrap-button'),
                        )
                    ));
                    ?>
                </td>
            </tr>
            <tr class="field_option field_option_<?php echo $this->name; ?> acf-field-setting-default_style_3">
                <td class="label">
                    <label><?php _e("Default Style",'acf-bootstrap-button'); ?></label>
                    <p class="description"><?php _e("Set the default button style when creating a new button.",'acf-bootstrap-button'); ?></p>
                </td>
                <td>
                    <?php

                    do_action('acf/create_field', array(
                        'type'          =>	'select',
                        'name'		    =>	'fields['.$key.'][default_style_3]',
                        'value'		    =>	$field['default_style_3'],
                        'choices'		=> array(
                            'btn-default'		=> __("Default",'acf-bootstrap-button'),
                            'btn-primary'		=> __("Primary",'acf-bootstrap-button'),
                            'btn-success'		=> __("Success",'acf-bootstrap-button'),
                            'btn-info'			=> __("Info",'acf-bootstrap-button'),
                            'btn-warning'		=> __("Warning",'acf-bootstrap-button'),
                            'btn-danger'		=> __("Danger",'acf-bootstrap-button'),
                            'btn-link'		    => __("Link",'acf-bootstrap-button'),
                        )
                    ));

                    ?>
                </td>
            </tr>
            <tr class="field_option field_option_<?php echo $this->name; ?> acf-field-setting-default_style_4">
                <td class="label">
                    <label><?php _e("Default Style",'acf-bootstrap-button'); ?></label>
                    <p class="description"><?php _e("Set the default button style when creating a new button.",'acf-bootstrap-button'); ?></p>
                </td>
                <td>
                    <?php

                    do_action('acf/create_field', array(
                        'type'          =>	'select',
                        'name'		    =>	'fields['.$key.'][default_style_4]',
                        'value'		    =>	$field['default_style_4'],
                        'choices'		=> array(
                            'btn-primary'		=> __("Primary",'acf-bootstrap-button'),
                            'btn-secondary'		=> __("Secondary",'acf-bootstrap-button'),
                            'btn-success'		=> __("Success",'acf-bootstrap-button'),
                            'btn-danger'		=> __("Danger",'acf-bootstrap-button'),
                            'btn-warning'		=> __("Warning",'acf-bootstrap-button'),
                            'btn-info'			=> __("Info",'acf-bootstrap-button'),
                            'btn-light'			=> __("Light",'acf-bootstrap-button'),
                            'btn-dark'			=> __("Dark",'acf-bootstrap-button'),
                            'btn-link'		    => __("Link",'acf-bootstrap-button'),
                        )
                    ));

                    ?>
                </td>
            </tr>
            <tr class="field_option field_option_<?php echo $this->name; ?> acf-field-setting-default_outline_4">
                <td class="label">
                    <label><?php _e("Default Outline",'acf-bootstrap-button'); ?></label>
                    <p class="description"><?php _e("Set the default button outline when creating a new button.",'acf-bootstrap-button'); ?></p>
                </td>
                <td>
                    <?php

                    do_action('acf/create_field', array(
                        'type'		=>	'radio',
                        'name'		=>	'fields['.$key.'][default_outline_4]',
                        'value'		=>	$field['default_outline_4'],
                        'layout'	=>	'horizontal',
                        'choices'		=> array(
                            1	=>	__( 'Yes', 'acf-bootstrap-button' ),
                            0	=>	__( 'No', 'acf-bootstrap-button' ),
                        )
                    ));

                    ?>
                </td>
            </tr>
            <tr class="field_option field_option_<?php echo $this->name; ?> acf-field-setting-default_size_3">
                <td class="label">
                    <label><?php _e("Default Size",'acf-bootstrap-button'); ?></label>
                    <p class="description"><?php _e("Set the default size when creating a new button.",'acf-bootstrap-button'); ?></p>
                </td>
                <td>
                    <?php

                    do_action('acf/create_field', array(
                        'type'		=>	'select',
                        'name'		=>	'fields['.$key.'][default_size_3]',
                        'value'		=>	$field['default_size_3'],
                        'choices'		=> array(
                            ''			    => __("Default",'acf-bootstrap-button'),
                            'btn-lg'		=> __("Large",'acf-bootstrap-button'),
                            'btn-sm'		=> __("Small",'acf-bootstrap-button'),
                            'btn-xs'		=> __("Extra Small",'acf-bootstrap-button'),
                        )
                    ));

                    ?>
                </td>
            </tr>
            <tr class="field_option field_option_<?php echo $this->name; ?> acf-field-setting-default_size_4">
                <td class="label">
                    <label><?php _e("Default Size",'acf-bootstrap-button'); ?></label>
                    <p class="description"><?php _e("Set the default size when creating a new button.",'acf-bootstrap-button'); ?></p>
                </td>
                <td>
                    <?php

                    do_action('acf/create_field', array(
                        'type'		=>	'select',
                        'name'		=>	'fields['.$key.'][default_size_4]',
                        'value'		=>	$field['default_size_4'],
                        'choices'		=> array(
                            ''			    => __("Default",'acf-bootstrap-button'),
                            'btn-lg'		=> __("Large",'acf-bootstrap-button'),
                            'btn-sm'		=> __("Small",'acf-bootstrap-button'),
                        )
                    ));

                    ?>
                </td>
            </tr>
            <tr class="field_option field_option_<?php echo $this->name; ?>">
                <td class="label">
                    <label><?php _e("Default Block Level",'acf-bootstrap-button'); ?></label>
                    <p class="description"><?php _e("Set the default block level button when creating a new button.",'acf-bootstrap-button'); ?></p>
                </td>
                <td>
                    <?php

                    do_action('acf/create_field', array(
                        'type'		=>	'radio',
                        'name'		=>	'fields['.$key.'][default_block]',
                        'value'		=>	$field['default_block'],
                        'layout'	=>	'horizontal',
                        'choices'		=> array(
                            1	=>	__( 'Yes', 'acf-bootstrap-button' ),
                            0	=>	__( 'No', 'acf-bootstrap-button' ),
                        )
                    ));

                    ?>
                </td>
            </tr>
            <tr class="field_option field_option_<?php echo $this->name; ?>">
                <td class="label">
                    <label><?php _e("Default Active State",'acf-bootstrap-button'); ?></label>
                    <p class="description"><?php _e("Set active state as default when creating a new button.",'acf-bootstrap-button'); ?></p>
                </td>
                <td>
                    <?php

                    do_action('acf/create_field', array(
                        'type'		=>	'radio',
                        'name'		=>	'fields['.$key.'][default_active_state]',
                        'value'		=>	$field['default_active_state'],
                        'layout'	=>	'horizontal',
                        'choices'		=> array(
                            1	=>	__( 'Yes', 'acf-bootstrap-button' ),
                            0	=>	__( 'No', 'acf-bootstrap-button' ),
                        )
                    ));

                    ?>
                </td>
            </tr>
            <tr class="field_option field_option_<?php echo $this->name; ?>">
                <td class="label">
                    <label><?php _e("Default Disabled State",'acf-bootstrap-button'); ?></label>
                    <p class="description"><?php _e("Set disabled state as default when creating a new button.",'acf-bootstrap-button'); ?></p>
                </td>
                <td>
                    <?php

                    do_action('acf/create_field', array(
                        'type'		=>	'radio',
                        'name'		=>	'fields['.$key.'][default_disabled_state]',
                        'value'		=>	$field['default_disabled_state'],
                        'layout'	=>	'horizontal',
                        'choices'		=> array(
                            1	=>	__( 'Yes', 'acf-bootstrap-button' ),
                            0	=>	__( 'No', 'acf-bootstrap-button' ),
                        )
                    ));

                    ?>
                </td>
            </tr>
            <tr class="field_option field_option_<?php echo $this->name; ?>">
                <td class="label">
                    <label><?php _e("Default CSS Class",'acf-bootstrap-button'); ?></label>
                    <p class="description"><?php _e("Set default button css class when creating a new button.",'acf-bootstrap-button'); ?></p>
                </td>
                <td>
                    <?php

                    do_action('acf/create_field', array(
                        'type'		=>	'text',
                        'name'		=>	'fields['.$key.'][default_css_class]',
                        'value'		=>	$field['default_css_class'],
                    ));

                    ?>
                </td>
            </tr>
            <?php

        }


        /**
        *  create_field()
        *
        *  Create the HTML interface for your field
        *
        *  @param	$field - an array holding all the field's data
        *
        *  @type	action
        *  @since	3.6
        *  @date	23/01/13
        */

        function create_field( $field )
        {
            // defaults?
            $field = array_merge($this->defaults, $field);

            // perhaps use $field['preview_size'] to alter the markup?

            if (!isset($field['value']['bootstrap_version']))
                $field['value']['bootstrap_version'] = $field['bootstrap_version'];
            elseif ($field['value']['bootstrap_version'] != $field['bootstrap_version'])
                $field['value']['bootstrap_version'] = $field['bootstrap_version'];

            $bv = $field['value']['bootstrap_version'];

            $field['value']['text'] = ( isset( $field['value']['text'] ) ) ? $field['value']['text'] : $field['default_text'];
            $field['value']['tag'] = ( isset( $field['value']['tag'] ) ) ? $field['value']['tag'] : $field['default_tag'];
            $field['value']['rel'] = ( isset( $field['value']['rel'] ) ) ? $field['value']['rel'] : $field['default_rel'];
            $field['value']['style_' . $bv] = ( isset( $field['value']['style_' . $bv] ) ) ? $field['value']['style_' . $bv] : $field['default_style_' . $bv];

            if($bv == 4)
                $field['value']['outline_' . $bv] = ( isset( $field['value']['outline_' . $bv] ) ) ? $field['value']['outline_' . $bv] : $field['default_outline_' . $bv];

            $field['value']['size_' . $bv] = ( isset( $field['value']['size_' . $bv] ) ) ? $field['value']['size_' . $bv] : $field['default_size_' . $bv];
            $field['value']['block'] = ( isset( $field['value']['block'] ) ) ? $field['value']['block'] : $field['default_block'];
            $field['value']['active_state'] = ( isset( $field['value']['active_state'] ) ) ? $field['value']['active_state'] : $field['default_active_state'];
            $field['value']['disabled_state'] = ( isset( $field['value']['disabled_state'] ) ) ? $field['value']['disabled_state'] : $field['default_disabled_state'];
            $field['value']['css_class'] = ( isset( $field['value']['css_class'] ) ) ? $field['value']['css_class'] : $field['default_css_class'];

            $url_exists = true;
            if (  ! isset($field['value']['url'] ) || $field['value']['url'] == ''){
                $url_exists = false;
            }

            // create Field HTML
            ?>
            <div class="acf-bbutton-field" id="acf-<?php echo esc_attr($field['key']); ?>" data-key="<?php echo esc_attr($field['key']); ?>">

                <?php if ( in_array('text', $field['allow_advanced_' . $bv] ) ) { ?>

                    <div class="acf-bbutton-subfield acf-bbutton-text">
                        <div class="acf-label">
                            <label for="acf-bbutton-<?php echo esc_attr($field['key']); ?>-text"><?php _e("Text",'acf-bootstrap-button'); ?></label>
                        </div>
                        <div class="acf-input">
                            <input  type="text"
                                    name="<?php echo esc_attr($field['name']); ?>[text]"
                                    id="acf-bbutton-<?php echo esc_attr($field['key']); ?>-text"
                                    value="<?php echo esc_attr($field['value']['text']); ?>"
                            />
                        </div>
                    </div>

                <?php } else { ?>
                    <input type="hidden" name="<?php echo esc_attr($field['name']) ?>[text]" id="acf-bbutton-<?php echo esc_attr($field['key']); ?>-text" value="<?php echo esc_attr($field['value']['text']); ?>" />

                <?php } if ( in_array('tag', $field['allow_advanced_' . $bv] ) ) { ?>

                    <div class="acf-bbutton-subfield acf-bbutton-tag">
                        <div class="acf-label">
                            <label for="acf-bbutton-<?php echo esc_attr($field['key']) ?>-tag"><?php _e("Tag",'acf-bootstrap-button'); ?></label>
                        </div>
                        <div class="acf-input">
                            <select
                                    name="<?php echo esc_attr($field['name']) ?>[tag]"
                                    id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-tag"
                                    class="acf-bbutton-select-tag"
                            >
                                <option value="a" <?php if ( $field['value']['tag'] == 'a' ) echo 'selected'; ?>><?php _e("Link",'acf-bootstrap-button'); ?></option>
                                <option value="button" <?php if ( $field['value']['tag'] == 'button' ) echo 'selected'; ?>><?php _e("Button",'acf-bootstrap-button'); ?></option>
                                <option value="input" <?php if ( $field['value']['tag'] == 'input' ) echo 'selected'; ?>><?php _e("Input",'acf-bootstrap-button'); ?></option>
                                <option value="submit" <?php if ( $field['value']['tag'] == 'submit' ) echo 'selected'; ?>><?php _e("Submit",'acf-bootstrap-button'); ?></option>
                                <option value="reset" <?php if ( $field['value']['tag'] == 'reset' ) echo 'selected'; ?>><?php _e("Reset",'acf-bootstrap-button'); ?></option>
                            </select>
                        </div>
                    </div>

                <?php } else { ?>
                    <input type="hidden" name="<?php echo esc_attr($field['name']) ?>[tag]" id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-tag" value="<?php echo esc_attr($field['value']['tag']); ?>" />
                <?php } ?>

                <div class="acf-bbutton-subfield acf-bbutton-url" <?php if ($field['value']['tag'] != 'a') { echo ' style="display:none;"'; } ?>>
                    <div class="acf-label">
                        <label for="acf-bbutton-<?php echo esc_attr($field['key']) ?>_url"><?php _e("URL",'acf-bootstrap-button'); ?></label>
                    </div>
                    <div class="acf-input">
                        <?php if ($url_exists) : ?>
                            <?php _e("Currently selected page",'acf-bootstrap-button'); ?>:
                        <?php endif; ?>

                        <input type="hidden" name="<?php echo $field['name']; ?>[url]" id="acf-bbutton-<?php echo $field['key']; ?>-url" value="<?php echo $field['value']['url']; ?>">
                        <input type="hidden" name="<?php echo $field['name']; ?>[title]" id="acf-bbutton-<?php echo $field['key']; ?>-title" value="<?php echo $field['value']['title']; ?>">
                        <input type="hidden" name="<?php echo $field['name']; ?>[target]" id="acf-bbutton-<?php echo $field['key']; ?>-target" value="<?php echo ( isset($field['value']['target']) ) ? $field['value']['target'] : ''; ?>">

                        <div id="acf-bbutton-<?php echo esc_attr($field['key']); ?>-url-exists"<?php if (!$url_exists) { echo ' style="display:none;"'; } ?>>
                            <?php _e('URL', 'acf-bootstrap-button') ?>: <em id="acf-bbutton-<?php echo $field['key']; ?>-url-label"><a href="<?php echo $field['value']['url']; ?>" target="_blank"><?php echo $field['value']['url']; ?></a></em><br>
                            <?php _e('Title', 'acf-bootstrap-button') ?>: <em id="acf-bbutton-<?php echo $field['key']; ?>-title-label"><?php echo $field['value']['title']; ?></em><br>
                            <?php _e('Open in new window', 'acf-bootstrap-button') ?>: <em id="acf-bbutton-<?php echo $field['key']; ?>-target-label"><?php if (isset($field['value']['target']) && $field['value']['target'] == '_blank') { _e('Yes', 'acf-bootstrap-button'); } else { _e('No', 'acf-bootstrap-button'); } ?></em>
                        </div>
                    </div>
                    <div id="acf-bbutton-<?php echo $field['key']; ?>-none"<?php if ($url_exists) { echo ' style="display:none;"'; } ?>>
                        <em><?php _e('No link selected yet', 'acf-bootstrap-button') ?></em>
                    </div>
                    <p>
                        <a href="" class="acf-bbutton-url-btn acf-button grey" id="acf-bbutton-<?php echo $field['key']; ?>"><?php if (!$url_exists) { _e('Insert Link', 'acf-bootstrap-button'); }else{ _e('Edit Link', 'acf-bootstrap-button'); } ?></a>
                        <a href="" class="acf-bbutton-url-remove-btn acf-button grey" id="acf-bbutton-<?php echo $field['key']; ?>-remove"<?php if (!$url_exists) { echo ' style="display:none;"'; } ?>><?php _e('Remove Link', 'acf-bootstrap-button'); ?></a>
                    </p>
                </div>

                <?php if ( in_array('rel', $field['allow_advanced_' . $bv] ) ) { ?>

                <div class="acf-bbutton-subfield acf-bbutton-rel" <?php if ($field['value']['tag'] != 'a') { echo ' style="display:none;"'; } ?>>
                    <div class="acf-label">
                        <label for="acf-bbutton-<?php echo esc_attr($field['key']) ?>-rel"><?php _e("Rel",'acf-bootstrap-button'); ?></label>
                    </div>
                    <div class="acf-input">
                        <select
                                name="<?php echo esc_attr($field['name']) ?>[rel]"
                                id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-rel"
                                class="acf-bbutton-select-rel"
                        >
                            <option value="" <?php if ( $field['value']['rel'] == '' ) echo 'selected'; ?>><?php _e("No Rel",'acf-bootstrap-button'); ?></option>
                            <option value="alternate" <?php if ( $field['value']['rel'] == 'alternate' ) echo 'selected'; ?>><?php _e("Alternate",'acf-bootstrap-button'); ?></option>
                            <option value="author" <?php if ( $field['value']['rel'] == 'author' ) echo 'selected'; ?>><?php _e("Author",'acf-bootstrap-button'); ?></option>
                            <option value="bookmark" <?php if ( $field['value']['rel'] == 'bookmark' ) echo 'selected'; ?>><?php _e("Bookmark",'acf-bootstrap-button'); ?></option>
                            <option value="external" <?php if ( $field['value']['rel'] == 'external' ) echo 'selected'; ?>><?php _e("External",'acf-bootstrap-button'); ?></option>
                            <option value="help" <?php if ( $field['value']['rel'] == 'help' ) echo 'selected'; ?>><?php _e("Help",'acf-bootstrap-button'); ?></option>
                            <option value="license" <?php if ( $field['value']['rel'] == 'license' ) echo 'selected'; ?>><?php _e("License",'acf-bootstrap-button'); ?></option>
                            <option value="next" <?php if ( $field['value']['rel'] == 'next' ) echo 'selected'; ?>><?php _e("Next",'acf-bootstrap-button'); ?></option>
                            <option value="nofollow" <?php if ( $field['value']['rel'] == 'nofollow' ) echo 'selected'; ?>><?php _e("Nofollow",'acf-bootstrap-button'); ?></option>
                            <option value="noreferrer" <?php if ( $field['value']['rel'] == 'noreferrer' ) echo 'selected'; ?>><?php _e("Noreferrer",'acf-bootstrap-button'); ?></option>
                            <option value="noopener" <?php if ( $field['value']['rel'] == 'noopener' ) echo 'selected'; ?>><?php _e("Noopener",'acf-bootstrap-button'); ?></option>
                            <option value="prev" <?php if ( $field['value']['rel'] == 'prev' ) echo 'selected'; ?>><?php _e("Prev",'acf-bootstrap-button'); ?></option>
                            <option value="search" <?php if ( $field['value']['rel'] == 'search' ) echo 'selected'; ?>><?php _e("Search",'acf-bootstrap-button'); ?></option>
                            <option value="tag" <?php if ( $field['value']['rel'] == 'tag' ) echo 'selected'; ?>><?php _e("Tag",'acf-bootstrap-button'); ?></option>
                        </select>
                    </div>
                </div>

                <?php } else { ?>
                <input type="hidden" name="<?php echo esc_attr($field['name']) ?>[rel]" id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-rel" value="<?php echo esc_attr($field['value']['rel']); ?>" />
                <?php } if ( in_array('style', $field['allow_advanced_' . $bv] ) ) { ?>

                    <div class="acf-bbutton-subfield acf-bbutton-style-">
                        <div class="acf-label">
                            <label for="acf-bbutton-<?php echo esc_attr($field['key']) ?>-style"><?php _e("Style",'acf-bootstrap-button'); ?></label>
                        </div>
                        <div class="acf-input">
                            <select
                                    name="<?php echo esc_attr($field['name']) ?>[style_<?php echo $bv;?>]"
                                    id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-style"
                            >
                                <?php if($bv == 3) :?>
                                    <option value="btn-default" <?php if ( $field['value']['style_' . $bv] == 'btn-default' ) echo 'selected'; ?>><?php _e("Default",'acf-bootstrap-button'); ?></option>
                                    <option value="btn-primary" <?php if ( $field['value']['style_' . $bv] == 'btn-primary' ) echo 'selected'; ?>><?php _e("Primary",'acf-bootstrap-button'); ?></option>
                                    <option value="btn-success" <?php if ( $field['value']['style_' . $bv] == 'btn-success' ) echo 'selected'; ?>><?php _e("Success",'acf-bootstrap-button'); ?></option>
                                    <option value="btn-info" <?php if ( $field['value']['style_' . $bv] == 'btn-info' ) echo 'selected'; ?>><?php _e("Info",'acf-bootstrap-button'); ?></option>
                                    <option value="btn-warning" <?php if ( $field['value']['style_' . $bv] == 'btn-warning' ) echo 'selected'; ?>><?php _e("Warning",'acf-bootstrap-button'); ?></option>
                                    <option value="btn-danger" <?php if ( $field['value']['style_' . $bv] == 'btn-danger' ) echo 'selected'; ?>><?php _e("Danger",'acf-bootstrap-button'); ?></option>
                                    <option value="btn-link" <?php if ( $field['value']['style_' . $bv] == 'btn-link' ) echo 'selected'; ?>><?php _e("Link",'acf-bootstrap-button'); ?></option>
                                <?php else: ?>
                                    <option value="btn-primary" <?php if ( $field['value']['style_' . $bv] == 'btn-primary' ) echo 'selected'; ?>><?php _e("Primary",'acf-bootstrap-button'); ?></option>
                                    <option value="btn-secondary" <?php if ( $field['value']['style_' . $bv] == 'btn-secondary' ) echo 'selected'; ?>><?php _e("Secondary",'acf-bootstrap-button'); ?></option>
                                    <option value="btn-success" <?php if ( $field['value']['style_' . $bv] == 'btn-success' ) echo 'selected'; ?>><?php _e("Success",'acf-bootstrap-button'); ?></option>
                                    <option value="btn-danger" <?php if ( $field['value']['style_' . $bv] == 'btn-danger' ) echo 'selected'; ?>><?php _e("Danger",'acf-bootstrap-button'); ?></option>
                                    <option value="btn-warning" <?php if ( $field['value']['style_' . $bv] == 'btn-warning' ) echo 'selected'; ?>><?php _e("Warning",'acf-bootstrap-button'); ?></option>
                                    <option value="btn-info" <?php if ( $field['value']['style_' . $bv] == 'btn-info' ) echo 'selected'; ?>><?php _e("Info",'acf-bootstrap-button'); ?></option>
                                    <option value="btn-light" <?php if ( $field['value']['style_' . $bv] == 'btn-light' ) echo 'selected'; ?>><?php _e("Light",'acf-bootstrap-button'); ?></option>
                                    <option value="btn-dark" <?php if ( $field['value']['style_' . $bv] == 'btn-dark' ) echo 'selected'; ?>><?php _e("Dark",'acf-bootstrap-button'); ?></option>
                                    <option value="btn-link" <?php if ( $field['value']['style_' . $bv] == 'btn-link' ) echo 'selected'; ?>><?php _e("Link",'acf-bootstrap-button'); ?></option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                <?php } else { ?>
                    <input type="hidden" name="<?php echo esc_attr($field['name']) ?>[style_<?php echo $bv;?>]" id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-style" value="<?php echo esc_attr($field['value']['style_' . $bv]); ?>" />

                <?php } if ( in_array('outline', $field['allow_advanced_' . $bv] ) ) { ?>

                    <div class="acf-bbutton-subfield acf-bbutton-outline">
                        <div class="acf-label">
                            <label for="acf-bbutton-<?php echo esc_attr($field['key']); echo ( $field['value']['outline_' . $bv] == 1 ) ? '-outline-no' : '-outline-yes';?>"><?php _e('Outline','acf-bootstrap-button'); ?></label>
                        </div>
                        <div class="acf-input">
                            <label>
                                <input  type="radio"
                                        name="<?php echo esc_attr($field['name']) ?>[outline_<?php echo $bv;?>]"
                                        id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-outline-yes"
                                        value="1"
                                    <?php if ( $field['value']['outline_' . $bv] == 1 ) echo 'checked'; ?>
                                />
                                <?php _e("Yes",'acf-bootstrap-button'); ?>
                            </label>
                            <label>
                                <input  type="radio"
                                        name="<?php echo esc_attr($field['name']) ?>[outline_<?php echo $bv;?>]"
                                        id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-outline-no"
                                        value="0"
                                    <?php if ( $field['value']['outline_' . $bv] == 0 ) echo 'checked'; ?>
                                />
                                <?php _e("No",'acf-bootstrap-button'); ?>
                            </label>
                        </div>
                    </div>

                <?php } else { ?>
                    <input type="hidden" name="<?php echo esc_attr($field['name']) ?>[outline_<?php echo $bv;?>]" id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-outline" value="<?php echo esc_attr($field['value']['outline_' . $bv]); ?>" />

                <?php } if ( in_array('size', $field['allow_advanced_' . $bv] ) ) { ?>

                    <div class="acf-bbutton-subfield acf-bbutton-size">
                        <div class="acf-label">
                            <label for="acf-bbutton-<?php echo esc_attr($field['key']) ?>-size"><?php _e("Size",'acf-bootstrap-button'); ?></label>
                        </div>
                        <div class="acf-input">
                            <select
                                    name="<?php echo esc_attr($field['name']) ?>[size_<?php echo $bv;?>]"
                                    id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-size"
                            >
                            <?php if($bv == 3) :?>
                                <option value="" <?php if ( $field['value']['size_' . $bv] == '' ) echo 'selected'; ?>><?php _e("Default",'acf-bootstrap-button'); ?></option>
                                <option value="btn-lg" <?php if ( $field['value']['size_' . $bv] == 'btn-lg' ) echo 'selected'; ?>><?php _e("Large",'acf-bootstrap-button'); ?></option>
                                <option value="btn-sm" <?php if ( $field['value']['size_' . $bv] == 'btn-sm' ) echo 'selected'; ?>><?php _e("Small",'acf-bootstrap-button'); ?></option>
                                <option value="btn-xs" <?php if ( $field['value']['size_' . $bv] == 'btn-xs' ) echo 'selected'; ?>><?php _e("Extra Small",'acf-bootstrap-button'); ?></option>
                            <?php else: ?>
                                <option value="" <?php if ( $field['value']['size'] == '' ) echo 'selected'; ?>><?php _e("Default",'acf-bootstrap-button'); ?></option>
                                <option value="btn-lg" <?php if ( $field['value']['size'] == 'btn-lg' ) echo 'selected'; ?>><?php _e("Large",'acf-bootstrap-button'); ?></option>
                                <option value="btn-sm" <?php if ( $field['value']['size'] == 'btn-sm' ) echo 'selected'; ?>><?php _e("Small",'acf-bootstrap-button'); ?></option>
                            <?php endif; ?>
                            </select>
                        </div>
                    </div>

                <?php } else { ?>
                    <input type="hidden" name="<?php echo esc_attr($field['name']) ?>[size_<?php echo $bv;?>]" id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-size" value="<?php echo esc_attr($field['value']['size_' . $bv]); ?>" />

                <?php } if ( in_array('block', $field['allow_advanced_' . $bv] ) ) { ?>

                    <div class="acf-bbutton-subfield acf-bbutton-block">
                        <div class="acf-label">
                            <label for="acf-bbutton-<?php echo esc_attr($field['key']); echo ( $field['value']['block'] == 1 ) ? '-block-no' : '-block-yes';?>"><?php _e('Block','acf-bootstrap-button'); ?></label>
                        </div>
                        <div class="acf-input">
                            <label>
                                <input  type="radio"
                                        name="<?php echo esc_attr($field['name']) ?>[block]"
                                        id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-block-yes"
                                        value="1"
                                    <?php if ( $field['value']['block'] == 1 ) echo 'checked'; ?>
                                />
                                <?php _e("Yes",'acf-bootstrap-button'); ?>
                            </label>
                            <label>
                                <input  type="radio"
                                        name="<?php echo esc_attr($field['name']) ?>[block]"
                                        id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-block-no"
                                        value="0"
                                    <?php if ( $field['value']['block'] == 0 ) echo 'checked'; ?>
                                />
                                <?php _e("No",'acf-bootstrap-button'); ?>
                            </label>
                        </div>
                    </div>

                <?php } else { ?>
                    <input type="hidden" name="<?php echo esc_attr($field['name']) ?>[block]" id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-block" value="<?php echo esc_attr($field['value']['block']); ?>" />

                <?php } if ( in_array('active_state', $field['allow_advanced_' . $bv] ) ) { ?>

                    <div class="acf-bbutton-subfield acf-bbutton-active-state">
                        <div class="acf-label">
                            <label for="acf-bbutton-<?php echo esc_attr($field['key']); echo ( $field['value']['active_state'] == 1 ) ? '-active-state-no' : '-active-state-yes';?>"><?php _e('Active State','acf-bootstrap-button'); ?></label>
                        </div>
                        <div class="acf-input">
                            <label>
                                <input  type="radio"
                                        name="<?php echo esc_attr($field['name']) ?>[active_state]"
                                        id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-active-state-yes"
                                        value="1"
                                    <?php if ( $field['value']['active_state'] == 1 ) echo 'checked'; ?>
                                />
                                Yes
                            </label>
                            <label>
                                <input  type="radio"
                                        name="<?php echo esc_attr($field['name']) ?>[active_state]"
                                        id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-active-state-no"
                                        value="0"
                                    <?php if ( $field['value']['active_state'] == 0 ) echo 'checked'; ?>
                                />
                                No
                            </label>
                        </div>
                    </div>

                <?php } else { ?>
                    <input type="hidden" name="<?php echo esc_attr($field['name']) ?>[active_state]" id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-active-state" value="<?php echo esc_attr($field['value']['active_state']); ?>" />

                <?php } if ( in_array('disabled_state', $field['allow_advanced_' . $bv] ) ) { ?>

                    <div class="acf-bbutton-subfield acf-bbutton-disabled-state">
                        <div class="acf-label">
                            <label for="acf-bbutton-<?php echo esc_attr($field['key']); echo ( $field['value']['active_state'] == 1 ) ? '-disabled-state-no' : '-disabled-state-yes';?>"><?php _e('Disabled State','acf-bootstrap-button'); ?></label>
                        </div>
                        <div class="acf-input">
                            <label>
                                <input  type="radio"
                                        name="<?php echo esc_attr($field['name']) ?>[disabled_state]"
                                        id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-disabled-state-yes"
                                        value="1"
                                    <?php if ( $field['value']['disabled_state'] == 1 ) echo 'checked'; ?>
                                />
                                Yes
                            </label>
                            <label>
                                <input  type="radio"
                                        name="<?php echo esc_attr($field['name']) ?>[disabled_state]"
                                        id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-disabled-state-no"
                                        value="0"
                                    <?php if ( $field['value']['disabled_state'] == 0 ) echo 'checked'; ?>
                                />
                                No
                            </label>
                        </div>
                    </div>

                <?php } else { ?>
                    <input type="hidden" name="<?php echo esc_attr($field['name']) ?>[disabled_state]" id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-disabled-state" value="<?php echo esc_attr($field['value']['disabled_state']); ?>" />

                <?php } if ( in_array('css_class', $field['allow_advanced_' . $bv] ) ) { ?>

                    <div class="acf-bbutton-subfield acf-bbutton-css-class">
                        <div class="acf-label">
                            <label for="acf-bbutton-<?php echo esc_attr($field['key']) ?>-css-class"><?php _e("Custom CSS Class(es)",'acf-bootstrap-button'); ?></label>
                        </div>
                        <div class="acf-input">
                            <input  type="text"
                                    name="<?php echo esc_attr($field['name']) ?>[css_class]"
                                    id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-css-class"
                                        value="<?php echo esc_attr($field['value']['css_class']) ?>"
                                />
                            </div>
                        </div>

                    <?php } else { ?>
                        <input type="hidden" name="<?php echo esc_attr($field['name']) ?>[css_class]" id="acf-bbutton-<?php echo esc_attr($field['key']) ?>-css-class" value="<?php echo esc_attr($field['value']['css_class']); ?>" />
                    <?php } ?>
                <input type="hidden" name="<?php echo esc_attr($field['name']) ?>[bootstrap_version]" id="acf-bbutton-<?php echo esc_attr($field['key']); ?>-bootstrap_version" value="<?php echo esc_attr($field['value']['bootstrap_version']); ?>" />
            </div>
            <?php
        }


        /**
        *  input_admin_enqueue_scripts()
        *
        *  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
        *  Use this action to add CSS + JavaScript to assist your create_field() action.
        *
        *  $info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
        *  @type	action
        *  @since	3.6
        *  @date	23/01/13
        */

        function input_admin_enqueue_scripts()
        {
            // Note: This function can be removed if not used

            // vars
            $url = $this->settings['url'];
            $version = $this->settings['version'];

            // register & include JS
            wp_register_script( 'acf-input-bbutton', "{$url}assets/js/input.js", array('acf-input'), $version );
            wp_enqueue_script('acf-input-bbutton');

            $translations = array(
                'insert_link' => __('Insert Link', 'acf-bootstrap-button'),
                'edit_link' => __('Edit Link', 'acf-bootstrap-button'),
                'yes' => __('Yes', 'acf-bootstrap-button'),
                'no' => __('No', 'acf-bootstrap-button')
            );

            wp_localize_script('acf-input-bbutton', 'ACFBB', $translations);
            wp_enqueue_script('acf-input-bbutton');


            // register & include CSS
            wp_register_style( 'acf-input-bbutton', "{$url}assets/css/input.css", array('acf-input'), $version );
            wp_enqueue_style('acf-input-bbutton');

        }


        /**
        *  input_admin_head()
        *
        *  This action is called in the admin_head action on the edit screen where your field is created.
        *  Use this action to add CSS and JavaScript to assist your create_field() action.
        *
        *  @info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_head
        *  @type	action
        *  @since	3.6
        *  @date	23/01/13
        */

        /*
        function input_admin_head()
        {
            // Note: This function can be removed if not used
        }
        */

        /**
        *  field_group_admin_enqueue_scripts()
        *
        *  This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
        *  Use this action to add CSS + JavaScript to assist your create_field_options() action.
        *
        *  $info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
        *  @type	action
        *  @since	3.6
        *  @date	23/01/13
        */


        function field_group_admin_enqueue_scripts()
        {
            // Note: This function can be removed if not used

            $this->input_admin_enqueue_scripts();
        }


        /**
        *  field_group_admin_head()
        *
        *  This action is called in the admin_head action on the edit screen where your field is edited.
        *  Use this action to add CSS and JavaScript to assist your create_field_options() action.
        *
        *  @info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_head
        *  @type	action
        *  @since	3.6
        *  @date	23/01/13
        */

        /*
        function field_group_admin_head()
        {
            // Note: This function can be removed if not used
        }
        */

        /**
        *  load_value()
        *
            *  This filter is applied to the $value after it is loaded from the db
        *
        *  @type	filter
        *  @since	3.6
        *  @date	23/01/13
        *
        *  @param	$value - the value found in the database
        *  @param	$post_id - the $post_id from which the value was loaded
        *  @param	$field - the field array holding all the field options
        *
        *  @return	$value - the value to be saved in the database
        */

        /*
        function load_value( $value, $post_id, $field )
        {
            // Note: This function can be removed if not used
            return $value;
        }
        */

        /**
        *  update_value()
        *
        *  This filter is applied to the $value before it is updated in the db
        *
        *  @type	filter
        *  @since	3.6
        *  @date	23/01/13
        *
        *  @param	$value - the value which will be saved in the database
        *  @param	$post_id - the $post_id of which the value will be saved
        *  @param	$field - the field array holding all the field options
        *
        *  @return	$value - the modified value
        */

        /*
        function update_value( $value, $post_id, $field )
        {
            // Note: This function can be removed if not used
            return $value;
        }
        */

        /**
        *  format_value()
        *
        *  This filter is applied to the $value after it is loaded from the db and before it is passed to the create_field action
        *
        *  @type	filter
        *  @since	3.6
        *  @date	23/01/13
        *
        *  @param	$value	- the value which was loaded from the database
        *  @param	$post_id - the $post_id from which the value was loaded
        *  @param	$field	- the field array holding all the field options
        *
        *  @return	$value	- the modified value
        */

        /*
        function format_value( $value, $post_id, $field )
        {
            // defaults?
            /*
            $field = array_merge($this->defaults, $field);
            */

        // perhaps use $field['preview_size'] to alter the $value?


        // Note: This function can be removed if not used
        /*return $value;
    }
    */

        /**
        *  format_value_for_api()
        *
        *  This filter is applied to the $value after it is loaded from the db and before it is passed back to the API functions such as the_field
        *
        *  @type	filter
        *  @since	3.6
        *  @date	23/01/13
        *
        *  @param	$value	- the value which was loaded from the database
        *  @param	$post_id - the $post_id from which the value was loaded
        *  @param	$field	- the field array holding all the field options
        *
        *  @return	$value	- the modified value
        */

        /*
        function format_value_for_api( $value, $post_id, $field )
        {
            // defaults?
            /*
            $field = array_merge($this->defaults, $field);
            */

        // perhaps use $field['preview_size'] to alter the $value?


        // Note: This function can be removed if not used
        /*return $value;
    }
    */

        /**
        *  load_field()
        *
        *  This filter is applied to the $field after it is loaded from the database
        *
        *  @type	filter
        *  @since	3.6
        *  @date	23/01/13
        *
        *  @param	$field - the field array holding all the field options
        *
        *  @return	$field - the field array holding all the field options
        */

        /*
        function load_field( $field )
        {
            // Note: This function can be removed if not used
            return $field;
        }
        */

        /**
        *  update_field()
        *
        *  This filter is applied to the $field before it is saved to the database
        *
        *  @type	filter
        *  @since	3.6
        *  @date	23/01/13
        *
        *  @param	$field - the field array holding all the field options
        *  @param	$post_id - the field group ID (post_type = acf)
        *
        *  @return	$field - the modified field
        */

        /*
        function update_field( $field, $post_id )
        {
            // Note: This function can be removed if not used
            return $field;
        }
        */
    }


    // initialize
    new acf_field_bbutton( $this->settings );


// class_exists check
endif;

?>