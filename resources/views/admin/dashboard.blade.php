<x-layout>

    <div class="container">
      <div class="row">
        <div class="col-12">
          <hr class="text-secondary">
          <h4 class="text-secondary text-center">
            Area richieste
          </h4>
        </div>
      </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="accordion border accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                          Richieste per Admin
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <x-rulesTables :ruleRequest="$adminRequest" rule='Admin'/>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Richieste per Revisore
                        </button>
                      </h2>
                      <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <x-rulesTables :ruleRequest="$revisorRequest" rule='Revisore'/>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Richieste per Scrittore
                        </button>
                      </h2>
                      <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <x-rulesTables :ruleRequest="$writerRequest" rule='Scrittore'/>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <hr class="text-secondary">
          <h4 class="text-secondary text-center">
            Area Modifiche
          </h4>
        </div>
      </div>
    </div>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-8">
              <div class="accordion border accordion-flush" id="accordionFlushExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Modifiche-1" aria-expanded="false" aria-controls="Modifiche-1">
                        Modifica Tags
                      </button>
                    </h2>
                    <div id="Modifiche-1" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                      <x-metaType :metaType='$tags' metaData='tags'/>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Modifiche-2" aria-expanded="false" aria-controls="Modifiche-2">
                        Modifica categorie
                      </button>
                    </h2>
                    <div id="Modifiche-2" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                      <x-metaType :metaType='$categories' metaData='category'/>
                    </div>
                  </div>

              </div>
          </div>
      </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12 text-secondary text-center">
        <hr>
        <h4>Area Creazione</h4>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-8 mt-5">
        <form action="{{route('admin.addCat')}}" method="POST" class="d-flex justify-content-around border p-5">
          @csrf
            <div class="col-2">
              <p class="text-secondary">Scrivi il nome della nuova categoria a destra</p>
            </div>
            <div class="col-6">
              <input type="text" name="category" class="form-login-custom">
            </div>
            <div class="col-2">
              <button type="submit" class="btn btn-primary "> Crea</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</x-layout>