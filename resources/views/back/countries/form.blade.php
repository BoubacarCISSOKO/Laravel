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
        
          <form method="POST" action="@isset($country) {{ route('pays.update', $country->id) }} @else {{ route('pays.store') }} @endisset">
            <div class="card-body">
              @isset($country) @method('PUT') @endisset
              @csrf
                
                <label><b>Nom</b>
                    <x-inputbs4
                    name="name"
                    type="text"
                    label=""
                    :value="isset($country) ? $country->name : ''"
                    ></x-inputbs4>
                </label>

                <label><b>Taxe</b>
                    <x-inputbs4
                    name="tax"
                    type="text"
                    label=""
                    :value="isset($country) ? $country->tax : ''"
                    ></x-inputbs4>
                </label>

              </div>
            </div>      

            <div class="form-group row mb-0">
              <div class="col-md-12">
                <a class="btn btn-primary" href="{{ route('pays.index') }}" role="button"><i class="fas fa-arrow-left"></i> Retour à la liste des pays</a>
                <button type="submit" class="btn btn-primary">Enregistrer</button>          
              </div>
            </div>
              
          </form>

        </div>
      </div>
    </div>
  </div>
@endsection