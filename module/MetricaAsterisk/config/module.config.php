<?php

$setting = array_merge_recursive(
include "controller.config.php",
include "doctrine.config.php",
include "navigation.config.php",
include "plugins.config.php",
include "route.config.php",
include "route-console.config.php",
include "services.config.php",
include "view-helper.config.php",
include "view.config.php",
include "zfm-datagrid.cola.config.php",
include "zfm-datagrid.costo-llamadas.config.php",
include "zfm-datagrid.grupo-internos.config.php",
include "zfm-datagrid.interno.config.php",
include "zfm-datagrid.ivr.config.php",
include "zfm-datagrid.tipo-destino.config.php",
include "zfm-datagrid.troncal.config.php"
);

return $setting;
