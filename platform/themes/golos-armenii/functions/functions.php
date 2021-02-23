<?php

use Botble\Blog\Models\Post;
use Illuminate\Http\Request;

register_sidebar([
    'id'          => 'footer_sidebar',
    'name'        => __('Footer sidebar'),
    'description' => __('Area for footer widgets'),
]);

register_sidebar([
    'id'          => 'home_sidebar',
    'name'        => __('Home sidebar'),
    'description' => __('Area for home widgets'),
]);

register_page_template([
    'homepage' => __('Homepage'),
]);

Menu::addMenuLocation('second-menu', __('Second menu'));

add_shortcode('google-map', __('Google map'), __('Custom map'), function ($shortCode) {
    return Theme::partial('short-codes.google-map', ['address' => $shortCode->content]);
});

add_shortcode('youtube-video', __('Youtube video'), __('Add youtube video'), function ($shortCode) {
    return Theme::partial('short-codes.video', ['url' => $shortCode->content]);
});

add_shortcode('featured-posts', __('Featured posts'), __('Featured posts'), function () {
    return Theme::partial('short-codes.featured-posts');
});

add_shortcode('category-posts', __('Category posts'), __('Category posts'), function () {
    return Theme::partial('short-codes.category-posts');
});

add_shortcode('all-galleries', __('All Galleries'), __('All Galleries'), function () {
    return Theme::partial('short-codes.all-galleries');
});

shortcode()->setAdminConfig('google-map', Theme::partial('short-codes.google-map-admin-config'));
shortcode()->setAdminConfig('youtube-video', Theme::partial('short-codes.youtube-admin-config'));

theme_option()
    ->setSection([
        'title'      => __('Banner Ads'),
        'desc'       => __('Change image'),
        'id'         => 'opt-text-subsection-banner-ads',
        'subsection' => true,
        'icon'       => 'fa fa-image',
        'fields'     => [
            [
                'id'         => 'banner-link',
                'type'       => 'text',
                'label'      => __('URL'),
                'attributes' => [
                    'name'    => 'banner-link',
                    'value'   => null,
                    'options' => [
                        'class'        => 'form-control',
                        'placeholder'  => __('Link to target URL'),
                        'data-counter' => 255,
                    ],
                ],
            ],
            [
                'id'         => 'banner-new-tab',
                'type'       => 'select',
                'label'      => __('Open in new tab?'),
                'attributes' => [
                    'name'    => 'banner-new-tab',
                    'data'    => [
                        0 => 'No',
                        1 => 'Yes',
                    ],
                    'value'   => null,
                    'options' => [
                        'class' => 'form-control',
                    ],
                ],
            ],
            [
                'id'         => 'banner-ads',
                'type'       => 'mediaImage',
                'label'      => __('Image'),
                'attributes' => [
                    'name'  => 'banner-ads',
                    'value' => null,
                ],
            ],
        ],
    ])
    ->setField([
        'id'         => 'copyright',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Copyright'),
        'attributes' => [
            'name'    => 'copyright',
            'value'   => '© 2021 VECTO Technologies. All right reserved.',
            'options' => [
                'class'        => 'form-control',
                'placeholder'  => __('Change copyright'),
                'data-counter' => 120,
            ],
        ],
        'helper'     => __('Copyright on footer of site'),
    ])
    ->setField([
        'id'         => 'primary_font',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'googleFonts',
        'label'      => __('Primary font'),
        'attributes' => [
            'name'  => 'primary_font',
            'value' => 'Roboto Condensed',
        ],
    ])
    ->setField([
        'id'         => 'primary_color',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'customColor',
        'label'      => __('Primary color'),
        'attributes' => [
            'name'  => 'primary_color',
            'value' => '#aa0909',
        ],
    ]);

add_action(BASE_ACTION_META_BOXES, 'add_addition_fields_in_post_screen', 24, 2);

/**
 * @param string $context
 * @param \Botble\Base\Models\BaseModel $object
 * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
 */
function add_addition_fields_in_post_screen($context, $object)
{
    if (is_plugin_active('blog') && get_class($object) == Post::class && $context == 'advanced') {
        MetaBox::addMetaBox('additional_post_fields', __('Addition Information'), 'post_additional_fields',
            get_class($object),
            $context,
            'default');
    }
}

/**
 * @return mixed
 * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
 */
function post_additional_fields()
{
    $videoLink = null;
    $args = func_get_args();
    if (!empty($args[0])) {
        $videoLink = MetaBox::getMetaData($args[0], 'video_link', true);
    }

    return Theme::partial('post-fields', compact('videoLink'));
}

add_action(BASE_ACTION_AFTER_CREATE_CONTENT, 'save_addition_post_fields', 230, 3);
add_action(BASE_ACTION_AFTER_UPDATE_CONTENT, 'save_addition_post_fields', 231, 3);

/**
 * @param string $type
 * @param Request $request
 * @param \Botble\Base\Models\BaseModel $object
 * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
 */
function save_addition_post_fields($type, $request, $object)
{
    if (is_plugin_active('blog') && get_class($object) == Post::class) {
        MetaBox::saveMetaBoxData($object, 'video_link', $request->input('video_link'));
    }
}

add_action('init', function () {
    config([
        'filesystems.disks.public.root' => public_path('storage'),
        'filesystems.disks.public.url'  => str_replace('/index.php', '', url('storage')),
    ]);
}, 124);

RvMedia::addSize('featured', 560, 380)->addSize('medium', 540, 360);
