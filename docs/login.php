<?php
class DocLoginUser {

}

return new class {
    #[Att(desc: "", aaa: "")]
    public string $username = "";

    public string $password;

    public array|DocLoginUser $user;
};
