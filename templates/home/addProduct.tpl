{$modules.head}

<h1 class="light-blue-text"> ADD PRODUCT: </h1>

<div class="row">
    <form class="col s12">
        <div class="row">
            <div class="input-field col s6">
                <input id="product_name" type="text" class="validate" required>
                <label for="product_name">Name</label>
            </div>
            <div class="input-field col s3">
                <input id="last_name" type="text" pattern="{$product_numeric_regex}" class="validate" required>
                <label for="last_name" data-error="Wrong, must be a numeric value form 0 to 999" data-success="Ok!">Price</label>
            </div>
            <div class="input-field col s3">
                <input id="last_name" type="text" pattern="{$product_numeric_regex}" class="validate" required>
                <label for="last_name" data-error="Wrong, must be a numeric value form 0 to 999" data-success="Ok!">Stock</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea id="description" class="materialize-textarea"></textarea>
                <label for="description">Description</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <label for="date">Date</label>
                <input type="text" class="datepicker" id="date">
            </div>
        </div>
        <div class = "row">
            <div class="file-field input-field col s8">
                <div class="btn col s4">
                    <span>Product image</span>
                    <input type="file" id="inputFile">
                </div>
                <div class="file-path-wrapper col s8">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="file-field input-field col s4">
                <img id="image_upload_preview" class="img-circle" src="http://placehold.it/100x100" alt="your image" />
            </div>

        </div>

        <input class="btn waves-effect waves-light light-blue lighten-1" type="submit" id ="submit" name="submit" value="ADD">
    </form>
</div>


<div class="space-50" style="height: 50px"></div>




{$modules.footer}