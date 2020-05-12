<?php

namespace SetSailCore\CPT\Shortcodes\Slicksyncing;

use SetSailCore\Lib;

class Slicksyncing implements Lib\ShortcodeInterface
{
    private $base;

    function __construct()
    {
        $this->base = 'qodef_slicksyncing';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase()
    {
        return $this->base;
    }

    public function vcMap()
    {
        if (function_exists('vc_map')) {
            vc_map(
                array(
                    'name' => esc_html__('Slicksyncing', 'setsail-core'),
                    'base' => $this->base,
                    'category' => esc_html__('by SETSAIL', 'setsail-core'),
                    'icon' => 'icon-wpb-slicksyncing extended-custom-icon',
                    'params' => array(
                        array(
                            'type' => 'textfield',
                            'param_name' => 'custom_class',
                            'heading' => esc_html__('Custom CSS Class', 'setsail-core'),
                            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS', 'setsail-core')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'style',
                            'heading' => esc_html__('Style', 'setsail-core'),
                            'value' => array(
                                esc_html__('Slicksyncing', 'setsail-core') => 'slicksyncing',
                                esc_html__('Toggle', 'setsail-core') => 'toggle'
                            )
                        ),
                        array(
                            'type' => 'textarea',
                            'height' => '200',
                            'param_name' => 'text_1',
                            'heading' => esc_html__('Title', 'setsail-core'),
                            'group' => 'Level 1'
                        ), array(
                            'type' => 'textfield',
                            'param_name' => 'des_1',
                            'heading' => esc_html__('Description', 'setsail-core'),
                            'group' => 'Level 1'
                        ),
                        array(
                            'type' => 'param_group',
                            'value' => '',
                            'param_name' => 'text_list_1',
                            'group' => 'Level 1',
                            // Note params is mapped inside param-group:
                            'params' => array(
                                array(
                                    'type' => 'textfield',
                                    'value' => '',
                                    'heading' => 'Text list',
                                    'param_name' => 'text',
                                ),
                            )
                        ),
                        array(
                            'type' => 'textarea',
                            'param_name' => 'text_2',
                            'heading' => esc_html__('Title', 'setsail-core'),
                            'group' => 'Level 2'
                        ), array(
                            'type' => 'textfield',
                            'param_name' => 'des_2',
                            'heading' => esc_html__('Description', 'setsail-core'),
                            'group' => 'Level 2'
                        ),
                        array(
                            'type' => 'param_group',
                            'value' => '',
                            'param_name' => 'text_list_2',
                            'group' => 'Level 2',
                            // Note params is mapped inside param-group:
                            'params' => array(
                                array(
                                    'type' => 'textfield',
                                    'value' => '',
                                    'heading' => 'Text list',
                                    'param_name' => 'text',
                                ),
                            )
                        ),
                        array(
                            'type' => 'textarea',
                            'param_name' => 'text_3',
                            'heading' => esc_html__('Title', 'setsail-core'),
                            'group' => 'Level 3'
                        ), array(
                            'type' => 'textfield',
                            'param_name' => 'des_3',
                            'heading' => esc_html__('Description', 'setsail-core'),
                            'group' => 'Level 3'
                        ),
                        array(
                            'type' => 'param_group',
                            'value' => '',
                            'param_name' => 'text_list_3',
                            'group' => 'Level 3',
                            // Note params is mapped inside param-group:
                            'params' => array(
                                array(
                                    'type' => 'textfield',
                                    'value' => '',
                                    'heading' => 'Text list',
                                    'param_name' => 'text',
                                ),
                            )
                        ), array(
                            'type' => 'textarea',
                            'param_name' => 'text_4',
                            'heading' => esc_html__('Title', 'setsail-core'),
                            'group' => 'Level 4'
                        ), array(
                            'type' => 'textfield',
                            'param_name' => 'des_4',
                            'heading' => esc_html__('Description', 'setsail-core'),
                            'group' => 'Level 4'
                        ),
                        array(
                            'type' => 'param_group',
                            'value' => '',
                            'param_name' => 'text_list_4',
                            'group' => 'Level 4',
                            // Note params is mapped inside param-group:
                            'params' => array(
                                array(
                                    'type' => 'textfield',
                                    'value' => '',
                                    'heading' => 'Text list',
                                    'param_name' => 'text',
                                ),
                            )
                        ), array(
                            'type' => 'textarea',
                            'param_name' => 'text_5',
                            'heading' => esc_html__('Title', 'setsail-core'),
                            'group' => 'Level 5'
                        ), array(
                            'type' => 'textfield',
                            'param_name' => 'des_5',
                            'heading' => esc_html__('Description', 'setsail-core'),
                            'group' => 'Level 5'
                        ),
                        array(
                            'type' => 'param_group',
                            'value' => '',
                            'param_name' => 'text_list_5',
                            'group' => 'Level 5',
                            // Note params is mapped inside param-group:
                            'params' => array(
                                array(
                                    'type' => 'textfield',
                                    'value' => '',
                                    'heading' => 'Text list',
                                    'param_name' => 'text',
                                ),
                            )
                        ),
                    )
                )
            );
        }
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script('slicksyncing_js');
        wp_enqueue_style('slicksyncing_css');
    }

    public function render($atts, $content = null)
    {
        $this->enqueue_scripts();
        $default_atts = array(
            'text_1' => '',
            'des_1' => '',
            'text_list_1' => [],
            'text_2' => '',
            'des_2' => '',
            'text_list_2' => [],
            'text_3' => '',
            'des_3' => '',
            'text_list_3' => [],
            'text_4' => '',
            'des_4' => '',
            'text_list_4' => [],
            'text_5' => '',
            'des_5' => '',
            'text_list_5' => [],
            'custom_class' => '',
            'title' => '',
            'style' => 'slicksyncing',
            'layout' => 'boxed',
            'background_skin' => ''
        );
        $params = shortcode_atts($default_atts, $atts);

        $params['holder_classes'] = $this->getHolderClasses($params);
        $params['content'] = $content;

        $output = setsail_core_get_shortcode_module_template_part('templates/slicksyncing-holder-template', 'slicksyncing', '', $params);

        return $output;
    }

    private function getHolderClasses($params)
    {
        $holder_classes = array('qodef-ac-default');

        $holder_classes[] = !empty($params['custom_class']) ? esc_attr($params['custom_class']) : '';
        $holder_classes[] = $params['style'] == 'toggle' ? 'qodef-toggle' : 'qodef-slicksyncing';
        $holder_classes[] = !empty($params['layout']) ? 'qodef-ac-' . esc_attr($params['layout']) : '';
        $holder_classes[] = !empty($params['background_skin']) ? 'qodef-' . esc_attr($params['background_skin']) . '-skin' : '';

        return implode(' ', $holder_classes);
    }
}
