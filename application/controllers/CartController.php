<?php
use App\Models\Cart;
use App\Models\Order;
include_once dirname(__DIR__)."\models\DB connection.php";
class CartController
{
    public $m_twig_container;
    public $m_nav_container;
    public $db;
    public $auth;
    public $capsule;
    public function __construct($container)
    {
        $this->m_twig_container = $container['twig_c'];
        $this->m_nav_container = $container['nav_bar'];
        $this->auth = $container['auth'];
        $this->capsule = $container['db'];
        $this->db = connection::getInstance();
    }
    public function getCart($req, $resp, $arg)
    {
        $catalogName = $this->db->getConnection()->catalog;
        $res = $this->capsule->table('products')
                             ->join('cart', 'products.id', '=', 'cart.Product_id')
                             ->select('products.Name', 'products.Image', 'products.Price', 'products.Count', 'products.Description', 'cart.id', 'cart.Product_id')
                             ->where('cart.User_id', $this->auth->user()['id'])
                             ->get();
        $template = $this->m_twig_container->loadTemplate('Cart.html');
        echo $template->render(
            array(
                'title' => 'User cart',
                'nav_list' => $this->m_nav_container,
                'catalog_buff' => $catalogName,
                'cart_content' => $res
            ));
        return $resp;
    }
    public function Insert($req, $resp, $arg)
    {
        Cart::create(
            [
                'Product_id' => $arg['id'],
                'User_id' => $this->auth->user()['id']
            ]
        );
        return $resp->withRedirect('/#'.$arg['id']);
    }
    public function Erase($req, $resp, $arg)
    {
        $this->capsule->table('cart')->where('id', $arg['id'])->delete();
        return $resp->withRedirect('/Cart?#'.($arg['id'] - 1));
    }
    public function toOrder($req, $resp, $arg)
    {
        Order::create(
            [
                'User_id' => $this->auth->user()['id'],
                'Product_id' => $arg['id']
            ]
        );
        return $resp->withRedirect('/Cart?#'.($arg['return']));
    }
}