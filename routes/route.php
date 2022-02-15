<?php

return [
    '/login'  => '\App\Http\Apis\Auth\LoginApi',
    '/logout' => '\App\Http\Apis\Auth\LogoutApi',

    '/profile/info'     => '\App\Http\Apis\Profile\InfoApi',
    '/profile/edit'     => '\App\Http\Apis\Profile\EditApi',
    '/profile/password' => '\App\Http\Apis\Profile\PasswordApi',

    '/cache/list' => '\App\Http\Apis\Cache\ListApi',
    '/cache/info' => '\App\Http\Apis\Cache\InfoApi',
    '/cache/clean' => '\App\Http\Apis\Cache\CleanApi',
    '/cache/del' => '\App\Http\Apis\Cache\DelApi',

    '/config/list' => '\App\Http\Apis\Config\ListApi',
    '/config/info' => '\App\Http\Apis\Config\InfoApi',
    '/config/add' => '\App\Http\Apis\Config\AddApi',
    '/config/edit' => '\App\Http\Apis\Config\EditApi',
    '/config/del' => '\App\Http\Apis\Config\DelApi',

    '/log/list' => '\App\Http\Apis\Log\ListApi',
    '/log/info' => '\App\Http\Apis\Log\InfoApi',

    '/permission/list' => '\App\Http\Apis\Permission\ListApi',
    '/permission/info' => '\App\Http\Apis\Permission\InfoApi',
    '/permission/add' => '\App\Http\Apis\Permission\AddApi',
    '/permission/edit' => '\App\Http\Apis\Permission\EditApi',
    '/permission/del' => '\App\Http\Apis\Permission\DelApi',
    '/permission/group/list' => '\App\Http\Apis\Permission\Group\ListApi',
    '/permission/group/info' => '\App\Http\Apis\Permission\Group\InfoApi',
    '/permission/group/add' => '\App\Http\Apis\Permission\Group\AddApi',
    '/permission/group/edit' => '\App\Http\Apis\Permission\Group\EditApi',
    '/permission/group/del' => '\App\Http\Apis\Permission\Group\DelApi',

    '/role/list' => '\App\Http\Apis\Role\ListApi',
    '/role/info' => '\App\Http\Apis\Role\InfoApi',
    '/role/add' => '\App\Http\Apis\Role\AddApi',
    '/role/edit' => '\App\Http\Apis\Role\EditApi',
    '/role/del' => '\App\Http\Apis\Role\DelApi',

    '/token/list' => '\App\Http\Apis\Token\ListApi',
    '/token/info' => '\App\Http\Apis\Token\InfoApi',
    '/token/clean' => '\App\Http\Apis\Token\CleanApi',
    '/token/del' => '\App\Http\Apis\Token\DelApi',

    '/user/list' => '\App\Http\Apis\User\ListApi',
    '/user/info' => '\App\Http\Apis\User\InfoApi',
    '/user/add' => '\App\Http\Apis\User\AddApi',
    '/user/edit' => '\App\Http\Apis\User\EditApi',
    '/user/del' => '\App\Http\Apis\User\DelApi',

    '/acl/batch/query' => '\App\Http\Apis\Acl\BatchQueryApi',
    '/acl/batch/set' => '\App\Http\Apis\Acl\BatchSetApi',
    '/acl/role/query' => '\App\Http\Apis\Acl\RoleQueryApi',
    '/acl/role/set' => '\App\Http\Apis\Acl\RoleSetApi',

    '/project/list' => '\App\Http\Apis\Project\ListApi',
    '/project/info' => '\App\Http\Apis\Project\InfoApi',
    '/project/add' => '\App\Http\Apis\Project\AddApi',
    '/project/edit' => '\App\Http\Apis\Project\EditApi',
    '/project/del' => '\App\Http\Apis\Project\DelApi',

    '/directory/list' => '\App\Http\Apis\Directory\ListApi',
    '/directory/info' => '\App\Http\Apis\Directory\InfoApi',
    '/directory/add' => '\App\Http\Apis\Directory\AddApi',
    '/directory/edit' => '\App\Http\Apis\Directory\EditApi',
    '/directory/del' => '\App\Http\Apis\Directory\DelApi',

    '/doc/list' => '\App\Http\Apis\Doc\ListApi',
    '/doc/info' => '\App\Http\Apis\Doc\InfoApi',
    '/doc/add' => '\App\Http\Apis\Doc\AddApi',
    '/doc/edit' => '\App\Http\Apis\Doc\EditApi',
    '/doc/del' => '\App\Http\Apis\Doc\DelApi',
];
