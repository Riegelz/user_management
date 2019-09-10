<?php

$router->get('user/', 'Api@Userlist');
$router->post('adduser/', 'Api@Adduser');
$router->post('deluser/', 'Api@Deluser');
$router->post('updateuser/', 'Api@Updateuser');