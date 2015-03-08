<html>
    <head>
        <link rel="stylesheet" type="text/css" href="public/css/main.css" />
        <script src="public/js/jquery-2.1.3.min.js"></script> 
        <title>{if isset($title)}{$title}{else}MyHomePage{/if}</title>
    </head>
    <header>
        <ul class="navigation">
            <li class="left"><a href="/">Home</a></li>
            <li class="left"><a href="/">About</a></li>
            {if isset($user)}
                <li class="right"><a href="/user?signout">Sign out</a></li>
                <li class="right"><a href="/links?{$user|escape}">{$user|escape}</a></li>
            {else}
                <li class="right"><a href="/user">Sign in</a></li>
            {/if}
        </ul>
    </header>

    <div id="content">
        <h1 class="logo">My Home Page</h1>
        {include file="$controller.tpl"}
    </div>
</html>