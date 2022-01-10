<?php
    if (DB_HOST == "localhost")
    {
        define("DOMAIN", SITE_DOMAIN.SITE_DIR);
        define("INC_DOMAIN", $_SERVER['DOCUMENT_ROOT'] . SITE_DIR);
    }
    else
    {
        define("DOMAIN", $_SERVER['DOCUMENT_ROOT']);
        define("INC_DOMAIN", $_SERVER['DOCUMENT_ROOT']);
    }

    // Link / Pages
    const HOME_PAGE = DOMAIN . '/index.php';
    const LOGIN_PAGE = DOMAIN . '/login.php';
    const SIGNUP_PAGE = DOMAIN . '/signup.php';
    const PROFILE_PAGE = DOMAIN . '/user/profile.php';
    //const CHANGE_PASSWORD_PAGE = DOMAIN . '/change_password.php'; // not used

    // Includes
    const INC_CONNECTION = INC_DOMAIN . '/include/connection.php';
    const INC_FUNCTION = INC_DOMAIN . '/include/function.php';
    const INC_SIGNUP_FUNCTION = INC_DOMAIN . '/include/signup_function.php';
    const INC_LOGOUT = DOMAIN . '/user/logout.php';
    const TEM_NAV_MAIN = INC_DOMAIN . '/template/nav-main.php';
    const TEM_NAV_LOGGED = INC_DOMAIN . '/template/nav-menu-for-logged-user.php';
    const TEM_NAV_NON_LOGGED = INC_DOMAIN . '/template/nav-menu-for-non-logged-user.php';
