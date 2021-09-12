<?php
/* If you want to add new php class
and want that class to be discoverable in every php files
you should define all php with class on this block */
require("api/api_model.php");
require("api/inputs/base_input.php");
require('channel/graphql_processor.php');
require("api/response/base_response.php");
require("modules/constants/affiliate_level.php");
require("modules/constants/profile_level.php");
require("modules/utils/password_generator.php");
/* end of php classes block */

/*this block is for mutation api */
require("api/mutation/login.php");
require("api/mutation/register.php");
require("api/mutation/update_account.php");
require("api/mutation/change_password.php");
require("api/mutation/change_password_via_forgot.php");
require("api/mutation/forgot_password.php");
require("api/mutation/is_valid_key.php");
require("api/mutation/add_appointment.php");
require("api/mutation/cancel_appointment.php");
require("api/mutation/update_appointment.php");
require("api/mutation/add_service.php");
require("api/mutation/delete_service.php");
require("api/mutation/update_service.php");

/* end of mutation block */

/* this block is for query api */
require("api/query/get_user_list.php");
require("api/query/get_validator.php");
require("api/query/get_user_info.php");
require("api/query/get_branches.php");
require("api/query/get_active_appointment_by_username.php");
require("api/query/get_active_appointment_by_range.php");
require("api/query/get_product_class_list.php");
require("api/query/get_product_by_id.php");
require("api/query/get_services.php");
require("api/query/get_product_by_product_code.php");
/* end of query block */

?>