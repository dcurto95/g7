{$modules.head}

<h1>EXERCICI 3</h1>
<div id ="slider">

    {$modules.vent}
    {$modules.corda}
    {$modules.percussio}


    {if $is_last eq false}
        <a href="{$url.global}/exercici3/{$next}" class = "control_next">></a>
    {/if}

    {if $is_first eq false}
        <a href="{$url.global}/exercici3/{$previous}" class="control_prev"><</a>
    {/if}

    <img src="{$image_url}" >
</div>


{$modules.footer}