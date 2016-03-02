{$modules.head}

<!DOCTYPE html>

<html>

<head>

    <title>Formulario</title>
    <meta charset= "UTF-8">
    <link rel = "stylesheet" type = "text/css" href ="style.css">

</head>

<body>

<!--Información del usuario -->


<form action = "" method = "post">
    <h1>Registre d'Instruments
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




</body>

</html>