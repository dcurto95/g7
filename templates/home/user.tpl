{$modules.head}
<div class="row">

    <ul class="collection with-header">

        <li class="collection-header">
            <div class="row ">
                <div class="col s2">
                    <img src="{$user_img}" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                </div>
                <div class="col s10">
                    <h4 style="margin-top: 5%;">User: {$user_name} </h4>
                </div>
            </div>
        </li>
        {if $isLogged eq true}
        <li class="collection-item avatar">
            <form class="" method="post" action="" enctype = "multipart/form-data">
                <div class="row">
                    <div class="input-field ">
                        <h7 class="deep-orange-text lighten-1">Comment</h7>
                        <textarea id="comment" name="comment" class="materialize-textarea"></textarea>
                        <script>
                            // Replace the <textarea id="description"> with a CKEditor
                            // instance, using default configuration.
                            CKEDITOR.replace( 'comment' );
                        </script>
                    </div>
                </div>
                <input class="btn waves-effect waves-light light-blue lighten-1" type="submit" id ="submit" name="submit" value="SEND">
            </form>
        </li>
        {/if}

        {foreach from=$comments item=c}
            <li class="collection-item avatar">
                <img src="/img/profile_img/{$c.user.image}" alt="" class="circle">
                <a href="{$c.user_url}" class="title">{$c.user.username}</a>
                <p>{$c.date}</p>
                <p>{$c.comment|truncate:50}</p>
                {if $c.editable eq true}
                    <p class="secondary-content"><a href="{$url.global}/editComment/{$c.id}" class="secondary-content">Edit/Remove <i class="material-icons">send</i></a></p>
                {/if}

            </li>

        {/foreach}
    </ul>

</div>



{$modules.footer}






