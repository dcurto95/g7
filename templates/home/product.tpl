{$modules.head}

<div class = "row z-depth-2" id="preview_producte">

    <div class = "col s6">

        <img id="product_img"class="activator center-align" src="{$img_path}">

    </div>
    <div class = "col s6">
        <div class="row valign-wrapper card_propietari"  id="product_price">
            <div class="col s2">
                <img src="{$profile}" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10">
                <p>Provider: <a href="#">{$user}</a></p>
            </div>
        </div>


        <p>{$name} - {$preu}€</p>
        <p>Expiry day: {$date}</p>
        <p>Price: {$preu}</p>
        <p>Aviable stock: {$stock}</p>
        <p>Sold Products: {$soldProducts}.</p>
        <p>Description: {$descripcio}</p>
        <a class="waves-effect waves-light btn" href="{$url.global}/buyProduct/{$name}"><i class="material-icons right">shopping_basket</i>Buy</a>

    </div>
</div>
{$modules.footer}