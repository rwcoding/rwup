<?php

class DocLoginUser
{

}

return new class {
    #[Att(desc: "", rule: "")]
    public string $username = "";

    public string $password;

    public array|DocLoginUser $user;
};
