{$modules.head}



<p>"{$edit}"</p>
<p>"{$info.name}"</p>
<p>"{$info.type}"</p>
<p>"{$info.url}"</p>

<form action = "" method = "post">
    <h1 class = "hex2">Registre d'Instruments
        <span>Completi el formulari per registrar l'instrument.</span>
    </h1>

    <label for ="instrument">Nom instrument {$edit}</label>
    {if $edit ==1}
        <input type="text" name="instrument"  value = "{$info.name}" autofocus required>
        <label for = "tipus">Tipus instrument</label>
        <select name = "tipus">
            <option selected="selected" value="corda">Corda</option>
            <option value="vent">Vent</option>
            <option value="percussio">Percussio</option>
        </select>

        <label for = "url">URL</label>
        <input type="text"  name ="url" value = "{$info.url}" required>

    <label for = "url">URL</label>
    <input type="text"  name ="url" placeholder="Introdueix la URL" required>

    {else}
        <input type="text" name="instrument" placeholder="Introdueix el nom de l'instrument" autofocus required>
        <label for = "tipus">Tipus instrument</label>
        <select name = "tipus">
            <option selected="selected" value="corda">Corda</option>
            <option value="vent">Vent</option>
            <option value="percussio">Percussio</option>
        </select>

        <label for = "url">URL</label>
        <input type="text"  name ="url" placeholder="Introdueix la URL" required>

    {/if}

    <input type="submit" name="submit" value="Enviar">

</form>


<div id ="instrument">
    {assign var="vent" value='#cc33ff'}
    {assign var="percussio" value='#ff9933'}
    {assign var="corda" value='#80bfff'}
    {assign var="index" value=0}

    <h1 class = "hex2"> Llistat d'Instruments</h1>
    <ul id ="list">

        {foreach from = $instruments item = i}

            {if $i.instrument.type == 2}
              <li style="background: {$vent}">
                  <a href="{$url.global}/exercici1/{$i.position }">{$i.instrument.name}</a>
                  <a href="{$url.global}/exercici2/edit/{$i.instrument.id}" class = "btn-edit"> Edit </a>
                  <a href="{$url.global}/exercici2/delete/{$i.instrument.id}" class = "btn-delete"   onclick="return confirm('Estàs segur que vols eliminar l\'instrument?')"> Delete </a>
              </li>
            {elseif $i.instrument.type == 1}
                <li style="background: {$corda}">
                    <a href="{$url.global}/exercici1/{$i.position}">{$i.instrument.name}</a>
                    <a  href="{$url.global}/exercici2/edit/{$i.instrument.id}" class = "btn-edit"> Edit </a>
                    <a href="{$url.global}/exercici2/delete/{$i.instrument.id}" class = "btn-delete"  onclick="return confirm('Estàs segur que vols eliminar l\'instrument?')"> Delete </a>
                </li>
            {elseif $i.instrument.type == 3}
                <li style="background: {$percussio}">
                    <a href="{$url.global}/exercici1/{$i.position}">{$i.instrument.name}</a>
                    <a href="{$url.global}/exercici2/edit/{$i.instrument.id}" class = "btn-edit"> Edit </a>
                    <a href="{$url.global}/exercici2/delete/{$i.instrument.id}" class = "btn-delete"  onclick="return confirm('Estàs segur que vols eliminar l\'instrument?')"> Delete </a>
                </li>
            {/if}

        {/foreach}

    </ul>

</div>

<div id = "legend">
    <ul>
        <li><span style="background: {$vent}"></span> Vent </li>
        <li><span style="background: {$corda}"></span> Corda </li>
        <li><span style="background: {$percussio}"></span> Percussio </li>

    </ul>
</div>




{$modules.footer}