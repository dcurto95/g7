{$modules.head}



<form action = "" method = "post">
    <h1 class = "hex2">Registre d'Instruments
        <span>Completi el formulari per registrar l'instrument.</span>
    </h1>

    <label for ="instrument">Nom instrument</label>
    <input type="text" name="instrument" placeholder="Introdueix el nom de l'instrument" autofocus required>

    <label for = "tipus">Tipus instrument</label>
    <select name = "tipus">
        <option selected="selected" value="corda">Corda</option>
        <option value="vent">Vent</option>
        <option value="percussio">Percussio</option>
    </select>

    <label for = "url">URL</label>
    <input type="text"  name ="url" placeholder="Introdueix la URL" required>

    <input type="submit" name="submit" value="Enviar">

</form>


<div id ="instrument">
    {assign var="vent" value='#00FF1A'}
    {assign var="percussio" value='#FFDA00'}
    {assign var="corda" value='#00FFFF'}
    {assign var="index" value=0}

    <h1 class = "hex2"> Llistat d'Instruments</h1>
    <ul id ="list">
        {foreach from = $instruments item = i}

            {if $i.type == 2}
                <li style="background: {$vent}"><a href="{$url.global}/exercici1/{$i.id }">{$i.name}</li>
            {elseif $i.type == 1}
                <li style="background: {$corda}"><a href="{$url.global}/exercici1/{$i.id}">{$i.name}</li>
            {elseif $i.type == 3}
                <li style="background: {$percussio}"><a href="{$url.global}/exercici1/{$i.id}">{$i.name}</li>
            {/if}

        {/foreach}
    </ul>

    <ul id ="legend">
        <li style="background: {$vent}"> Vent </li>
        <li style="background: {$corda}"> Corda </li>
        <li style="background: {$percussio}"> Percussio </li>

    </ul>



</div>



{$modules.footer}