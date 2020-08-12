<style>

.signup_form {
    text-align:center;
    margin-top:10%
}


</style>

<div class="signup_form">
    
    <form action=<?php echo $this->path ?> method="post" name="signup_form">
        
        <p>Username : <input type="text" name="input_username" id="input_username"></p>
        <p>Password : <input type="password" name="input_password" id="input_password"></p>
        <p>Reinput Password : <input type="password" name="input_password2" id="input_password2"></p>
        <p>Email : <input type="email" name="input_email" id="input_email"></p>
        <input type="hidden" value="signup_form" name="signup_form">
        <p><input type="submit" value="Signup" /></p>

    </form>
</div>