{$modules.head}


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
        <td> <a href = "{$p.url}">{$p.nom_producte}</a></td>
        <td>{$p.cost}</td>
        <td>{$p.nom_venedor}</td>

    </tbody>
    {/foreach}
</table>


{$modules.footer}