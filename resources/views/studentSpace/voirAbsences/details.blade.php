

<div class="card">
  <div class="card-block">
        

    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          
          {{-- <div class="box-header with-border">
            <h3 class="box-title">Informations</h3>
          </div>
 --}}
          
          <div class="box-body">
            <div class="box-body">

              <div class="row">
                
                <div class="col-md-6">
                  <strong>Module:</strong>
                </div>
                
                <div class="col-md-6">
                  <p class="text-muted">
                    {{$absence->seance->module}}
                  </p>
                </div>

              </div>
                          
              <div class="row">
                          
                <div class="col-md-6">
                  <strong>Jour:</strong>
                </div>
                    
                <div class="col-md-6">
                  <p class="text-muted">
                    {{ $absence->seance->jour }}
                  </p>
                </div>
              </div>
                        
              <div class="row">
                
                <div class="col-md-6">
                  <strong>Type:</strong>
                </div>
                          
                <div class="col-md-6">
                  <p class="text-muted">
                    {{ $absence->seance->type }}
                  </p>
                </div>
                        
              </div>
                      
              <strong><i class="margin-r-5"></i></strong>
                          
              <hr>
                          
              <div class="row">
                          
                <div class="col-md-6">
                  <strong>
                      heure début séance:
                  </strong>
                </div>

                <div class="col-md-6">
                  <p class="text-muted">
                    {{ $absence->seance->heur_debut }}
                  </p>
                </div>

              </div>

              <div class="row">
                          
                <div class="col-md-6">
                  <strong>
                      heure fin séance:
                  </strong>
                </div>

                <div class="col-md-6">
                    {{ $absence->seance->heur_fin }}
                  </p>
                </div>
                
              </div>

              <div class="row">
                          
                <div class="col-md-6">
                  <strong>
                      Salle:
                  </strong>
                </div>

                <div class="col-md-6">
                  <p class="text-muted">
                    {{ $absence->seance->salle->nom }}
                  </p>
                </div>
                
              </div>

              <div class="row">
                          
                <div class="col-md-6">
                  <strong>
                      Enseignant:
                  </strong>
                </div>

                <div class="col-md-6">
                  <p class="text-muted">
                    {{ $absence->seance->enseignant->nom }} {{ $absence->seance->enseignant->prenom }}
                  </p>
                </div>
                
              </div>
                
                
                      
              </div>
                    <!-- /.box-body -->
            </div>
                  
          </div><!-- /.container -->
          
        </div>
      </div>
    </div>
  </div>