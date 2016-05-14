{$modules.head}
<div class="row">

    <ul class="collection with-header">

        <li class="collection-header">
            <div class="row ">
                <div class="col s2">
                    <img src="{$user_img}" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                </div>
                <div class="col s10">
                    <h4 style="margin-top: 5%;">Comments from: {$user_name} </h4>
                </div>
            </div>
        </li>

        {foreach from=$comments item=c}
            <li class="collection-item avatar">
                <img src="/img/profile_img/{$c.user.image}" alt="" class="circle">
                To: <a href="{$url.global}{$c.user_url}" class="title">{$c.user.username}</a>
                <p>{$c.date}</p>
                <p>{$c.comment|truncate:50}</p>
                <p class="secondary-content"><a href="{$url.global}/editComment/{$c.id}" class="secondary-content">Edit/Remove <i class="material-icons">send</i></a></p>
            </li>

        {/foreach}
    </ul>

</div>



{$modules.footer}






