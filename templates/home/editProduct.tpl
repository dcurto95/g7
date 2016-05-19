{$modules.head}

<h1 class="light-blue-text"> EDIT PRODUCT: </h1>

<div class="row">
    <form class="col s12" method="post" action="" enctype = "multipart/form-data">
        <div class="row">
            <div class="input-field col s6">
                <input id="product_name" name="product_name" type="text" class="validate" required value="{$product_name}" maxlength="50">
                <label for="product_name">Name</label>
            </div>
            <div class="input-field col s3">
                <input id="price" name="price" type="number" pattern="{$product_float_regex}" class="validate" required value="{$product_price}" min="0.01" step="0.01">
                <label for="price" data-error="Wrong, must be a numeric value form 0 to 999" data-success="Ok!">Price</label>
            </div>
            <div class="input-field col s3">
                <input id="stock" name="stock" type="number" pattern="{$product_numeric_regex}" class="validate" required value="{$product_stock}" min ="1">
                <label for="stock" data-error="Wrong, must be a numeric value form 0 to 999" data-success="Ok!">Stock</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <h7 class="deep-orange-text lighten-1">Description</h7>
                <textarea id="description" name="description" class="materialize-textarea">{$product_description}</textarea>
                <script>
                    // Replace the <textarea id="description"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace( 'description' );
                </script>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <label for="date">Date</label>
                <input id="date" name="date" type="text" class="datepicker" required value="{$product_date}">
            </div>
        </div>
        <div class = "row">
            <div class="file-field input-field col s8">
                <div class="btn waves-effect waves-light deep-orange lighten-2 col s4">
                    <span>Product image</span>
                    <input type="file" name="inputFile" id="inputFile">
                </div>
                <div class="file-path-wrapper col s8">
                    <input class="file-path validate" name = 'img_path' type="text" value="">
                </div>
            </div>
            <div class="file-field input-field col s4">
                <img id="image_upload_preview" class="img-circle" src="{$product_image}" alt="your image" />
            </div>

        </div>
        <input class="btn waves-effect waves-light light-blue lighten-1" type="submit" id ="submit" name="submit" value="EDIT">
        <button class="modal-trigger btn waves-effect waves-light red lighten-1 " href="#modalRemove" type="submit" id ="submit" name="submit">REMOVE</button>
    </form>
</div>

<div id="modalRemove" class="modal">
    <form>
        <div class="modal-content">
            <h4 class="red-text text-lighten-1">REMOVE</h4>
            <p>Are you sure you want to remove this product?</p>
        </div>
        <div class="modal-footer">
            <input class="modal-action modal-close btn-flat waves-effect waves-ripple"
                   type="submit" id ="remove" name="remove" value="Yes">
            <a href="#!" class="modal-action modal-close waves-effect waves-ripple btn-flat ">No</a>
        </div>
    </form>
</div>

<div class="space-50" style="height: 50px"></div>




{$modules.footer}