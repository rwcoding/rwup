<?php

return [
    '/open/login' => '\App\Http\Apis\Open\LoginApi',
    '/open/logout' => '\App\Http\Apis\Open\LogoutApi',
    '/open/config' => '\App\Http\Apis\Open\ConfigApi',

    '/home/dashboard' => '\App\Http\Apis\Home\DashboardApi',

    '/profile/info' => '\App\Http\Apis\Profile\InfoApi',
    '/profile/update' => '\App\Http\Apis\Profile\UpdateApi',
    '/profile/password' => '\App\Http\Apis\Profile\PasswordApi',
    '/profile/config' => '\App\Http\Apis\Profile\ConfigApi',

    '/cache/list' => '\App\Http\Apis\Cache\ListApi',
    '/cache/info' => '\App\Http\Apis\Cache\InfoApi',
    '/cache/clean' => '\App\Http\Apis\Cache\CleanApi',
    '/cache/del' => '\App\Http\Apis\Cache\DelApi',

    '/config/list' => '\App\Http\Apis\Config\ListApi',
    '/config/info' => '\App\Http\Apis\Config\InfoApi',
    '/config/add' => '\App\Http\Apis\Config\AddApi',
    '/config/update' => '\App\Http\Apis\Config\UpdateApi',
    '/config/del' => '\App\Http\Apis\Config\DelApi',

    '/log/list' => '\App\Http\Apis\Log\ListApi',
    '/log/info' => '\App\Http\Apis\Log\InfoApi',

    '/permission/list' => '\App\Http\Apis\Permission\ListApi',
    '/permission/info' => '\App\Http\Apis\Permission\InfoApi',
    '/permission/add' => '\App\Http\Apis\Permission\AddApi',
    '/permission/update' => '\App\Http\Apis\Permission\UpdateApi',
    '/permission/del' => '\App\Http\Apis\Permission\DelApi',
    '/permission/shift' => '\App\Http\Apis\Permission\ShiftApi',
    '/permission/config' => '\App\Http\Apis\Permission\ConfigApi',
    '/permission/route' => '\App\Http\Apis\Permission\RouteApi',
    '/permission/group/list' => '\App\Http\Apis\Permission\Group\ListApi',
    '/permission/group/info' => '\App\Http\Apis\Permission\Group\InfoApi',
    '/permission/group/add' => '\App\Http\Apis\Permission\Group\AddApi',
    '/permission/group/update' => '\App\Http\Apis\Permission\Group\UpdateApi',
    '/permission/group/del' => '\App\Http\Apis\Permission\Group\DelApi',

    '/role/list' => '\App\Http\Apis\Role\ListApi',
    '/role/info' => '\App\Http\Apis\Role\InfoApi',
    '/role/add' => '\App\Http\Apis\Role\AddApi',
    '/role/update' => '\App\Http\Apis\Role\UpdateApi',
    '/role/del' => '\App\Http\Apis\Role\DelApi',

    '/session/list' => '\App\Http\Apis\Token\ListApi',
    '/session/info' => '\App\Http\Apis\Token\InfoApi',
    '/session/clean' => '\App\Http\Apis\Token\CleanApi',
    '/session/del' => '\App\Http\Apis\Token\DelApi',

    '/user/list' => '\App\Http\Apis\User\ListApi',
    '/user/info' => '\App\Http\Apis\User\InfoApi',
    '/user/add' => '\App\Http\Apis\User\AddApi',
    '/user/update' => '\App\Http\Apis\User\UpdateApi',
    '/user/del' => '\App\Http\Apis\User\DelApi',

    '/acl/batch/query' => '\App\Http\Apis\Acl\BatchQueryApi',
    '/acl/batch/set' => '\App\Http\Apis\Acl\BatchSetApi',
    '/acl/role/query' => '\App\Http\Apis\Acl\RoleQueryApi',
    '/acl/role/set' => '\App\Http\Apis\Acl\RoleSetApi',

    '/project/list' => '\App\Http\Apis\Project\ListApi',
    '/project/info' => '\App\Http\Apis\Project\InfoApi',
    '/project/add' => '\App\Http\Apis\Project\AddApi',
    '/project/update' => '\App\Http\Apis\Project\UpdateApi',
    '/project/del' => '\App\Http\Apis\Project\DelApi',

    '/project/member/list' => '\App\Http\Apis\Member\ListApi',
    '/project/member/info' => '\App\Http\Apis\Member\InfoApi',
    '/project/member/add' => '\App\Http\Apis\Member\AddApi',
    '/project/member/update' => '\App\Http\Apis\Member\UpdateApi',
    '/project/member/del' => '\App\Http\Apis\Member\DelApi',

    '/directory/list' => '\App\Http\Apis\Directory\ListApi',
    '/directory/info' => '\App\Http\Apis\Directory\InfoApi',
    '/directory/add' => '\App\Http\Apis\Directory\AddApi',
    '/directory/update' => '\App\Http\Apis\Directory\UpdateApi',
    '/directory/del' => '\App\Http\Apis\Directory\DelApi',

    '/doc/list' => '\App\Http\Apis\Doc\ListApi',
    '/doc/info' => '\App\Http\Apis\Doc\InfoApi',
    '/doc/add' => '\App\Http\Apis\Doc\AddApi',
    '/doc/update' => '\App\Http\Apis\Doc\UpdateApi',
    '/doc/del' => '\App\Http\Apis\Doc\DelApi',
    '/doc/access/info' => '\App\Http\Apis\Doc\AccessInfoApi',
    '/doc/access/update' => '\App\Http\Apis\Doc\AccessUpdateApi',
    '/doc/content' => '\App\Http\Apis\Doc\ContentApi',
    '/doc/upload' => '\App\Http\Apis\Doc\UploadApi',
    '/doc/tree' => '\App\Http\Apis\Doc\TreeApi',
    '/doc/search' => '\App\Http\Apis\Doc\SearchApi',
];
