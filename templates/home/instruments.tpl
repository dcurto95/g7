{$modules.head}

<!--
// {$url.global} direccio , la source de la imatge haure de ser tal que aixi {$url.global}imag/corda/guitarra
//Les fletxes hauran de tenir el link , per saber quina es l pagina seguent/anterior , per saber-ho ho farem extraient
//el getParams(),

// print_r molt util per debugar arrays
-->

<h1>EXERCICI 1</h1>
<div id ="slider">
    <a href="{$url.global}/{$tipus_n}/{$next}" class = "control_next">></a>
    <a href="{$url.global}/{$tipus_p}/{$previous}" class="control_prev"><</a>
    <img src="{$url.global}/imag/{$tipus_a}/{$num}.JPG" >
</div>


{$modules.footer}