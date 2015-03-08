{if $status == 'signup'}
    <h2 class="green">Your account has been created you can no log in.</h2>
{/if}
<form method="POST" action="/user">
    <input type="hidden" name="signin">
    <h2>Sign in</h2>
    <p>
        <label for="login">Login : </label>
        <input type="text" maxlength="40" id="login" name="login">
    </p>
    <p class="password">
        <label for="password">Pass : </label>
        <input type="text" maxlength="40" id="password" name="pass">
    </p>
    <input type="submit" value="Sign in">
</form>

<form method="POST" action="/user">
    <input type="hidden" name="signup">
    <h2>Sign up</h2>
    <p>
        <label for="login">Login : </label>
        <input type="text" maxlength="40" id="login" name="login">
    </p>
    <p class="password">
        <label for="password">Pass : </label>
        <input type="text" maxlength="40" id="password" name="pass">
    </p>
    
    <p>
        Public : <input type="radio" name="accounttype" value="publicacc" checked="checked"/>
        Private : <input type="radio" name="accounttype" value="private" />
    </p>
    
    <input type="submit" value="Sign up">
</form>