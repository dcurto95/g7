{$modules.head}

<h1 class="light-blue-text"> EDIT COMMENT: </h1>

<div class="row">
    <form class="col s12" method="post" action="" enctype = "multipart/form-data">

        <div class="row">
            <div class="input-field col s12">
                <h7 class="deep-orange-text lighten-1">Comment, to: {$user_dest}</h7>
                <textarea id="comment" name="comment" class="materialize-textarea">{$comment}</textarea>
                <script>
                    // Replace the <textarea id="description"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace( 'comment' );
                </script>
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
            <p>Are you sure you want to remove this comment?</p>
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