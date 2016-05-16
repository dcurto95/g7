{$modules.head}


<div class="row center-align">
    <form  method="post" name ="form">
            <div class="input-field col s4 ">
                <i class="material-icons prefix">search</i>
                <input type="text" placeholder="Enter the name of the product you want to search" name="search" value ={$lastSearch}>
            </div>

        <div class="input-field col s4">
        <select  id="sortby" name="sortby" onchange="this.form.submit()">
            <option value="" disabled selected >Order by</option>
            <option value="mv" name ="mv">Most Viewed</option>
            <option value="newest" name = "newest">Newest</option>
            <option value="expensive" name = "expensive">Price:$$-$</option>
            <option value="cheap" name ="cheap">Price:$-$$</option>

        </select>
        <label>Sort by</label>
         </div>

        <div class="input-field col s2">
            <input type="submit" class = "btn waves-effect waves-light" name="submit" value="Send" >
        </div>

    </form>

</div>
<!--
    <div class="input-field col s4">
        <form method="post" name="form1" id="form1">
            <select  id="sortby" name="sortby" onchange="this.form.submit()">
                <option value="" disabled selected >Order by</option>
                <option value="mv" name ="mv">Most Viewed</option>
                <option value="newest" name = "newest">Newest</option>
                <option value="expensive" name = "expensive">Price:$$-$</option>
                <option value="cheap" name ="cheap">Price:$-$$</option>

            </select>
            <label>Sort by</label>

        </form>

    </div>
-->

<div class="row">

    {foreach from=$search item=s}

        <div class="col s3 m3">

            <div class="card hoverable">
                <div class="card-image">
                    <img src="/img/product_img_big/{$s.id_user}_{$s.image_big}">
                    <a href="{$s.url}" class="card-title deep-orange lighten-1">{$s.name}</a>

                </div>
                <div class="card-content">
                    <p><b>Description:</b>{$s.description|truncate:50}</p><br>
                    <p><b>Price: </b> {$s.price} &#8364</p><br>
                    <p> <b> Expiry Date:</b>{$s.date}</p>
                </div>
                <div class="card-action center-align">
                    <a href="{$s.url}"><b>View the product</b></a>
                </div>
            </div>

        </div>
    {/foreach}

</div>



<script>

    {literal}

    $(document).ready(function(){



        // Each time you change your sort list, send AJAX request
       // console.log("hey ho");
       // console.log($("#sortby").val());
       /* $("#sortby").change(function(){
            console.log($("#sortby").val());
            $.ajax({
                        method: "GET",
                        url: "http://g7.dev/search",
                        data: { sortby:$("#sortby").val() }
                    })
                    // Copy the AJAX response in the table
                    .done(function( msg ) {
                        console.log("hey ho");
                    });
        });*/
    });
    {/literal}

</script>

{$modules.footer}






