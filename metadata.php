<?php
/**
 * Metadata version
 */
$sMetadataVersion = '2.1';
/**
 * Module information
 */
$aModule = [
    'id'           => 'toparticles',
    'title'        => '.BEES | Anzahl der Topseller erhöhen',
    'description'  => [
        'de'               => 'Anzahl der Topseller erhöhen',
        'en'               => 'Increase the number of top sellers',
    ],
    'thumbnail'    => 'picture.png',
    'version'      => '2.0',
    'author'       => 'Steffen Winde, Rafig',
    'extend'       => [
        \OxidEsales\Eshop\Application\Model\ArticleList::class => Swinde\TopArticles\Model\SwArticleList::class
    ],
    'settings'         => [
        [
            'group'            => 'odTopArticles',
            'name'             => 'topArtLimit',
            'type'             => 'str',
            'value'            => '10'
        ],
    ],

];