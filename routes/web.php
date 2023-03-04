<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['web']], function () {

	// email test
	Route::get('/email_temp_test', 'HomeController@emailTest');

	//web pages
	Route::get('/', 'HomeController@index');
	Route::get('/blogs', 'HomeController@blogs')->name('blogs');
	Route::get('/blog/{id}', 'HomeController@blogdetails')->name('blog.details');
	Route::get('/event/{id}', 'HomeController@eventdetails')->name('event.details');
	// Route::get('/', 'Auth\AdminLoginController@showLoginForm');
	Route::get('/place_order', 'HomeController@place_order');
	Route::post('/place_order', 'HomeController@PlaceOrder')->name('home.place_order');
	Route::get('/confirm_order', 'HomeController@order_confirm');
	Route::post('/confirm_order', 'HomeController@store')->name('home.order_confirm');
	Route::get('/category/{id}', 'HomeController@getCategory');
	Route::post('/registration', 'HomeController@store')->name('user.account.create');

	Route::get('/angular', 'AngularController@Index');
	Route::get('angular/GetPackages', 'AngularController@GetPackages');
	Route::post('/reservation', 'HomeController@reservationStore')->name('reservation.store');
	Route::get('/reservations', 'HomeController@reservation')->name('reservations');


	Auth::routes();
	///////////////--Admin--///////////////////
	Route::prefix('admin')->group(function () {
		//test router auto printing solution
		Route::get('/view_orders_auto_print', 'Admin\OrderController@orderForPrint');
		//ajax call
		Route::get('/get_recent_orders_for_print', 'Admin\OrderController@getRecentOrder');

		Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
		Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login');
		Route::get('/', 'Admin\OrderController@order_option')->name('admin.dashboard');
		// Route::get('/', 'Admin\AdminHomeController@index')->name('admin.dashboard');
		Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

		Route::get('/change_my_password', 'Admin\AdminsController@changePassword');
		Route::put('/change_my_password', 'Admin\AdminsController@updatePassword')->name('admin.password_change.admin');

		Route::get('/show_admins', 'Admin\AdminsController@index');
		Route::get('/admin/{id}/edit', 'Admin\AdminsController@edit');
		Route::put('/admin/{id}', 'Admin\AdminsController@update')->name('admin.update.admin');
		Route::delete('/admin/{id}', 'Admin\AdminsController@destroy')->name('admin.delete.admin');

		Route::get('/create_new_admin', 'Admin\AdminsController@create');
		Route::post('/create_new_admin', 'Admin\AdminsController@store')->name('create.new.admin');
		Route::get('/profile', 'Admin\AdminsController@profile');
		Route::put('/profile', 'Admin\AdminsController@update');

		Route::get('/users', 'Admin\UsersController@index')->name('admin.users');
		Route::get('/user/{id}/edit', 'Admin\UsersController@edit');
		Route::put('/user/{id}', 'Admin\UsersController@update')->name('admin.update.user');
		Route::delete('/user/{id}', 'Admin\UsersController@destroy')->name('admin.user.delete');

		//////////////////-/\\/-///////////////////

		//routes for food category
		Route::get('/create_category', 'Admin\CatController@create');
		Route::post('/create_category', 'Admin\CatController@store')->name('admin.create.category');
		Route::get('/view_categories', 'Admin\CatController@index');
		Route::get('/foodcat/{id}/edit', 'Admin\CatController@edit');
		Route::put('/update_category/{id}', 'Admin\CatController@update')->name('admin.update.category');
		Route::delete('/food_cat_delete/{id}', 'Admin\CatController@destroy')->name('admin.foodcat.delete');

		//routes for food sub category
		Route::get('/create_sub_category', 'Admin\SubCatController@create');
		Route::post('/create_sub_category', 'Admin\SubCatController@store')->name('admin.create.sub.category');
		Route::get('/view_sub_categories', 'Admin\SubCatController@index');
		Route::get('/subcat/{id}/edit', 'Admin\SubCatController@edit');
		Route::put('/update_sub_category/{id}', 'Admin\SubCatController@update')->name('admin.update.sub.category');
		Route::delete('/food_sub_cat_delete/{id}', 'Admin\SubCatController@destroy')->name('admin.subcat.delete');


		// Routes for Foods Items
		Route::get('/create_food_item', 'Admin\FoodController@create');
		Route::post('/create_food_item', 'Admin\FoodController@store')->name('admin.create.food.item');
		Route::get('/view_food_items', 'Admin\FoodController@index');
		Route::get('/food/{id}/edit', 'Admin\FoodController@edit');
		Route::put('/update_food/{id}', 'Admin\FoodController@update')->name('admin.update.food.item');
		Route::delete('/delete_food/{id}', 'Admin\FoodController@destroy')->name('admin.food.delete');

		//Service Category Related route
		Route::get('/create_customer', 'Admin\CustomerController@create');
		Route::post('/create_customer', 'Admin\CustomerController@store')->name('admin.create.customer');
		Route::get('/view_customers', 'Admin\CustomerController@index');
		Route::get('/customer/{id}/edit', 'Admin\CustomerController@edit');
		Route::put('/customer/{id}/edit', 'Admin\CustomerController@update')->name('admin.update.customer');
		Route::delete('/delete_customer/{id}', 'Admin\CustomerController@destroy')->name('admin.user.delete');

		//routes for order
		Route::get('/choose_order/{order_type}', 'Admin\OrderController@choose_order');
		Route::get('/choose_order_option', 'Admin\OrderController@order_option');
		// Route::post('/choose_order_option', 'Admin\OrderController@OrderOption')->name('admin.order.option');
		Route::get('/create_order/{id}', 'Admin\OrderController@create_order');
		Route::get('/create_order', 'Admin\OrderController@create');
		Route::post('/create_order', 'Admin\OrderController@store')->name('admin.create.order');


		//Route::post('/create_order', 'Admin\OrderController@CreateOrder')->name('admin.create.order.customer');

		Route::get('/add_to_order', 'Admin\OrderController@add_to_order');
		Route::post('/add_to_order', 'Admin\OrderController@store_order')->name('admin.add.to.order');
		Route::get('/delete_item/{key}/{id}', 'Admin\OrderController@del_item');
		Route::get('/view_orders', 'Admin\OrderController@index');
		Route::get('/order/{id}/details', 'Admin\OrderController@show');
		Route::get('/order/{id}/edit', 'Admin\OrderController@edit');
		Route::put('/order/{id}', 'Admin\OrderController@update')->name('admin.update.order');
		Route::delete('/order/{id}/delete', 'Admin\OrderController@destroy')->name('admin.order.delete');
		Route::post('/orders_delete', 'Admin\OrderController@orderDelMulti')->name('admin.order.multi_delete');
		Route::get('/order_type/{order_type}', 'Admin\OrderController@order_type');
		Route::get('/take_away_customers', 'Admin\OrderController@TakeAwayUsers');

		/* print order */
		Route::get('/print_order/{id}', 'Admin\OrderController@order_print');
		Route::get('/print_kitchen/{id}', 'Admin\OrderController@kitchen_copy_print');
		Route::get('/print_kitchen_auto', 'Admin\OrderController@print_kitchen_auto');
		Route::get('/print_bar/{id}', 'Admin\OrderController@print_bar');
		Route::get('/print_addr/{id}', 'Admin\OrderController@print_addr');
		Route::get('/print_address', 'Admin\CustomerController@print_address');

		//routes for payment
		Route::get('/order/{id}/payment', 'Admin\OrderController@getPayment');
		Route::put('/create_payment/{id}', 'Admin\OrderController@storePayment')->name('admin.create.payment');
		Route::get('/payment/{id}/edit', 'Admin\OrderController@editPayment');
		Route::put('/payment/{id}/edit', 'Admin\OrderController@UpdatePayment')->name('admin.update.payment');


		//user profile
		Route::get('/profile', 'Admin\ProfileController@show');
		Route::put('/profile', 'Admin\ProfileController@update')->name('admin.profile.update');


		//routes for order reports
		Route::get('/order_reports', 'Admin\OrderController@orderReports');
		Route::get('/order_reports_at_customer/{cust_id}', 'Admin\OrderController@orderReportsCustomer');
		Route::get('/order_reports_at_status/{status}', 'Admin\OrderController@orderReportsStatus');
		Route::get('/order_reports_at_date/{date}', 'Admin\OrderController@orderReportsDate');
		Route::get('/reports', 'Admin\AdminHomeController@reports');

		// promotion email for all customer
		Route::get('/send_email', 'Admin\AdminHomeController@email');
		Route::post('/send_email', 'Admin\AdminHomeController@SendMail')->name('admin.email.promotion');

		// route for events
		Route::get('/create_event', 'Admin\EventController@create');
		Route::post('/create_event', 'Admin\EventController@store')->name('admin.create.event');
		Route::get('/view_events', 'Admin\EventController@index');
		Route::get('/edit_event/{id}', 'Admin\EventController@edit');
		Route::put('/edit_event/{id}', 'Admin\EventController@update')->name('admin.update.event');
		Route::delete('/event/{id}', 'Admin\EventController@destroy')->name('admin.event.delete');

		// route for blogs
		Route::get('/create_blog', 'BlogController@create');
		Route::post('/create_blog', 'BlogController@store')->name('admin.create.blog');
		Route::get('/view_blogs', 'BlogController@index');
		Route::get('/edit_blog/{id}', 'BlogController@edit');
		Route::put('/edit_blog/{id}', 'BlogController@update')->name('admin.update.blog');
		Route::delete('/blog/{id}', 'BlogController@destroy')->name('admin.blog.delete');
	});

	/* user */
	Route::get('/all_users', 'Admin\UsersController@index');
	Route::put('/permit_as_admin/{id}', 'Admin\UsersController@permitAdmin')->name('admin.permit.admin');


	Route::get('/email_template_ticket/{id}', 'TicketController@ticketTemplate');

	//user login functionality

	//Route::get('/home', 'WorkOrderController@recent');
	Route::get('/login', 'Auth\UserLoginController@getLogin');
	Route::post('/login', 'Auth\UserLoginController@login')->name('user.login');
	Route::get('/logout', 'Auth\UserLoginController@logout')->name('user.logout');

	Route::get('/change_my_password', 'ProfileController@changePassword');
	Route::put('/change_my_password', 'ProfileController@updatePassword')->name('user.password_change');
	//user profile
	Route::get('/profile', 'ProfileController@show');
	Route::put('/profile', 'ProfileController@update')->name('profile.update');
});
