{$modules.head}

<div class="row">
    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title">Validate your account</span>
            </div>
            <div class="card-content white-text">
                <p>Your activation code is: {$validationCode}</p>
            </div>
            <div class="card-action">
                <a href="{$url.global}/validate/{$validationCode}">Click here to auto-validate!</a>
            </div>
        </div>
    </div>
</div>

{$modules.footer}