<!doctype html>
<html lang="pt-br" data-bs-theme="auto">
  <head>
    <base href="./">
    <script src="js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Thiago Lira">
    <meta name="generator" content="Thiago 0.12.2023">

    <title>Kanban</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/masonry/">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    
  </head>
  <body> 
    <main class="container py-5">
      <h1>Kanban</h1>
      <p>Masonry is not included in Bootstrap. Add it by including the JavaScript plugin manually, or using a CDN like so:</p>
      <hr>
      <div class="container">
        <div class="row">
          <div class="col-sm text-center dropzone" id="backlog" style="padding: 0px; padding-right: 10px;" ondragover="onDragOver(event);" ondrop="onDrop(event);">
            <div style="color: white; background-color: black;">
              <b>Backlog</b>
            </div><br>
            <!-- Cards backlog aqui -->
          </div>
          <div class="col-sm text-center dropzone" id="em_andamento" style="padding: 0px; padding-right: 10px;" ondragover="onDragOver(event);" ondrop="onDrop(event);">
            <div style="color: white; background-color: black;">
              <b>Em andamento</b>
            </div><br>
            <!-- Cards em andamento aqui -->
          </div>
          <div class="col-sm text-center dropzone" id="aguardando_validacao" style="padding: 0px; padding-right: 10px;" ondragover="onDragOver(event);" ondrop="onDrop(event);">
            <div style="color: white; background-color: black;">
              <b>Aguardando validação</b>
            </div><br>
            <!-- Cards em validação aqui -->
          </div>
          <div class="col-sm text-center dropzone" id="concluido" style="padding: 0px;" ondragover="onDragOver(event);" ondrop="onDrop(event);">
            <div style="color: white; background-color: black;">
              <b>Concluído</b>
            </div><br>
            <!-- Cards concluído aqui -->
            <div class="card text-white mb-3 bg-success" style="max-width: 18rem; margin: auto;" draggable="true" id="card-10" ondragstart="onDragStart(event);">
              <div class="card-header" id="card-10-header">Data Conclusão: </div>
              <div class="card-body" id="card-10-body">
                <h5 class="card-title" id="card-10-title">Título de Card Primary</h5>
                <p class="card-text" id="card-10-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
              </div>
              <div class="card-footer" id="card-10-footer">Data Prazo: </div>
            </div>
          </div>
        </div>
      </div>
      <hr class="my-5">
    </main>
    <script async src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script async src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"></script>
    <script async src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
      /** help */
      function log(message) {
          console.log('> ' + message)
      }

      /** app */
      const cards = document.querySelectorAll('.card')
      const dropzones = document.querySelectorAll('.dropzone')


      /** our cards */
      cards.forEach(card => {
          card.addEventListener('dragstart', dragstart)
          card.addEventListener('drag', drag)
          card.addEventListener('dragend', dragend)
      })

      function dragstart() {
          // log('CARD: Start dragging ')
          dropzones.forEach( dropzone => dropzone.classList.add('highlight'))

          // this = card
          this.classList.add('is-dragging')
      }

      function drag() {
          // log('CARD: Is dragging ')
      }

      function dragend() {
          // log('CARD: Stop drag! ')
          dropzones.forEach( dropzone => dropzone.classList.remove('highlight'))

          // this = card
          this.classList.remove('is-dragging')
      }

      /** place where we will drop cards */
      dropzones.forEach( dropzone => {
          dropzone.addEventListener('dragenter', dragenter)
          dropzone.addEventListener('dragover', dragover)
          dropzone.addEventListener('dragleave', dragleave)
          dropzone.addEventListener('drop', drop)
      })

      function dragenter() {
          // log('DROPZONE: Enter in zone ')
      }

      function changeColor(element, classeColor){
        var classes = element.className.split(" ");
        var novasClasses = "";
        for (classe of classes){
          if(classe.substr(0, 3) == "bg-"){
            novasClasses += (classeColor + " ");
          }else{
            novasClasses += (classe + " ");
          }
        }
        element.className = novasClasses;
      }

      function dragover() {
          // this = dropzone
          this.classList.add('over')

          // get dragging card
          const cardBeingDragged = document.querySelector('.is-dragging')

          // change card status
          switch (this.id) {
            case "backlog":
              changeColor(cardBeingDragged, "bg-warning");
              break;
            case "em_andamento":
              changeColor(cardBeingDragged, "bg-info");
              break;
            case "aguardando_validacao":
              changeColor(cardBeingDragged, "bg-secondary");
              break;
            case "concluido":
              changeColor(cardBeingDragged, "bg-success");
              break;
          }

          // this = dropzone
          this.appendChild(cardBeingDragged)

      }

      function dragleave() {
          // log('DROPZONE: Leave ')
          // this = dropzone
          this.classList.remove('over')
      }

      function drop() {
          // log('DROPZONE: dropped ')
          this.classList.remove('over')
      }

    </script>
  </body>
</html>
