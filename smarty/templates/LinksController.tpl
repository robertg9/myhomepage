{if isset($userlinks[0])}
    {foreach from=$userlinks key=id item=data}
        <p>
            <a href="{$data.userlink|escape}" title="{$data.userlink|escape}">{$data.domainname|escape}</a>
        </p>
    {/foreach}
{/if}

{if $loggedInUserPage == true}
    <p class="hidden" id="user-get">{$userget}</p>
    <p>
        Account status : <b class="{if $userStatus == 'publicacc'}green{else}red{/if}" id="current-status">{$userStatus}</b>
    </p>
    <p>
        Change status to : <a href="/" id="change-status">{if $userStatus == 'publicacc'}private{else}publicacc{/if}</a>
    </p>
    <form method="POST" action="/links?{$userget}" id="links">
        <input type="hidden" value="{$csrf}" name="{$csrfId}">
        <input type="hidden" value="linklist" name="link-list">
        <p>
            <input type="text" maxlength="200" name="link1" size="100">
        </p>
        <p id="next">
            <input type="button" value="Add next" id="add-next">
        </p>
        <p>
            <input type="submit" value="save">
        </p>
    </form>
    <script src="public/js/links.js"></script>
{/if}