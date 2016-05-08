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
                <h5>Provider: <a href="#">{$user}</a></h5>
            </div>
        </div>

        <p>Price: {$preu}€</p>
        <p>Expiry day: {$date}. {$left_days} day(s) left.</p>
        <p>Aviable stock: {$stock}</p>
        <p>Description: {$descripcio}</p>
        <p>Views: {$views}</p>
        <p>Exit factor:

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

        </p>
        {if $isLogged gt 0}
            <a class="waves-effect waves-light btn" href="{$url.global}/buyProduct/{$id_product}"><i class="material-icons right">shopping_basket</i>Buy</a>
        {/if}
    </div>
</div>
{$modules.footer}