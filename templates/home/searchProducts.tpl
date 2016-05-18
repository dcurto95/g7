{$modules.head}


<div class="row center-align">
    <form  method="post" name ="form">
            <div class="input-field col s6">
                <i class="material-icons prefix">search</i>
                <input type="text" placeholder="Enter the name of the product you want to search" name="search" value ={$lastSearch}>
            </div>

        <div class="input-field col s4">
        <select  id="sortby" name="sortby" onchange="this.form.submit()">
            <option name ="none" value="none" disabled selected >Order by</option>
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


<div class="row">

    {foreach from=$search item=s}

        <div class="col s3 m3">

            <div class="card hoverable">
                <div class="card-image">
                    <img src="/img/product_img_big/{$s.id_user}_{$s.image_big}">
                    <a href="{$s.url}" class="card-title deep-orange lighten-1">{$s.name|truncate:20}</a>

                </div>
                <div class="card-content">
                    <p><b>Description</b> {$s.description}</p>
                    <p><b>Price: </b> {$s.price} &#8364</p><br>
                    <div class="chip">
                        <img src="{$s.profile}" alt="Contact Person">
                        <b>{$s.seller}</b>
                        {if $s.exit_factor >= 1}
                            <i id="factor_si" class="tiny material-icons">stars</i>
                        {else}
                            <i id="factor_no" class="tiny material-icons">stars</i>
                        {/if}

                        {if $s.exit_factor >= 2}
                            <i id="factor_si" class="tiny material-icons">stars</i>
                        {else}
                            <i id="factor_no" class="tiny material-icons">stars</i>
                        {/if}

                        {if $s.exit_factor >= 3}
                            <i id="factor_si" class="tiny material-icons">stars</i>
                        {else}
                            <i id="factor_no" class="tiny material-icons">stars</i>
                        {/if}

                        {if $s.exit_factor >= 4}
                            <i id="factor_si" class="tiny material-icons">stars</i>
                        {else}
                            <i id="factor_no" class="tiny material-icons">stars</i>
                        {/if}

                        {if $s.exit_factor >= 5}
                            <i id="factor_si" class="tiny material-icons">stars</i>
                        {else}
                            <i id="factor_no" class="tiny material-icons">stars</i>
                        {/if}
                    </div>

                </div>
                <div class="card-action center-align">
                    <a href="{$s.url}"><b>View the product</b></a>
                </div>
            </div>

        </div>
    {/foreach}

    <div class="col s12 center-align">
        <ul class="pagination">

            {if $is_first}
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            {else}
                <li class="waves-effect"><a href="{$url.global}/search/{$previous}"><i class="material-icons">chevron_left</i></a></li>
            {/if}

            {foreach from=$num_pag item=n}

                {if $n == $actual}
                    <li class="active"><a href="#">{$n}</a></li>

                {else}
                    <li class="waves-effect"><a href="{$url.global}/search/{$n}">{$n}</a></li>
                {/if}


            {/foreach}
            {if $is_last}
                <li class="disabled"><a href="#"><i class="material-icons">chevron_right</i></a></li>
            {else}
                <li class="waves-effect"><a href="{$url.global}/search/{$next}"><i class="material-icons">chevron_right</i></a></li>
            {/if}
        </ul>

    </div>


</div>

{$modules.footer}






