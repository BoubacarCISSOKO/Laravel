<div class="card-content">
  @csrf
  <div class="row col s12">
    <label>
      <input type="checkbox" name="professionnal" id="professionnal" {{ old('professionnal', isset($adress) ? $adress->professionnal : false) ? 'checked' : '' }}>
      <span>C'est une adresse professionnelle</span>
    </label>
  </div>
  <div class="row col s12">
    <label>
      <input name="civility" type="radio" value="Mme" {{ old('civility', isset($adress) ? $adress->civility : '') == 'Mme' ? 'checked' : '' }} />
      <span>Mme.</span>
    </label>
    <label>
      <input name="civility" type="radio" value="M." {{ old('civility', isset($adress) ? $adress->civility : '') == 'M.' ? 'checked' : '' }} />
      <span>M.</span>
    </label>
  </div>
  <label><b>Nom</b>
    <x-input
      name="name"
      type="text"
      icon="person"
      label=""
      :value="isset($adress) ? $adress->name : ''"
    ></x-input>
  </label>
  <label><b>Prénom</b>
    <x-input
      name="firstname"
      type="text"
      icon="person"
      label=""
      :value="isset($adress) ? $adress->firstname : ''"
    ></x-input>
  </label>
  <label><b>Raison sociale</b>
    <x-input
      name="company"
      type="text"
      icon="business"
      label=""
      :value="isset($adress) ? $adress->company : ''"
    ></x-input>
  </label>
  <label><b>N° et libellé de la voie</b>
    <x-input
      name="address"
      type="text"
      icon="home"
      label=""
      :value="isset($adress) ? $adress->address : ''"
      required="true"
    ></x-input>
  </label>
  <label><b>Bâtiment, Immeuble (optionnel)</b>
    <x-input
      name="addressbis"
      type="text"
      icon="home"
      label=""
      :value="isset($adress) ? $adress->addressbis : ''"
    ></x-input>
  </label>
  <label><b>Lieu-dit ou BP (optionnel)</b>
    <x-input
      name="bp"
      type="text"
      icon="location_on"
      label=""
      :value="isset($adress) ? $adress->bp : ''"
    ></x-input>
  </label>
  <label><b>Code postal</b>
    <x-input
      name="postal"
      type="text"
      icon="location_on"
      label=""
      :value="isset($adress) ? $adress->postal : ''"
      required="true"
    ></x-input>
  </label>
  <label><b>Ville</b>
    <x-input
      name="city"
      type="text"
      icon="location_on"
      label=""
      :value="isset($adress) ? $adress->city : ''"
      required="true"
    ></x-input>
  </label>
  <div class="row">
    <div class="input-field col s12">
      <i class="material-icons prefix">location_on</i>
      <select name="country_id">
        @foreach($countries as $country)
          <option 
            value="{{ $country->id }}" 
            @if(old('country_id', isset($adress) ? $adress->country_id : '') == $country->id) selected @endif>{{ $country->name }}
          </option>
        @endforeach
      </select>
      <label>Pays</label>
    </div>
  </div>
  <label><b>N° de téléphone</b>
    <x-input
      name="phone"
      type="text"
      icon="phone"
      label=""
      :value="isset($adress) ? $adress->phone : ''"
      required="true"
    ></x-input>
  </label>
  <p>
    <button class="btn waves-effect waves-light" style="width: 100%" type="submit">
      Enregistrer
    </button>
  </p>
</div>