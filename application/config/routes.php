<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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

$route['default_controller'] = "login";
$route['404_override'] = 'error';


/*********** USER DEFINED ROUTES *******************/

$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'user/calendar';
$route['dashboard/(:num)'] = 'user/calendar/$1';
$route['summary'] = 'user';
$route['logout'] = 'user/logout';
$route['pageNotFound'] = "user/pageNotFound";
$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['reloadcalender'] = "user/reloadcalender";
$route['editCalender'] = "user/editCalender";

//ระบบchecklist
$route['checklist/(:num)'] = 'checklist/checklist/$1';
$route['addNewChecklist'] = 'checklist/addNewChecklist';
$route['getChecklistById'] = 'checklist/getChecklistById';
$route['editOldChecklist'] = 'checklist/editOldChecklist';
$route['deleteChecklist'] = 'checklist/deleteChecklist';
$route['Checklistdev'] = 'checklist/Checklistdev';
$route['ChecklistEm'] = 'checklist/ChecklistEm';
$route['ChecklistCus'] = 'checklist/ChecklistCus';

//ระบบจัดการโปรเจค
$route['project'] = 'project/project';
$route['addNewProject'] = 'project/addNewProject';
$route['getProjectById'] = 'project/getProjectById';
$route['editOldProject'] = 'project/editOldProject';
$route['deleteProject'] = 'project/deleteProject';

$route['getProjectBycode'] = 'project/getProjectBycode';
$route['editImageProject/(:num)'] = 'project/upload_image/$1';
$route['editImageProject/(:num)/(:num)'] = 'project/upload_image/$1/$2';

//ระบบงวด
$route['ins_project/(:num)'] = 'ins_project/ins_project/$1';
$route['addNewIns'] = 'ins_project/addNewIns';
$route['editOldIns'] = 'ins_project/editOldIns';
$route['getInsById'] = 'ins_project/getInsById';
$route['deleteIns'] = 'ins_project/deleteIns';

//ระบบขอบเขต
$route['scope_project/(:num)'] = 'scope_project/scope_project/$1';
$route['addNewScope'] = 'scope_project/addNewScope';
$route['editOldScope'] = 'scope_project/editOldScope';
$route['getScopeById'] = 'scope_project/getScopeById';
$route['deleteScope'] = 'scope_project/deleteScope';

// issues
$route['issues/(:num)'] = 'issues/issues/$1';
$route['addNewIssues'] = 'issues/addNewIssues';
$route['getIssuesById'] = 'issues/getIssuesById';
$route['editOldIssues'] = 'issues/editOldIssues';
$route['deleteIssues'] = 'issues/deleteIssues';
$route['summitdevissues'] = 'issues/summitdevissues';
$route['summittestissues'] = 'issues/summittestissues';
$route['summitcusissues'] = 'issues/summitcusissues';

//memberProject
$route['memberProject/(:num)'] = 'memberProject/memberProject/$1';
$route['addNewmemberProject'] = 'memberProject/addNewmemberProject';
$route['deletememberProject'] = 'memberProject/deletememberProject';
//employeeProject
$route['employeeProject/(:num)'] = 'employeeProject/employeeProject/$1';
$route['addNewemployeeProject'] = 'employeeProject/addNewemployeeProject';
$route['deleteemployeeProject'] = 'employeeProject/deleteemployeeProject';
// //ระบบกิจกรรม
// $route['a_project/(:any)'] = 'activity_project/a_project/$1';
// $route['addNewa_project'] = 'activity_project/addNewa_project';
// $route['geta_projectById'] = 'activity_project/geta_projectById';
// // $route['editImagea_project/(:num)'] = 'activity_project/upload_image/$1';
// $route['editOlda_project'] = 'activity_project/editOlda_project';
// $route['deletea_project'] = 'activity_project/deletea_project';

// ระบบจัดการ Checklist 
// $route['check_project/(:any)'] = 'checklist_project/check_project/$1';
// $route['addNewcheck_project'] = 'checklist_project/addNewcheck_project';
// $route['getcheck_projectById'] = 'checklist_project/getcheck_projectById';
// // $route['editImagecheck_project/(:num)'] = 'checklist_project/upload_image/$1';
// $route['editImagecheck_project/(:num)/(:num)'] = 'checklist_project/upload_image/$1/$2';
// $route['editOldcheck_project'] = 'checklist_project/editOldcheck_project';
// $route['deletecheck_project'] = 'checklist_project/deletecheck_project';

// //รายงาน checklist
// $route['report_checklist/(:num)']= 'reportcheck/reportcheck/$1';
// ระบบจัดการผู้ใช้งานแอพ
$route['userListing'] = 'user/userListing';
$route['userListing/(:num)'] = "user/userListing/$1";
$route['addNew'] = "user/addNew";
$route['addNewUser'] = "user/addNewUser";
$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";




$route['checkEmailExists'] = "user/checkEmailExists";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";



/* End of file routes.php */
/* Location: ./application/config/routes.php */