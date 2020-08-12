<style>

.signup_form {
    text-align:center;
    margin-top:10%
}


</style>

<div class="signup_form">
    
    <form action=<?php echo $this->path ?> method="post" name="signup_form">
        
        <p>Username : <input type="text" name="input_username" id="input_username" placeholder="Username"></p>
        <p>Password : <input type="password" name="input_password" id="input_password" placeholder="Password"></p>
        <p>Reinput Password : <input type="password" name="input_password2" id="input_password2" placeholder="Password"></p>
        <p>Email : <input type="email" name="input_email" id="input_email" placeholder="Email"></p>
        <input type="hidden" value="signup_form" name="signup_form">
        <p><input type="submit" value="Signup" /></p>

    </form>
</div>