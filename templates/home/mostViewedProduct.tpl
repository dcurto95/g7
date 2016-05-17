{$modules.head}
<div class="row">

    <ul class="collection with-header">

        <li class="collection-header"><h4>Most Viewed Products </h4></li>
        {foreach from=$prouducts item=p}
            <li class="collection-item avatar">
                <img src="/img/product_img_big/{$p.id_user}_{$p.image_big}" alt="" class="circle">
                <a href="{$p.url}" class="title">{$p.name}</a>
                <p><b>Description:</b>{$p.description}
                    <br><b>Expiricy Date:</b>{$p.date}
                    <br><b>Percentage Views:</b>{$p.views_percentage}%
                </p>
                <p class="secondary-content"> {$p.views} <i class="material-icons">visibility</i><br>
                    {$p.ventes}<i class="material-icons">shopping_cart</i>
                </p>

            </li>

        {/foreach}
    </ul>


    <div class="col s12 center-align">
        <ul class="pagination">

            {if $is_first}
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            {else}
                <li class="waves-effect"><a href="{$url.global}/mv/{$previous}"><i class="material-icons">chevron_left</i></a></li>
            {/if}

            {foreach from=$num_pag item=n}

                {if $n == $actual}
                    <li class="active"><a href="#">{$n}</a></li>

                {else}
                    <li class="waves-effect"><a href="{$url.global}/mv/{$n}">{$n}</a></li>
                {/if}


            {/foreach}
            {if $is_last}
                <li class="disabled"><a href="#"><i class="material-icons">chevron_right</i></a></li>
            {else}
                <li class="waves-effect"><a href="{$url.global}/mv/{$next}"><i class="material-icons">chevron_right</i></a></li>
            {/if}
        </ul>

    </div>

</div>



{$modules.footer}






