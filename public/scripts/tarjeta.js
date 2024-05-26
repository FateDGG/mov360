document.addEventListener('DOMContentLoaded', function() {
    const cardNumberInput = document.getElementById('cardNumber');
    const cardNameInput = document.getElementById('cardName');
    const cardMonthSelect = document.getElementById('cardMonth');
    const cardYearSelect = document.getElementById('cardYear');
    const cardCvvInput = document.getElementById('cardCvv');
    
    // Event listeners for inputs
    cardNumberInput.addEventListener('input', updateCardNumber);
    cardNameInput.addEventListener('input', updateCardName);
    cardMonthSelect.addEventListener('change', updateCardDate);
    cardYearSelect.addEventListener('change', updateCardDate);
    cardCvvInput.addEventListener('input', updateCardCvv);
  
    function updateCardNumber() {
      const cardNumberLabel = document.getElementById('card-number-label');
      const cardTypeImg = document.getElementById('card-type-img');
      let cardNumber = cardNumberInput.value.replace(/\s+/g, '');
  
      // Restrict card number input length based on card type
      const cardType = detectCardType(cardNumber);
      const maxLength = getCardMaxLength(cardType);
  
      if (cardNumber.length > maxLength) {
        cardNumber = cardNumber.slice(0, maxLength);
        cardNumberInput.value = formatCardNumber(cardNumber);
      }
  
      cardNumberLabel.innerText = formatCardNumber(cardNumber);
      cardTypeImg.src = getCardTypeImage(cardType);
      cardTypeImg.style.display = cardType ? 'block' : 'none';
    }
  
    function updateCardName() {
      const cardNameLabel = document.getElementById('card-name');
      cardNameLabel.innerText = cardNameInput.value;
    }
  
    function updateCardDate() {
      const cardMonth = document.getElementById('card-month');
      const cardYear = document.getElementById('card-year');
      cardMonth.innerText = cardMonthSelect.value || 'MM';
      cardYear.innerText = (cardYearSelect.value || 'YY').slice(-2);
    }
  
    function updateCardCvv() {
      const cardCvvLabel = document.getElementById('card-cvv');
      cardCvvLabel.innerText = cardCvvInput.value.replace(/./g, '*');
    }
  
    function formatCardNumber(cardNumber) {
      return cardNumber.replace(/\s+/g, '').replace(/(\d{4})(?=\d)/g, '$1 ');
    }
  
    function getCardTypeImage(cardType) {
      switch (cardType) {
        case 'visa':
          return 'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/visa.png';
        case 'mastercard':
          return 'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/mastercard.png';
        case 'amex':
          return 'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/amex.png';
        default:
          return '';
      }
    }
  
    function detectCardType(cardNumber) {
      const visaPattern = /^4[0-9]{0,15}$/;
      const masterCardPattern = /^5[1-5][0-9]{0,14}$/;
      const amexPattern = /^3[47][0-9]{0,13}$/;
  
      if (visaPattern.test(cardNumber)) {
        return 'visa';
      } else if (masterCardPattern.test(cardNumber)) {
        return 'mastercard';
      } else if (amexPattern.test(cardNumber)) {
        return 'amex';
      } else {
        return '';
      }
    }
  
    function getCardMaxLength(cardType) {
      switch (cardType) {
        case 'visa':
        case 'mastercard':
          return 16;
        case 'amex':
          return 15;
        default:
          return 16;
      }
    }
  });
  