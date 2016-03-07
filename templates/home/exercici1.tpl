{$modules.head}


<h1>EXERCICI 1</h1>
<div id ="slider">
    {if $is_last eq false}
    <a href="{$url.global}/exercici1/{$next}" class = "control_next">></a>
    {/if}

    {if $is_first eq false}
    <a href="{$url.global}/exercici1/{$previous}" class="control_prev"><</a>
    {/if}

    <img src="{$image_url}" >
</div>


{$modules.footer}