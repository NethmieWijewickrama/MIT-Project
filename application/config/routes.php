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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['new_owner'] = "owner/new_owner";
$route['owners_list'] = "owner/owners_list";

$route['add_xxv'] = "xX/add_xxv";
$route['xx_list'] = "xX/xx_list";
$route['edit_xxv'] = "xX/edit_xxv";


$route['new_fishermen'] = "fishermen/new_fishermen";
$route['fishermen_list'] = "fishermen/fishermen_list";
$route['new_vessel'] = "vessel/new_vessel";
$route['vessel_list'] = "vessel/vessel_list";
$route['new_tranponder'] = "transponder/new_tranponder";
$route['tranponder_list'] = "transponder/tranponder_list";
$route['new_satellite'] = "satellite/new_satellite";
$route['satellite_list'] = "satellite/satellite_list";
$route['satellite_bill'] = "satellite/satellite_bill";
$route['get_unit_price'] = "satellite/get_unit_price";
$route['save_transaction'] = "satellite/save_transaction";
$route['invoice'] = "satellite/create_invoice";
$route['log_book'] = "logbook/log_book";
$route['death_details'] = "logbook/death_details";
$route['high_sea_form'] = "departure/high_sea_form";
$route['high_sea_departure'] = "departure/high_sea_departure";
$route['get_fishermen_details'] = "departure/get_fishermen_details";
$route['save_departure'] = "departure/save_departure";
$route['transfers'] = "transponder/transfers";
$route['transfer_list'] = "transponder/transfer_list";
$route['uninstall_transfer'] = "transponder/uninstall_transfer";
$route['identity_cart'] = "dashboard/identity_cart";
$route['vessel_departure_form'] = "departure/vessel_departure_form";
$route['vessel_owner_identity'] = "dashboard/vessel_owner_identity";
$route['log_list'] = "logbook/log_list";
$route['invoice_list'] = "satellite/invoice_list";
$route['reports/high_sea_departure'] = "reports/high_sea_departure_report";
$route['reports/annual_log'] = "reports/annual_log_report";
$route['reports/annual_death'] = "reports/annual_death_report";
$route['reports/annual_vessel'] = "reports/annual_vessel_report";
$route['reports/annual_fisherman'] = "reports/annual_fisherman_report";

//edit routes
$route['edit_owner'] = "owner/edit_owner";
$route['edit_vessel'] = "vessel/edit_vessel";
$route['edit_fisherman'] = "fishermen/edit_fisherman";
$route['edit_transponder'] = "transponder/edit_transponder";
$route['edit_satellite_master'] = "satellite/edit_satellite_master";
$route['inactive_transponder'] = "transponder/inactive_transponder";
