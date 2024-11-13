<style>

.login_form {
    text-align:center;
    margin-top:10%
}


</style>

<div class="login_form">
    <form action=<?php echo $this->path ?> method="post" name="login_form">

        <p>Username : <input type="text" name="input_login" id="input_login" placeholder="Username"></p>
        <p>Password : <input type="password" name="input_password" id="input_password" placeholder="Password"></p>
        <input type="hidden" value="login_form" name="login_form">
        <p><input type="submit" value="Login" /></p>

    </form>
</div>