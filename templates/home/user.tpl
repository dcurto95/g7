{$modules.head}
<div class="row">

    <ul class="collection with-header">

        <li class="collection-header">
            <div class="row ">
            <div class="col s2">
                <img src="{$user_img}" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10">
                <h4 style="margin-top: 5%;">Usuari: {$user_name} </h4>
            </div>
            </div>
        </li>

        {foreach from=$comments item=c}
            <li class="collection-item avatar">
                <img src="/img/product_img_big/{$p.id_user}_{$p.image_big}" alt="" class="circle">
                <a href="{$url.global}" class="title">{$p.name}</a>
                <p>{$p.description|truncate:50} <br>
                    {$p.date} <br>
                    Visites  {$p.views_percentage}%
                </p>
                <p class="secondary-content"> {$p.views} <i class="material-icons">visibility</i><br>
                    {$p.ventes}<i class="material-icons">shopping_cart</i>
                </p>

            </li>

        {/foreach}
    </ul>

</div>



{$modules.footer}






