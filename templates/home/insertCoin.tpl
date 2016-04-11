{$modules.head}


<h1> HOLA MON! </h1>

<form action="" method = "post">

    <p class="range-field">
        <label for =test5> Introdueix la quantitat que vols inserir</label>
        <input type="range" id="test5" name ="test5" min="1" max="100" />
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