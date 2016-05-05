{$modules.head}
<div class="row">

    <ul class="collection with-header">

        <li class="collection-header"><h4>Most Viewed Products </h4></li>
        {foreach from=$prouducts item=p}
            <li class="collection-item avatar">
                <a href="{$url.global}/p/{$p.name}" class="title">{$p.name}</a>
                <p>{$p.description} <br>
                    {$p.date}
                </p>
                <p class="secondary-content"> {$p.views} <i class="material-icons">visibility</i></p>
            </li>

        {/foreach}
    </ul>





    <div class="col s12 center-align">
        <ul class="pagination">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect"><a href="#!">5</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>

    </div>

</div>



{$modules.footer}






