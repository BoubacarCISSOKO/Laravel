@extends('back.layout')
@section('main') 
  <div class="container-fluid"> 
    @if(session()->has('alert'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('alert') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
        
          <form method="POST" action="#">
            <div class="card-body">
              @method('PUT')
              @csrf
              <div class="card">
                <h5 class="card-header">Identité</h5>
                <div class="card-body">
                    <label><b>Nom</b>
                        <x-inputbs4
                            name="name"
                            type="text"
                            label=""
                            :value="$shop->name"
                        ></x-inputbs4>
                    </label><br>
                    <label><b>Adresse</b>
                        <x-inputbs4
                            name="address"
                            type="text"
                            label=""
                            :value="$shop->address"
                        ></x-inputbs4>
                    </label><br>
                    <label><b>Email</b>
                        <x-inputbs4
                            name="email"
                            type="email"
                            label=""
                            :value="$shop->email"
                        ></x-inputbs4>
                    </label><br>
                    <label><b>Téléphone</b>
                        <x-inputbs4
                            name="phone"
                            type="text"
                            label=""
                            :value="$shop->phone"
                        ></x-inputbs4>
                    </label><br>
                    <label><b>Facebook</b>
                        <x-inputbs4
                            name="facebook"
                            type="text"
                            label=""
                            :value="$shop->facebook"
                        ></x-inputbs4>
                    </label>
                </div>
              </div>
              <div class="card">
                <h5 class="card-header">Banque</h5>
                <div class="card-body">

                    <label><b>Titulaire</b>
                        <x-inputbs4
                            name="holder"
                            type="text"
                            label=""
                            :value="$shop->holder"
                        ></x-inputbs4>
                    </label><br>
                    <label><b>Nom</b>
                        <x-inputbs4
                            name="bank"
                            type="text"
                            label=""
                            :value="$shop->bank"
                        ></x-inputbs4>
                    </label><br>
                    <label><b>Adresse</b>
                        <x-inputbs4
                            name="bank_address"
                            type="text"
                            label=""
                            :value="$shop->bank_address"
                        ></x-inputbs4>
                    </label><br>
                    <label><b>BIC</b>
                        <x-inputbs4
                            name="bic"
                            type="text"
                            label=""
                            :value="$shop->bic"
                        ></x-inputbs4>
                    </label><br>
                    <label><b>IBAN </b>
                        <x-inputbs4
                            name="iban"
                            type="text"
                            label=""
                            :value="$shop->iban"
                        ></x-inputbs4>
                    </label><br>
                </div>
              </div>
              <div class="card">
                <h5 class="card-header">Accueil</h5>
                <div class="card-body">
          
                    <label><b>Titre</b>
                        <x-inputbs4
                            name="home"
                            type="text"
                            label=""
                            :value="$shop->home"
                        ></x-inputbs4>
                    </label><br>
                    <label><b>Informations générales</b>
                        <x-textareabs4
                            name="home_infos"
                            label=""
                            :value="$shop->home_infos"
                        ></x-textareabs4>
                    </label><br>
                    <label><b>Frais d'expédition</b>
                        <x-textareabs4
                            name="home_shipping"
                            label=""
                            :value="$shop->home_shipping"
                        ></x-textareabs4>
                    </label><br>
                </div>
              </div>
              <div class="card">
                <h5 class="card-header">Facturation</h5>
                <div class="card-body">
                    <label><b>Activation de la facturation</b>
                        <x-checkbox
                            name="invoice"
                            label=""
                            :value="$shop->invoice"
                        ></x-checkbox>
                    </label>
                  
                </div>
              </div>
              <div class="card">
                <h5 class="card-header">Modes de paiement acceptés</h5>
                <div class="card-body">
                    <label><b>Carte bancaire</b>
                        <x-checkbox
                            name="card"
                            label=""
                            :value="$shop->card"
                        ></x-checkbox>
                    </label><br>
                    <label><b>Virement</b>
                        <x-checkbox
                            name="transfer"
                            label=""
                            :value="$shop->transfer"
                        ></x-checkbox>
                    </label><br>
                    <label><b>Chèque</b>
                        <x-checkbox
                            name="check"
                            label=""
                            :value="$shop->check"
                        ></x-checkbox>
                    </label><br>
                    <label><b>Mandat administratif</b>
                        <x-checkbox
                            name="mandat"
                            label=""
                            :value="$shop->mandat"
                        ></x-checkbox>
                    </label>
                
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-12">
                   <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
              </div>
              
            </div>            
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection