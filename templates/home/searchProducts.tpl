{$modules.head}


<form method="post">
    <input type="text" name="search">
    <input type="submit" name="submit" value="Search">
</form>

<div class="row">
    {if $active eq 1}
        {foreach from=$search item=s}

            <div class="col s3 m3">

                <div class="card hoverable">
                    <div class="card-image">
                        <img src="/img/product_img_big/{$s.id_user}_{$s.image_big}">
                        <a href="{$url.global}/p/{$s.name}" class="card-title">{$s.name}</a>

                    </div>
                    <div class="card-content">
                        <p>Description:{$s.description|truncate:50}</p><br>
                        <p>Price: {$s.price} &#8364</p><br>
                        <p>Expiry Date:{$s.date}</p>
                    </div>
                    <div class="card-action">
                        <a href="{$url.global}/p/{$p.name}" >View the product</a>
                    </div>
                </div>

            </div>
        {/foreach}
    {/if}
</div>
{$modules.footer}






