{$modules.head}


<h1 class="light-blue-text"> INSERT COINS: </h1>

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


{$modules.footer}