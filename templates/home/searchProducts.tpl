{$modules.head}


<form  method="post">
    <div class="row">
        <div class="input-field col s4">
             <input type="text" placeholder="Enter the name of the product you want to search" name="search">
        </div>
        <div class="input-field col s2">
            <input type="submit" class = "btn waves-effect waves-light" name="submit" value="Send" >
        </div>
     </div>
</form>
<div class="row">

    {foreach from=$search item=s}

        <div class="col s3 m3">

            <div class="card hoverable">
                <div class="card-image">
                    <img src="/img/product_img_big/{$s.id_user}_{$s.image_big}">
                    <a href="{$s.url}" class="card-title deep-orange lighten-1">{$s.name}</a>

                </div>
                <div class="card-content">
                    <p>Description:{$s.description|truncate:50}</p><br>
                    <p>Price: {$s.price} &#8364</p><br>
                    <p>Expiry Date:{$s.date}</p>
                </div>
                <div class="card-action">
                    <a href="{$s.url}" >View the product</a>
                </div>
            </div>

        </div>
    {/foreach}

</div>
{$modules.footer}






