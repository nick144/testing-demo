<header>
    <div id="logo">
        <a href="login.html">Divaz Media</a>
    </div>
</header>
<section id="content">
    <form action="<?php echo site_url() ?>/ws-admin/index/login" id="loginform" method="post">
        <fieldset>
            <section><label for="username">Username</label>
                <div><input type="text" id="username" name="username" autofocus></div>
            </section>
            <section><label for="password">Password </label>
                <div><input type="password" id="password" name="password"></div>
                <div><input type="checkbox" id="remember" name="remember"><label for="remember" class="checkbox">remember me</label></div>
            </section>
            <section>
                <div><button type="submit" class="fr">Login</button></div>
            </section>
        </fieldset>
    </form>
</section>