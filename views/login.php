<section class="main hero is-fullheight">
  <div class="hero-body">
    <div class="container center">
      <div id="login-card" class="card">
        <div class="card-content">
          <p class="title">Acesse a sua conta:</p>
          <div class="field">
            <p class="control has-icons-left">
              <input id="user" class="input" type="text" placeholder="Nome de usuário">
              <span class="icon is-small is-left">
                <i data-feather="user"></i>
              </span>
            </p>
          </div>
          <div class="field">
            <p class="control has-icons-left">
              <input id="pass" class="input" type="password" placeholder="Senha">
              <span class="icon is-small is-left">
                <i data-feather="lock"></i>
              </span>
            </p>
          </div>
          <div class="field">
            <p class="login control">
              <button id="login" class="button is-pink">Entrar</button>
            </p>
          </div>
        </div>
        <footer class="card-footer">
          <p class="card-footer-item">
            <span>
              Baixe o código no <a href="https://github.com/PxLucasF/hextech-css">GitHub</a> e tenha seu próprio encurtador.
            </span>
          </p>
        </footer>
      </div>
    </div>
  </div>
</section>
<script>
    feather.replace();
    new ClipboardJS('#copy');
</script>