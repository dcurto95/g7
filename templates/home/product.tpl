{$modules.head}

<div class = "row center-align">
    <h4 class="deep-orange-text lighten-1">{$name}</h4>
</div>
<div class = "row center-align" id="preview_producte">

    <div class = "col s6 center-align">

        <img id="product_img"class="materialboxed center-align" data-caption="{$name}" src="{$img_path}">

    </div>
    <div class = "col s6 left-align">

        <div class="row valign-wrapper card_propietari"  id="product_price">
            <div class="col s2">
                <img src="{$profile}" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10">
                <h5>Provider:{$user}</h5>
            </div>
        </div>

        <p><b>Price:</b> {$preu}€</p>
        <p><b>Expiry day:</b> {$date}. {$left_days} day(s) left.</p>
        <p><b>Available stock:</b> {$stock}</p>
        <p><b>Description:</b> {$descripcio}</p>
        <p><b>Views:</b> {$views}</p>

        <p><b>Exit factor:</b>

        {if $exit_factor >= 1}
            <i id="factor_si" class="tiny material-icons">stars</i>
        {else}
            <i id="factor_no" class="tiny material-icons">stars</i>
        {/if}

        {if $exit_factor >= 2}
            <i id="factor_si" class="tiny material-icons">stars</i>
        {else}
            <i id="factor_no" class="tiny material-icons">stars</i>
        {/if}

        {if $exit_factor >= 3}
            <i id="factor_si" class="tiny material-icons">stars</i>
        {else}
            <i id="factor_no" class="tiny material-icons">stars</i>
        {/if}

        {if $exit_factor >= 4}
            <i id="factor_si" class="tiny material-icons">stars</i>
        {else}
            <i id="factor_no" class="tiny material-icons">stars</i>
        {/if}

        {if $exit_factor >= 5}
            <i id="factor_si" class="tiny material-icons">stars</i>
        {else}
            <i id="factor_no" class="tiny material-icons">stars</i>
        {/if}

        <p><b>Opinions: </b>{$likes} <i class="material-icons tiny light-green-text">thumb_up</i>/ {$dislikes} <i class="material-icons tiny red-text">thumb_down</i></p>

        </p>
        {if $isLogged eq 1}
            {if $bought eq 1}
                <p><b>Did you like this product?</b>
                    <form method="post">
                        <button class="btn-floating waves-effect waves-light light-green" type="post" name="review" value="like">Yes!</button>
                        <button class="btn-floating waves-effect waves-light red" type="post" name="review" value="dislike">No!</button>
                    </form>
                </p>
            {/if}
            <a class="waves-effect waves-light btn" href="{$url.global}/buyProduct/{$id_product}"><i class="material-icons right">shopping_basket</i>Buy</a>
        {/if}

    </div>
</div>

<div class = "row center-align">
    <ul class="collection with-header">
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