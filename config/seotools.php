<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => false, // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'Encontre aqui o consórcio ideal, para você ou para sua empresa', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => [ 'citybens', 'citibens', 'consórcio', 'consorcio', 'consórcios', 'consorcios', 'consórcio empresarial', 'consórcio pessoal' ],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
            'robots'       => "all", // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'        => "Citybens Consórcios", // set false to total remove
            'description'  => 'Encontre aqui o consórcio ideal, para você ou para sua empresa', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => 'Citybens Consórcios',
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'        => "Citybens Consórcios", // set false to total remove
            'description'  => 'Encontre aqui o consórcio ideal, para você ou para sua empresa', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
