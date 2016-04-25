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
                    <p>Either your registration failed or you are already in our database.</p>
                {/if}
                {if $auth_status eq 2}
                    <span class="card-title red-text">Log in Failed</span>
                    <p>Username or password incorrect.</p>
                {/if}


            </div>
            <div class="card-action">
                <a href="{$url.global}">Take me home</a>
                {if $auth_status eq 2}
                    <a href="{$url.global}/login">Try again</a>
                {/if}
            </div>
        </div>
    </div>
</div>

<div class="space-50" style="height: 1200px"></div>

{$modules.footer}