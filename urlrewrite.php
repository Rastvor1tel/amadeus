<?php
$arUrlRewrite=array (
  0 => 
  array (
    'CONDITION' => '#^/online/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
    'RULE' => 'alias=$1',
    'ID' => '',
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/online/(/?)([^/]*)#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/stssync/calendar/#',
    'RULE' => '',
    'ID' => 'bitrix:stssync.server',
    'PATH' => '/bitrix/services/stssync/calendar/index.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/new/catalog/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/new/catalog/.includeCatalogComponent.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/new/catalog/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/new/catalog/index.php',
    'SORT' => 100,
  ),
  6 => 
  array (
    'CONDITION' => '#^/about/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/about/news/index.php',
    'SORT' => 100,
  ),
  8 => 
  array (
    'CONDITION' => '#^/personal/#',
    'RULE' => '',
    'ID' => 'bitrix:sale.personal.order',
    'PATH' => '/new/personal/index.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/personal/#',
    'RULE' => '',
    'ID' => 'bitrix:sale.personal.order',
    'PATH' => '/personal/index.php',
    'SORT' => 100,
  ),
  9 => 
  array (
    'CONDITION' => '#^/catalog/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/catalog/index.php',
    'SORT' => 100,
  ),
  10 => 
  array (
    'CONDITION' => '#^/store/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog.store',
    'PATH' => '/store/index.php',
    'SORT' => 100,
  ),
  11 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  12 => 
  array (
    'CONDITION' => '#^/_azbn7_/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/_azbn7_/index.php',
    'SORT' => 100,
  ),
);
