{$modules.head}

<div class="row center-align" >

    {if $showLastProduct eq true}
        <div class="center-align">
            <div class="card card-small">
                <div class="card-image">
                    <img  class = "responsive-img" src="/img/product_img_big/{$lastProduct.id_user}_{$lastProduct.image_big}">
                    <a href="{$lastProduct.url}" class="card-title deep-orange lighten-1">{$lastProduct.name}</a>
                </div>
                <div class="card-action">
                    <a href="{$lastProduct.url}">{$lastProduct.name|truncate:20}</a>
                </div>
            </div>
        </div>
    {/if}


    <h3 class="light-blue-text center-align"> MOST VIEWED PRODUCTS </h3>
    <div class = "row">
        {foreach from=$mvProduct item=p}
            <div class="col s3 m3">
                <div class="card hoverable">
                    <div class="card-image">
                        <img src="/img/product_img_big/{$p.id_user}_{$p.image_big}">
                        <a href="{$p.url}" class="card-title deep-orange lighten-1">{$p.name|truncate:20}</a>

                    </div>
                    <div class="card-content">
                        <p><b>Description: </b>{$p.description}</p><br>
                        <p><b> Price: </b>{$p.price} &#8364</p><br>
                        <p><b>Expiry Date:</b>{$p.date}</p>

                    </div>
                    <div class="card-action center-align">
                        <a href="{$p.url}" ><b>View the product</b></a>
                    </div>
                </div>

            </div>
        {/foreach}
    </div>



    <div class = "center-align">
        <h3 class="light-blue-text"> LATEST UPLOADED PRODUCT PHOTOS </h3>

            {foreach from =$image item = i}

               <img src ="img/product_img_tiny/{$i.id_user}_{$i.image_small}">

            {/foreach}
    </div>






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






