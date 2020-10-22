<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']            = 'C__front';
//Frontend
$route['shop.aspx']                     = 'C__front/index';
$route['shop.aspx/(:any)'] 				= 'C__front/index/$1';
$route['viewcart.aspx']                 = 'C__front/cart/';
$route['mycategory.aspx/(:any)'] 		= 'C__front/category/$1';
$route['mycategory.aspx/(:any)/(:any)'] = 'C__front/category/$1/(:any)';
$route['product-details.aspx/(:any)'] 	= 'C__front/details/$1';
$route['auth.aspx']                     = 'C__front/login';
$route['process.aspx']                  = 'C__front/process';
$route['cost.aspx']                     = 'C__front/cost';
$route['costfirst.aspx']                = 'C__front/costfirst';
$route['getcity.aspx']                  = 'C__front/getcity';
$route['getcityfirst.aspx']             = 'C__front/getcityfirst';
$route['checkout.aspx']                 = 'C__front/checkout';
$route['total.aspx']                    = 'C__front/total';
$route['search.aspx']                   = 'C__front/search';
$route['verifCart.aspx']                = 'C__front/verifCart';
$route['unsubcribe.aspx/(:any)']		= 'C__front/unsubcribe/$1';
$route['tocart.aspx']                   = 'C__fronts/tocart';
$route['removecart.aspx/(:any)'] 		= 'C__fronts/removecart/$1';
$route['nullcart.aspx']                 = 'C__fronts/deletecart';
$route['refreshCart.aspx']              = 'C__fronts/refreshCart';
$route['refreshCartKecil.aspx']         = 'C__fronts/refreshCartKecil';
$route['refreshRealCart.aspx']          = 'C__fronts/refreshRealCart';
$route['fixed.aspx']                    = 'C__order/fixed';
$route['fixedNo.aspx']                  = 'C__order/fixedNo';
$route['fixTrans.aspx']                 = 'C__fronts/fixTrans';
$route['order.aspx']                    = 'C__fronts/order';
$route['getOrder.aspx']                 = 'C__fronts/getOrder';
$route['getValid.aspx']                 = 'C__fronts/getValid';
$route['getValidEdit.aspx']             = 'C__fronts/getValidEdit';
$route['uploadFix.aspx']                = 'C__fronts/uploadFix';
$route['uploadFixEdit.aspx']            = 'C__fronts/uploadFixEdit';
$route['fix.aspx/(:any)'] 				= 'C__fronts/fix/$1';
//Frontened Page
$route['howtobuy.aspx']                 = 'C__frontPage/howtobuy';
$route['testimony.aspx']                = 'C__frontPage/testimony';
$route['moreTestimony.aspx']            = 'C__frontPage/moreTestimony';
$route['submitTestimony.aspx']          = 'C__frontPage/submitTestimony';
$route['aboutus.aspx']                  = 'C__frontPage/about';
$route['pricelist.aspx']                = 'C__frontPage/pricelist/';
$route['pricelist.aspx/(:any)'] 		= 'C__frontPage/pricelist/$1';
$route['ongkir.aspx']                   = 'C__frontPage/ongkir';
//Backend
//Dashboard
$route['myshop.aspx']                   = 'C__admin';
$route['out.aspx']                      = 'C__admin/out';
$route['modal_user.aspx']               = 'C__admin/modal_user';
$route['update_account.aspx']           = 'C__admin/update_account';
//Kategori
$route['category.aspx']                 = 'C__category';
$route['update_state.aspx']             = 'C__category/update_state';
$route['add_category.aspx']             = 'C__category/add';
$route['view_update_category.aspx']     = 'C__category/view_update';
$route['update_category.aspx/(:any)'] 	= 'C__category/update/$1';
//Produk
$route['product.aspx']                  = 'C__product';
$route['product.aspx/(:num)'] 			= 'C__product/index/$1';
$route['filter_product.aspx']           = 'C__product/filter';
$route['filter_product.aspx/(:num)'] 	= 'C__product/filter/$1';
$route['update_state_product.aspx']     = 'C__product/update_state';
$route['add_product.aspx']              = 'C__product/add';
$route['view_update_product.aspx']      = 'C__product/view_update';
$route['view_detail_product.aspx']      = 'C__product/view_detail';
$route['update_product.aspx/(:any)'] 	= 'C__product/update/$1';
$route['upload_product.aspx/(:any)'] 	= 'C__product/upload/$1';
$route['picture_product.aspx/(:any)'] 	= 'C__product/picture/$1';
$route['delete_picture.aspx']           = 'C__product/delete_picture';
$route['delete_image_product.aspx']     = 'C__product/delete_image';
//Payment
$route['pay.aspx']                      = 'C__payment';
$route['update_state_pay.aspx']         = 'C__payment/update_state';
$route['add_pay.aspx']                  = 'C__payment/add';
$route['view_update_pay.aspx']          = 'C__payment/view_update';
$route['update_pay.aspx/(:any)'] 		= 'C__payment/update/$1';
//Bank
$route['bank.aspx']                     = 'C__bank';
$route['update_state_bank.aspx']        = 'C__bank/update_state';
$route['add_bank.aspx']                 = 'C__bank/add';
$route['view_update_bank.aspx']         = 'C__bank/view_update';
$route['update_bank.aspx/(:any)'] 		= 'C__bank/update/$1';
//User
$route['user.aspx']                     = 'C__user';
$route['update_state_user.aspx']        = 'C__user/update_state';
$route['add_user.aspx']                 = 'C__user/add';
$route['view_update_user.aspx']         = 'C__user/view_update';
$route['update_user.aspx/(:any)'] 		= 'C__user/update/$1';
//Setting
$route['setting.aspx']                  = 'C__setting';
$route['edit_setting.aspx']             = 'C__setting/edit';
$route['edit_setting_tambahan.aspx']    = 'C__setting/edit_tambahan';
$route['update_setting.aspx']           = 'C__setting/update';
$route['update_setting_tambahan.aspx']  = 'C__setting/update_tambahan';
$route['delete_options.aspx']  			= 'C__setting/delete_options';
//Skin
$route['skin.aspx']                     = 'C__setting/skin';
$route['update_skin.aspx']              = 'C__setting/skin_update';
//Halaman
$route['page.aspx']                     = 'C__page';
$route['page.aspx/(:any)'] 				= 'C__page/index/$1';
$route['update_about.aspx']             = 'C__page/updateabout';
$route['update_buy.aspx']               = 'C__page/updatebuy';
//Slider
$route['slider.aspx']                   = 'C__slider';
$route['add_slider.aspx']               = 'C__slider/add';
$route['delete_slider.aspx']            = 'C__slider/delete';
//Transaksi
$route['transaction.aspx']              = 'C__transaction/index';
$route['transaction.aspx/(:any)'] 		= 'C__transaction/index/$1';
$route['detail_transaction.aspx/(:any)']= 'C__transaction/view_detail_transaction/$1';
$route['update_state_transaction.aspx'] = 'C__transaction/update_state';
$route['filter_transaction.aspx']       = 'C__transaction/filter_transaction';
$route['filter_transaction.aspx/(:any)']= 'C__transaction/filter_transaction/$1';
$route['send.aspx']                     = 'C__transaction/send';
$route['print.aspx/(:any)'] 			= 'C__transaction/print_transaction/$1';
//Testimoni
$route['testimoni.aspx']                = 'C__testimoni';
$route['testimoni.aspx/(:any)'] 	  	= 'C__testimoni/index/$1';
$route['update_state_testimoni.aspx']   = 'C__testimoni/update_state';
$route['add_testimoni.aspx']            = 'C__testimoni/add';
$route['view_update_testimoni.aspx']    = 'C__testimoni/view_update';
$route['view_detail_testimoni.aspx']    = 'C__testimoni/view_detail';
$route['update_testimoni.aspx/(:any)'] 	= 'C__testimoni/update/$1';

//Not Found
$route['404_override'] = 'C__front/notfound';
$route['translate_uri_dashes'] = FALSE;
