{$modules.head}

<h1 class="light-blue-text"> AUTENTICATION: </h1>

<div class="row">
    <div class="col col-md-2"></div>

    <div class="col col-md-6">
        <div class="card">
            <div class="card-content">
                {if $auth_status eq 0}
                    <span class="card-title green-text">Auhentication Successfuly</span>
                    <p>Your registration is completed.</p>
                {/if}
                {if $auth_status eq 1}
                    <span class="card-title red-text">Auhentication Failed</span>
                    <p>Your registration failed.</p>
                {/if}

            </div>
            <div class="card-action">
                <a href="{$url.global}">Take me home</a>
            </div>
        </div>
    </div>
</div>

<div class="space-50" style="height: 1200px"></div>

{$modules.footer}