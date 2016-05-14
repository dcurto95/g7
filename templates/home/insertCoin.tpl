{$modules.head}



{if $error eq 1}
    <div class="row">
        <div class="col s12 m12 ">
            <div class="card-panel red ">
                <span class="white-text"> Error , you can insert coins if you have reached 1000 coins</span>
            </div>
        </div>
    </div>
{/if}
<h2 class="light-blue-text"> INSERT COINS: </h2>

<form  class="col-md-12" action="" method = "post">
    <p>
        <label for =test5> Introdueix la quantitat que vols inserir</label>
        <input type="number" id="test5" name ="quantitat" min="1" max="100" />
    </p>

    <p>
        <input name="group1" type="radio" id="test1"/>
        <label for="test1">VISA</label>
    </p>
    <p>
        <input name="group1" type="radio" id="test2"/>
        <label for="test2">PayPal</label>
    </p>
    <p>
        <input name="group1" type="radio" id="test3"/>
        <label for="test3">Transferencia</label>
    </p>
    <input class="btn waves-effect waves-light" type="submit" name="action" id="action">

</form>


<h2 class="light-blue-text"> PRODUCTS BOUGHT: </h2>


<table class = "highlight centered">
    <thead>
    <tr>
        <th data-field="id">Name</th>
        <th data-field="name">Product Price</th>
        <th data-field="price">Seller</th>
    </tr>
    </thead>

    <tbody>

    {foreach from=$product item=p}
    <tr>
        {if $p.validLink eq true}
            <td> <a href = "{$p.url}">{$p.nom_producte}</a></td>
        {else}
            <td> <a href = "#">{$p.nom_producte}</a></td>
        {/if}
        <td>{$p.cost}</td>
        <td><a href = "{$url.global}{$p.url_seller}">{$p.nom_venedor}</a></td>



    </tbody>
    {/foreach}
</table>


{$modules.footer}