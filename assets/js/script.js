// ¯\_(ツ)_/¯ //

var options = {
  "correo": {
    "correo": "el email es incorrecto"
  },
  "username":{
    "NotBlank":"L'identifiant est obligatoire",
    "Email":"El email no es valido"},
  "plainPassword":{
    "NotBlank":"Le mot de passe est obligatoire",
    "Length":{
      "max":"Cette cha\u00eene est trop longue. Elle doit avoir au maximum 4096 caract\u00e8re."
    }
  },
  "title":{
    "NotNull":"La civilit\u00e9 doit \u00eatre renseign\u00e9e"
  },
  "prenoms":{
    "NotBlank":"Le champ 'pr\u00e9nom' doit \u00eatre renseign\u00e9 obligatoirement",
    "Regex":"Le champ \"pr\u00e9nom\" n'est pas valide. Les pr\u00e9noms doivent \u00eatre s\u00e9par\u00e9s par une virgule, sans espaces"
  },
  "nomNaissance":{
    "NotBlank":"Le champ 'nom' doit \u00eatre renseign\u00e9 obligatoirement"
  },
  "nombre": {
    "GreaterThan": "Trop grand",
    "Range": {
      "min": "Range trop petit valeur {{ value }}",
      "max": "Range trop grand"
    }
  },
  "adresse":{
    "NotBlank":"Le champ 'adresse' est obligatoire"
  },
  "codePostal":{
    "NotBlank":"Le champ 'code postal' est obligatoire"
  },
  "ville":{
    "NotBlank":"Le champ 'ville' est obligatoire"
  },
  "telephone1":{
    "NotBlank":"Le champ 't\u00e9l\u00e9phone' est obligatoire",
    "Regex":"Le num\u00e9ro de t\u00e9l\u00e9phone n'est pas valide"
  },
  "telephone2":{
    "Regex":"Le num\u00e9ro de t\u00e9l\u00e9phone n'est pas valide"
  },
  "telephone3":{
    "Regex":"Le num\u00e9ro de t\u00e9l\u00e9phone n'est pas valide"
  },
  "dateNaissance":{
    "NotBlank":"Le champ 'date de naissance' est obligatoire",
    "Regex": "La date n'est pas valide"
  },
  "villeNaissance":{
    "NotBlank":"Le champ 'ville de naissance' est obligatoire"
  },
  "paysNaissance":{
    "NotBlank":"Le champ 'pays de naissance' est obligatoire"
  },
  "dureeExpPro":{
    "GreaterThanOrEqual":"Le nombre doit \u00eatre sup\u00e9rieur ou \u00e9gal \u00e0 0"
  },
  "quotite":{
    "Range":{
      "max":"Cette valeur doit \u00eatre inf\u00e9rieure ou \u00e9gale \u00e0 100."
    }
  }
};

$.fn.ifaBSValidation = function(messages, options) {
  "use strict";
  
  if (!this.length) {
    return this;
  }
  
  var pluginName = '[ifaBSValidation]';
  
  if(typeof($.fn.modal) === 'undefined') {
    // Bootstrap not loaded
    console.error(pluginName, 'Bootstrap not loaded !');
    return;
  }
  
  var settings = $.extend({
    valueMissing: {
      constraints: ['NotNull', 'NotBlank'],
      defaultMessage: "El nombre es requerido"
    },
    typeMismatch: {
      constraints: ['correo'],
      defaultMessage: "[typeMismatch] Le champ n'est pas valide"
    },
    patternMismatch: {
      constraints: ['Regex'],
      defaultMessage: "[patternMismatch] Le champ n'est pas valide"
    },
    rangeOverflow: {
      constraints: ['GreaterThan', 'GreaterThanOrEqual', 'Range'], 
      defaultMessage: "[rangeOverflow] Le valeur dépasse le maximum autorisé"
    },
    rangeUnderflow: {
      constraints: ['LessThan', 'LessThanOrEqual', 'Range'], 
      defaultMessage: "[rangeUnderflow] Le valeur est inférieure au minimum autorisé"
    },
    stepMismatch: {
      constraints: [], 
      defaultMessage: "[stepMismatch] Le champ n'est pas valide"
    },
    tooLong: {
      constraints: ['Range', 'Length'], 
      defaultMessage: "[tooLong] Le champ dépasse {{ value }} caractères"
    }
  }, options);
  
  return this.each(function() {
    if (!$(this).is('form')) {
      console.error(pluginName, "Choosen element is not a form");
      return;
    }
    
    var $form = $(this);
    
    $form.attr('novalidate', true);

    $form.submit(function(event) {
      if (this.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      $form
        .addClass("was-validated")
        .find("input, select, textarea")
        .filter(":visible")
        .each(function() {
          if (!this.validity.valid) {
            $(this)
              .siblings(".invalid-feedback")
              .remove();
          }
          
          var field = this.name.split('[').pop().slice(0, -1);
          var mapping, msg;

          if (this.validity.valueMissing) {
            mapping = settings.valueMissing;
            msg = mapping.defaultMessage;
            
            mapping.constraints.forEach(function(constraint) {
              if (messages[field] && messages[field][constraint]) {
                msg = messages[field][constraint];
              }
            });

            $('<div class="invalid-feedback">')
              .append(msg)
              .appendTo($(this).parent());
          }

          if (this.validity.typeMismatch) {
            mapping = settings.typeMismatch;
            msg = mapping.defaultMessage;
            mapping.constraints.forEach(function(constraint) {
              if (messages[field] && messages[field][constraint]) {
                msg = messages[field][constraint];
              }
            });
            
            $('<div class="invalid-feedback">')
              .append(msg)
              .appendTo($(this).parent());
          }

          if (this.validity.patternMismatch) {
            mapping = settings.patternMismatch;
            msg = mapping.defaultMessage;
            mapping.constraints.forEach(function(constraint) {
              if (messages[field] && messages[field][constraint]) {
                msg = messages[field][constraint];
              }
            });
            
            $('<div class="invalid-feedback">')
              .append(msg)
              .appendTo($(this).parent());
          }

          if (this.validity.rangeOverflow) {
            var max = this.max;
            mapping = settings.rangeOverflow;
            msg = mapping.defaultMessage;
            mapping.constraints.forEach(function(constraint) {
              if (messages[field] && messages[field][constraint]) {
                msg = messages[field][constraint]['max'] 
                 ? messages[field][constraint]['max'] 
                 : messages[field][constraint];
                
                msg = msg.replace('{{ value }}', max);
              }
            });
            
            $('<div class="invalid-feedback">')
              .append(msg)
              .appendTo($(this).parent());
          }

          if (this.validity.rangeUnderflow) {
            var min = this.min;
            mapping = settings.rangeUnderflow;
            msg = mapping.defaultMessage;
            mapping.constraints.forEach(function(constraint) {
              if (messages[field] && messages[field][constraint]) {
                msg = messages[field][constraint]['min'] 
                  ? messages[field][constraint]['min'] 
                  : messages[field][constraint];console.log('min', min);
                
                msg = msg.replace('{{ value }}', min);
              }
            });
            
            $('<div class="invalid-feedback">')
              .append(msg)
              .appendTo($(this).parent());
          }

          if (this.validity.stepMismatch) {
            mapping = settings.stepMismatch;
            msg = mapping.defaultMessage;
            mapping.constraints.forEach(function(constraint) {
              if (messages[field] && messages[field][constraint]) {
                msg = messages[field][constraint];
              }
            });

            $('<div class="invalid-feedback">')
              .append(msg)
              .appendTo($(this).parent());
          }

          if (this.validity.tooLong) {
            var maxlength = this.maxlength;
            mapping = settings.tooLong;
            msg = mapping.defaultMessage.replace('/{{ value }}/', maxlength);
            mapping.constraints.forEach(function(constraint) {
              if (messages[field] && messages[field][constraint]) {
                msg = messages[field][constraint]['max'] 
                  ? messages[field][constraint]['max'] 
                  : messages[field][constraint];
                
                msg = msg.replace('{{ value }}', maxlength);
              }
            });

            $('<div class="invalid-feedback">')
              .append(msg)
              .appendTo($(this).parent());
          }
        });
    });
  });
};


$.fn.ifaFormatDate = function(options) {

        var defaults = {
            hasColorValidation: true,
            mask: '00-00-0000',
            yearPosition: 2,
            monthPosition: 1,
            dayPosition: 0
        };

        var settings = $.extend({}, defaults, options);

        var element = $(this);

        function isDateValid(dateString) {
            var split = dateString.split('-');
            var yyyyMMdd = split[settings.yearPosition]+'-'+split[settings.monthPosition]+'-'+split[settings.dayPosition];

            // Invalid date
            var d = new Date(yyyyMMdd);
            if(!d.getTime()) {
                return false;
            }
            return (d.toISOString().slice(0,10) === yyyyMMdd)
        }

        var maskOptions = {
            onComplete: function(cep) {
                // If we use the plugin with the color validation
                if (settings.hasColorValidation) {
                    if (isDateValid(cep)) {
                        element.addClass('is-valid').removeClass('is-invalid');
                        element[0].setCustomValidity('');
                    }
                    else {
                        element.addClass('is-invalid').removeClass('is-valid');
                        element[0].setCustomValidity("La date n'est pas valide.");
                    }
                }
            },
            onKeyPress: function() {
                if (settings.hasColorValidation) {
                    element.removeClass('is-valid').removeClass('is-invalid');
                    element[0].setCustomValidity('');
                }
            }
        };

        $(this).mask(settings.mask, maskOptions);
    };


$(function() {
  $('form').ifaBSValidation(options);
  
  var cleaveDate = new Cleave('#identite_form_dateNaissance', {
    date: true,
    datePattern: ['d', 'm', 'Y']
  });
  
  $('[data-toggle="popover"]').popover();
});