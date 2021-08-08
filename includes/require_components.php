<?php
/* If you want to add new php class
and want that class to be discoverable in every php files
ypu should define all php with class on this block */
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
/* end of mutation block */

/* this block is for query api */
require("api/query/get_user_list.php");
require("api/query/get_validator.php");
require("api/query/get_user_info.php");
/* end of query block */

?>