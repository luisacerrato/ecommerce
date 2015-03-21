<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->model('Product');
		$products = $this->Product->get_all_products();
		$array['product'] = $products;
		$this->load->view('index', $array);
	}


	private function get_cart()
	{
		$cart = $this->session->userdata('cart');
		if (! $cart)
		{
			$cart = array();
		}

		return $cart;
	}


	public function cart()
	{
		$this->load->model('Product');
		$cart = $this->get_cart();

		$all_products = array();
		$total = 0;
		foreach ($cart as $product_id => $quantity) {
			$product = $this->Product->get_info($product_id)[0];
			$product['qty'] = $quantity;
			$all_products[] = $product;
			//update total
			$total += $product['price'] * $quantity;
		}
		$this->load->view('cart', array('all_products' => $all_products, 'total' => $total));
	}

	
	public function add_to_cart()
	{
		// load cart from session
		$cart = $this->get_cart();

		// update cart
		$post = $this->input->post();
		$product_id = $post['id'];
		if (array_key_exists ($product_id, $cart))
		{
			$previous_quantity = $cart[$product_id];
			$cart[$product_id] = $previous_quantity + $post['qty'];
		}
		else
		{
			$cart[$product_id] = $post['qty'];
		}

		//save cart back to session
		$this->session->set_userdata('cart', $cart);		
		redirect('/');
	}


	public function destroy($id)
	{
		// load cart from session
		$cart = $this->get_cart();
		unset($cart[$id]);

		//save cart back to session
		$this->session->set_userdata('cart', $cart);
		redirect('/products/cart');
	}


	public function submit_order()
	{
		$post_data = $this->input->post();
		if($post_data)
		{
			$this->session->set_flashdata('message', 'Order submitted, thank you!');
		}

		redirect('/products/cart');
	}
}

//end of main controller