{$modules.head}
<div class="row">

    <ul class="collection with-header">

        <li class="collection-header"><h4>Usuari: {$name} </h4></li>
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






