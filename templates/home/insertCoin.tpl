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
    <tr>
        <td>Alvin</td>
        <td>Eclair</td>
        <td>$0.87</td>
    </tr>
    <tr>
        <td>Alan</td>
        <td>Jellybean</td>
        <td>$3.76</td>
    </tr>
    <tr>
        <td>Jonathan</td>
        <td>Lollipop</td>
        <td>$7.00</td>
    </tr>
    </tbody>
</table>


{$modules.footer}