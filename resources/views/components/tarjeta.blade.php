<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Credit Card Form</title>
  <link rel="stylesheet" href="{{ asset('css/tarjeta.css') }}">
</head>
<body>
    <div class="wrapper" id="app">
        <div class="card-form">
          <div class="card-list">
            <div class="card-item" id="card-item">
              <div class="card-item__side -front">
                <div class="card-item__focus" id="focus-element"></div>
                <div class="card-item__cover">
                  <img id="card-background" class="card-item__bg">
                </div>
                <div class="card-item__wrapper">
                  <div class="card-item__top">
                    <img src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/chip.png" class="card-item__chip">
                    <div class="card-item__type">
                      <img id="card-type-img" alt="" class="card-item__typeImg">
                    </div>
                  </div>
                  <label for="cardNumber" class="card-item__number" id="card-number-label">
                    <!-- Card Number will be dynamically generated -->
                  </label>
                  <div class="card-item__content">
                    <label for="cardName" class="card-item__info" id="card-name-label">
                      <div class="card-item__holder">Card Holder</div>
                      <div class="card-item__name" id="card-name">Full Name</div>
                    </label>
                    <div class="card-item__date" id="card-date">
                      <label for="cardMonth" class="card-item__dateTitle">Expires</label>
                      <label for="cardMonth" class="card-item__dateItem" id="card-month">MM</label> /
                      <label for="cardYear" class="card-item__dateItem" id="card-year">YY</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-item__side -back">
                <div class="card-item__cover">
                  <img id="card-back-background" class="card-item__bg">
                </div>
                <div class="card-item__band"></div>
                <div class="card-item__cvv">
                  <div class="card-item__cvvTitle">CVV</div>
                  <div class="card-item__cvvBand" id="card-cvv">***</div>
                  <div class="card-item__type">
                    <img id="card-back-type-img" class="card-item__typeImg">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-form__inner">
            <div class="card-input">
              <label for="cardNumber" class="card-input__label">Card Number</label>
              <input type="text" id="cardNumber" class="card-input__input" autocomplete="off">
            </div>
            <div class="card-input">
              <label for="cardName" class="card-input__label">Card Holder</label>
              <input type="text" id="cardName" class="card-input__input" autocomplete="off">
            </div>
            <div class="card-form__row">
              <div class="card-form__col">
                <div class="card-form__group">
                  <label for="cardMonth" class="card-input__label">Expiration Date</label>
                  <select class="card-input__input -select" id="cardMonth">
                    <option value="" disabled selected>Month</option>
                    <?php for ($i = 1; $i <= 12; $i++): ?>
                      <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?= str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
                    <?php endfor; ?>
                  </select>
                  <select class="card-input__input -select" id="cardYear">
                    <option value="" disabled selected>Year</option>
                    <?php for ($i = date('Y'); $i < date('Y') + 12; $i++): ?>
                      <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                  </select>
                </div>
              </div>
              <div class="card-form__col -cvv">
                <div class="card-input">
                  <label for="cardCvv" class="card-input__label">CVV</label>
                  <input type="text" class="card-input__input" id="cardCvv" maxlength="4" autocomplete="off">
                </div>
              </div>
            </div>
            <button class="card-form__button" id="submit-button">Agregar</button>
          </div>
        </div>

    </div>
<script src="{{ asset('scripts/tarjeta.js') }}"></script>
</body>
</html>
