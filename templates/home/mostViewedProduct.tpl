{$modules.head}
<div class="row">

    <ul class="collection with-header">

        <li class="collection-header"><h4>Most Viewed Products </h4></li>
        {foreach from=$prouducts item=p}
            <li class="collection-item avatar">
                <img src="/img/product_img_big/{$p.id_user}_{$p.image_big}" alt="" class="circle">
                <a href="{$url.global}/p/{$p.name}" class="title">{$p.name}</a>
                <p>{$p.description|truncate:50} <br>
                    {$p.date}
                </p>
                <p class="secondary-content"> {$p.views} <i class="material-icons">visibility</i></p>
            </li>

        {/foreach}
    </ul>


    <div class="col s12 center-align">
        <ul class="pagination">

            {if !$is_first}

                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            {/if}
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="{$url.global}/mv/2">2</a></li>
            <li class="waves-effect"><a href="{$url.global}/mv/3">3</a></li>
            <li class="waves-effect"><a href="{$url.global}/mv/4">4</a></li>

            {if !$is_last}
             <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            {/if}
        </ul>

    </div>

</div>



{$modules.footer}






