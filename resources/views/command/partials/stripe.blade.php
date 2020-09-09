<link href="{{ asset('css/scripte.css') }}" rel="stylesheet">
<br>
<div id="payment-pending" class="card">
  <div class="card-content center-align">
    <span class="card-title">Vous avez choisi de payer par carte bancaire. Veuillez compléter le présent formulaire pour procéder à ce règlement</span>
    <p class="orange-text">Nous ne conservons aucune de ces informations sur notre site, elles sont directement transmises à notre prestataire de paiement <a href="https://stripe.com/fr">Stripe</a>.</p>
    <p class="orange-text">La transmission de ces informations est entièrement sécurisée.</p>
    <br>
    <div class="row">

      <form action="/charge" method="post" id="payment-form">
        <div class="form-row">
          <label for="card-element">
            Credit or debit card
          </label>
          <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
          </div>

          <!-- Used to display form errors. -->
          <div id="card-errors" role="alert"></div>
        </div><br>

        <button>Payer</button>
      </form>
    </div>
    <span class="card-title">Pour éviter une éventuelle erreure liée au payement en ligne, nous vous prions de faire un dépôt orange money sur ce numéro ( <b style="color:blue">77.737.56.68</b> ) ou attendre le jour de la livraison pour le payement.</span>
  </div>
</div>
<script src="https://js.stripe.com/v3/"></script>

  
      
       
    