  <?php  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }
    /*
    | -------------------------------------------------------------------------
    | URI ROUTING
    | -------------------------------------------------------------------------
    | This file lets you re-map URI requests to specific controller functions.
    |
    | Typically there is a one-to-one relationship between a URL string
    | and its corresponding controller class/method. The segments in a
    | URL normally follow this pattern:
    |
    |	example.com/class/method/id/
    |
    | In some instances, however, you may want to remap this relationship
    | so that a different class/function is called than the one
    | corresponding to the URL.
    |
    | Please see the user guide for complete details:
    |
    |	http://codeigniter.com/user_guide/general/routing.html
    |
    | -------------------------------------------------------------------------
    | RESERVED ROUTES
    | -------------------------------------------------------------------------
    |
    | There area two reserved routes:
    |
    |	$route['default_controller'] = 'welcome';
    |
    | This route indicates which controller class should be loaded if the
    | URI contains no data. In the above example, the "welcome" class
    | would be loaded.
    |
    |	$route['404_override'] = 'errors/page_missing';
    |
    | This route will tell the Router what URI segments to use if those provided
    | in the URL cannot be matched to a valid route.
    |
    */

    // Site
    $route['default_controller']       = "login";
    $route['404_override']             = '';
    $route['kit/(:num)']               = "shop/kit_cod/$1";
    $route['logout']                   = "logout";
    $route['pedidos']                  = "orders";
    $route['pedidos/adicionar/(:num)'] = "orders/add_to_cart/$1";
    $route['pedidos/atualizar']        = "orders/update_cart";
    $route['pedidos/excluir/(:num)']   = "orders/delete_from_cart/$1";
    $route['pedidos/limpar']           = "orders/clearcart";
    $route['pedidos/finalizar']        = "orderfinal";
    $route['produto/(:num)']           = "products/show/$1"; // ver detalhes de produtos
    $route['registra']                 = "registra_transacao";
    $route['confirma_pedido']          = "confirma_pedido";
    $route['retorno']                  = "retorno";

    // pesquisa de pedidos
    $route['pedidos/pesquisa']  = "acompanha_pedido";
    $route['pedidos/resultado'] = "acompanha_pedido_resultado";

    // gerencia clientes
    $route['gerente/clientes']                = "gerente_clientes/clientes";
    $route['gerente/clientes/adicionar']      = "gerente_clientes/add_cliente";
    $route['gerente/clientes/editar/(:num)']  = "gerente_clientes/update_cliente/$1";
    $route['gerente/clientes/excluir/(:num)'] = "gerente_clientes/delete_cliente/$1";
    $route['gerente/clientes/add']            = "gerente_clientes/add_client_db";
    $route['gerente/clientes/update/(:num)']  = "gerente_clientes/update_client_db/$1";
    $route['gerente/clientes/delete/(:num)']  = "gerente_clientes/delete_client_db/$1";

    // gerencia kits
    $route['gerente/kits']                = "gerente_kits/kits";
    $route['gerente/kits/adicionar']      = "gerente_kits/add_kit";
    $route['gerente/kits/editar/(:num)']  = "gerente_kits/update_kit/$1";
    $route['gerente/kits/excluir/(:num)'] = "gerente_kits/delete_kit/$1";
    $route['gerente/kits/add']            = "gerente_kits/add_kit_db";
    $route['gerente/kits/update/(:num)']  = "gerente_kits/update_kit_db/$1";
    $route['gerente/kits/delete/(:num)']  = "gerente_kits/del_kit_db/$1";

    // gerencia produtos
    $route['gerente/produtos']                = "gerente_produtos/products";
    $route['gerente/produtos/adicionar']      = "gerente_produtos/add_product";
    $route['gerente/produtos/editar/(:num)']  = "gerente_produtos/update_product/$1";
    $route['gerente/produtos/excluir/(:num)'] = "gerente_produtos/delete_product/$1";
    $route['gerente/product/delete/(:num)']   = "gerente_produtos/delete_product_db/$1";
    $route['gerente/product/update/(:num)']   = "gerente_produtos/update_product_db/$1";
    $route['gerente/product/add']             = "gerente_produtos/add_product_db";

    // gerencia listas de preço
    $route['gerente/listas']                = "gerente_listas/pricelist";
    $route['gerente/listas/adicionar']      = "gerente_listas/add_pricelist";
    $route['gerente/listas/add']            = "gerente_listas/add_pricelist_db";
    $route['gerente/listas/editar/(:num)']  = "gerente_listas/update_pricelist/$1";
    $route['gerente/listas/update/(:num)']  = "gerente_listas/update_pricelist_db/$1";
    $route['gerente/listas/excluir/(:num)'] = "gerente_listas/delete_pricelist/$1";
    $route['gerente/listas/delete/(:num)']  = "gerente_listas/delete_pricelist_db/$1";

    // gerencia pedidos
    $route['gerente/pedidos']           = "gerente_pedidos";
    $route['gerente/pedidos/resultado'] = "gerente_pedidos/resultado";


    $route['gerente/error']  = "gerente/error";
    $route['gerente/exists'] = "gerente/client_exists";

    /* End of file routes.php */
    /* Location: ./application/config/routes.php */