<x-layout>
    <div class="container mt-5">
        <hr class="text-secondary">
        <div class="row">
            <div class="col-12">
                <h3 class="display-6 mt-3 text-center">Lavora con noi</h3>
                <div class="row mt-5">
                    <div class="col-6 d-flex flex-column gap-5">
                        <div>
                            <h4 class="fw-bold">
                                Di cosa si occupa un <span class="fst-italic fs-3">Amministratore</span>?
                            </h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta incidunt eaque repudiandae voluptatum accusamus perspiciatis, sapiente minima ex praesentium in tempore repellendus ab exercitationem! Quia neque voluptas inventore. Consequatur, reiciendis?</p>
                        </div>
                        <div>
                            <h4 class="fw-bold">
                                Di cosa si occupa un <span class="fst-italic fs-3">Revisore</span>?
                            </h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta incidunt eaque repudiandae voluptatum accusamus perspiciatis, sapiente minima ex praesentium in tempore repellendus ab exercitationem! Quia neque voluptas inventore. Consequatur, reiciendis?</p>
                        </div>
                        <div>
                            <h4 class="fw-bold">
                                Di cosa si occupa uno <span class="fst-italic fs-3">Scrittore</span>?
                            </h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta incidunt eaque repudiandae voluptatum accusamus perspiciatis, sapiente minima ex praesentium in tempore repellendus ab exercitationem! Quia neque voluptas inventore. Consequatur, reiciendis?</p>
                        </div>
                    </div>
                    <div class="col-6 px-5">
                        <form action="{{route('workWithUs')}}" method="post">
                            @csrf
                            <div class="mb-3 gap-3">
                              <label class="form-label">Email address</label>
                              <input type="email" class="form-workWithUs-custom" value="{{Auth::user()->email}}" name="email">
                            </div>
                            <div class="mb-3 d-flex flex-column justify-content-around gap-3">
                                <label class="text-secondary">Scegli per che posizione candidarti</label>
                                <select class="form-login-custom text-secondary border-color-secondary" name="roles">
                                    <option value="0">Scegli una candidatura</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Reviewer">Revisionatore</option>
                                    <option value="Scrittore">Scrittore</option>
                                </select>
                            </div>
                            <div class="mb-3 d-flex flex-column gap-3">
                                <label for="body" class="text-secondary">Perché vuoi lavorare con noi?</label>
                                <textarea name="body" id="body" cols="30" rows="7" class="form-textarea-WorkWith-custom"></textarea>
                            </div>
                            <button type="submit" class="form-btn-custom">Aggiungi articolo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>