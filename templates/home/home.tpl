{$modules.head}

<h1 class="light-blue-text"> I'M HOME!  </h1>


<div class="row">

    <div class="col s12 m12">
        <div class="card medium">
            <div class="card-image">
                <img src="/img/product_img_big/{$lastProduct.id_user}_{$lastProduct.image_big}">
                <a href="{$url.global}/p/{$lastProduct.name}" class="card-title">{$lastProduct.name}</a>
            </div>
            <div class="card-action">
                 <a href="{$url.global}/p/{$lastProduct.name}">{$lastProduct.name}</a>
            </div>
        </div>
    </div>
    <h3 class="light-blue-text center-align"> MOST VIEWED PRODUCTS </h3>
    {foreach from=$mvProduct item=p}
        <div class="col s3 m3">

            <div class="card hoverable">
                <div class="card-image">
                    <img src="/img/product_img_big/{$p.id_user}_{$p.image_big}">
                    <a href="{$url.global}/p/{$p.name}" class="card-title">{$p.name}</a>

                </div>
                <div class="card-content">
                    <p>Description:{$p.description|truncate:50}</p><br>
                    <p>Price: {$p.price} &#8364</p><br>
                    <p>Expiry Date:{$p.date}</p>
                </div>
                <div class="card-action">
                    <a href="{$url.global}/p/{$p.name}" >View the product</a>
                </div>
            </div>

        </div>
    {/foreach}


    <div class = center-align>
        <h3 class="light-blue-text"> LATEST UPLOADED PRODUCT PHOTOS  </h3>
        {foreach from =$image item = i}

            <img src ="img/product_img_tiny/{$i.id_user}_{$i.image_small}">

        {/foreach}
    </div>



</div>

<div class = center-align>
    <h3 class="light-blue-text"> LATEST TWEETS  </h3>
    <a class="twitter-timeline" href="https://twitter.com/hashtag/LSStore" data-widget-id="722405726187089921">Tweets sobre #LSStore</a>
    <script> {literal}
        !function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0],
                    p = /^http:/.test(d.location) ? 'http' : 'https';
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = p + "://platform.twitter.com/widgets.js";
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, "script", "twitter-wjs");
        {/literal}
    </script>
</div>



{$modules.footer}






