<section class="main hero is-medium">
  <div class="hero-body">
    <div class="container center">
      <h1 class="main title">Cole uma URL grande e compartilhe um link curto!</h1>
      <div class="main field has-addons">
        <div class="control has-icons-left is-expanded">
          <input id="longurl" class="main input" type="text" placeholder="https://imlucas.com.br/what-a-looong-link">
          <span class="main icon is-left">
              <i data-feather="link"></i>
            </span>
        </div>
        <div class="control">
          <button id="encurtar" class="main button is-pink">Encurtar</button>
        </div>
      </div>
      <h2 class="main subtitle">imlucas.me/<span id="slug" contenteditable="true" spellcheck="false" placeholder="slug-personalizado"></span></h2>
    </div>
  </div>
</section>
<section class="section">
  <div class="container center">
    <h1 class="title">Hello world!</h1>
    <p class="subtitle">Lorem ipsum dolor sit amet.</p>
  </div>
</section>
<div id="modal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Link encurtado com sucesso!</p>
            <button class="delete" id="closeModal"></button>
        </header>
        <section class="modal-card-body">
            <div class="field has-addons">
                <div class="control has-icons-left is-expanded">
                    <input id="shorturl" class="input" type="text" value="imlucas.me/[...]" readonly>
                    <span class="icon is-left">
              <i data-feather="link"></i>
            </span>
                </div>
                <div class="control">
                    <button id="copy" data-clipboard-target="#shorturl" class="button is-pink"><i data-feather="copy"></i></button>
                </div>
            </div>
            <center>
                <img id="qrcode" src="../inc/assets/qrcode.gif">
                <p>Você pode ver as estatísticas para esse link em:<br><a id="stats" href="#">https://imlucas.me/[...]</a></p>
            </center>
        </section>
    </div>
</div>
<script>
    feather.replace();
    new ClipboardJS('#copy');
</script>