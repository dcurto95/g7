{$modules.head}

<!--
// {$url.global} direccio , la source de la imatge haure de ser tal que aixi {$url.global}imag/corda/guitarra
//Les fletxes hauran de tenir el link , per saber quina es l pagina seguent/anterior , per saber-ho ho farem extraient
//el getParams(),

// print_r molt util per debugar arrays
-->

<h1>EXERCICI 3</h1>
<div id ="slider">

    {$modules.vent}


    {if $is_last eq false}
        <a href="{$url.global}/exercici3/{$next}" class = "control_next">></a>
    {/if}

    {if $is_first eq false}
        <a href="{$url.global}/exercici3/{$previous}" class="control_prev"><</a>
    {/if}

    <img src="{$image_url}" >
</div>


{$modules.footer}