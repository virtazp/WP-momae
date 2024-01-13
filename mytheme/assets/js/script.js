let intElemScrollHeight = 0;
let intElemScrollHeight2 = 0;

window.addEventListener("DOMContentLoaded", function () {

  // #region recaptcha custom
  if (document.getElementById('control') !== null) {
    const control_questions = {
      "questions": {
        1: "Cinq plus 5",
        2: "2 fois deux",
        3: "Dix - cinq",
        4: "15 plus un",
      },
      "reponse": {
        1: "10",
        2: "4",
        3: "5",
        4: "16",
      }
    };

    let control = document.getElementById('control');
    let controlElement2 = document.getElementById('controlElement2');
    let inputrandomNumber = document.getElementById('randomNumber');

    let randomNumber = getRandomIntInclusive(1, 4);
    let randomQuestion = control_questions["questions"][randomNumber];

    controlElement2.innerHTML = randomQuestion + " égal";
    inputrandomNumber.value = randomNumber.toString();
  }
  // #endregion

  // #region Gestion du menu version mobile
  let contNavMob = document.getElementById("top-menu-nav");
  let hamburgerMenuMobile = document.getElementById("mobileNav");

  hamburgerMenuMobile.addEventListener("click", function () {
    if (contNavMob.style.display == "none" || contNavMob.style.display == "") {
      contNavMob.style.display = "flex";
    } else if (contNavMob.style.display == "flex") {
      contNavMob.style.display = "none";
    }
  });

  menuMobileAffiche();
  window.addEventListener("resize", menuMobileAffiche);

  function menuMobileAffiche() {
    if (window.innerWidth > 1199) {
      contNavMob.style.display = "none";
    }
  }

  load_menu_mobile();
  window.addEventListener("resize", load_menu_mobile);

  function load_menu_mobile() {
    console.log("la");
    if (document.body.clientWidth <= 1199 && document.getElementById('top-menu-nav').childElementCount == 0) {
      jQuery.ajax({
        method: "POST",
        dataType: 'json',
        url: ajaxurl,
        data: {
          action: 'wn_menu_mobile'
        },
        success: function (response) {
          console.log(response);
          document.getElementById('top-menu-nav').innerHTML = response.data;
        },
        error: function (err) {
          console.log(err);
        }
      });
    }
    if (document.body.clientWidth > 1199) {
      document.getElementById('top-menu-nav').innerHTML = "";
    }
  }

  load_icone_menu_mobile();
  window.addEventListener("resize", load_icone_menu_mobile);

  function load_icone_menu_mobile() {
    if (document.body.clientWidth <= 1199 && document.getElementById('mobileNav').childElementCount == 0) {
      jQuery.ajax({
        method: "POST",
        dataType: 'json',
        url: ajaxurl,
        data: {
          action: 'wn_icone_menu_mobile'
        },
        success: function (response) {
          document.getElementById('mobileNav').innerHTML = response.data;
        },
        error: function (err) {
          console.log(err);
        }
      });


    }
    if (document.body.clientWidth > 1199) {
      document.getElementById('mobileNav').innerHTML = "";
    }
  }
  // #endregion Gestion du menu et sous menu version mobile

  // #region Gestion barre recherche
  this.document
    .getElementById("et_top_search")
    .addEventListener("click", function () {
      document.getElementById("header-1-2").style.display = "none";
      document.getElementById("rechercheUser").style.display = "block";
    });

  this.document
    .getElementById("closeRechercheUser")
    .addEventListener("click", function () {
      document.getElementById("header-1-2").style.display = "flex";
      document.getElementById("rechercheUser").style.display = "none";
    });
  // #endregion Gestion barre recherche

  // #region Gestion menu
  // Survol de l'élément parent qui comporte un sous menu
  let itemMenu = document.getElementsByClassName('itemMenu');
  Array.prototype.forEach.call(itemMenu, (el) => {
    if (el.classList.contains('trueChildrenExist')) {

      el.addEventListener("mouseenter", function () {
        el.style.backgroundColor = '#EBF0F0';
        el.style.borderBottom = '1px solid #EBF0F0';
        el.children[0].style.color = 'black';
        el.children[1].style.backgroundColor = '#EBF0F0';
        el.children[1].style.borderBottom = '1px solid #EBF0F0';
        el.children[1].style.display = 'flex';
        el.children[1].style.color = '#6db52d';
        el.children[0].children[0].children[0].setAttribute('src', pathSite + '/wp-content/themes/webnetwork/assets/css/images/header/feather-chevron-right-2.svg')
      });

      el.addEventListener("mouseleave", function () {
        el.style.backgroundColor = 'rgba(0,0,0,0)';
        el.style.borderBottom = 'none';

        el.children[1].style.backgroundColor = 'rgba(0,0,0,0)';
        el.children[1].style.display = 'none';
        el.children[1].style.color = 'black';
        el.children[0].children[0].children[0].setAttribute('src', pathSite + '/wp-content/themes/webnetwork/assets/css/images/header/feather-chevron-right.svg')
      });
    }
  });

  // Survol des éléments du sous menu
  let itemMenuSsMenu = document.getElementsByClassName('itemMenuSsMenu');

  Array.prototype.forEach.call(itemMenuSsMenu, (el) => {
    el.addEventListener("mouseenter", function () {
      if (el.classList.contains('currentPage')) {
      } else {
        el.style.backgroundColor = '#6db52d';
      }
    });
    el.addEventListener("mouseleave", function () {
      el.style.backgroundColor = 'rgba(0,0,0,0)';
    });
  });

  // Glissement du menu
  if (window.innerWidth > 980) {
    scrollMenu();
    intElemScrollHeight2 = getBoundingClientRectElement();
    window.addEventListener("scroll", scrollMenu);
  }


  // #endregion Gestion menu

  // #region Zoom
  let subHeader23 = document.getElementById('sub-header23');
  let subHeader24 = document.getElementById('sub-header24');

  let h1Text = document.getElementsByTagName('h1');
  let h1TextElements = [...h1Text];

  let h2Text = document.getElementsByTagName('h2');
  let h2TextElements = [...h2Text];

  let h3Text = document.getElementsByTagName('h3');
  let h3TextElements = [...h3Text];

  let h4Text = document.getElementsByTagName('h4');
  let h4TextElements = [...h4Text];

  let pText = document.getElementsByTagName('p');
  let pTextElements = [...pText];

  let divText = document.getElementsByTagName('div');
  let divTextElements = [...divText];

  let aText = document.getElementsByTagName('a');
  let aTextElements = [...aText];

  let liText = document.getElementsByTagName('li');
  let liTextElements = [...liText];

  subHeader23.addEventListener("click", function () {
    zoom(h1TextElements, '45px', true);
    zoom(h2TextElements, '30px', true);
    zoom(h3TextElements, '22px', true);
    zoom(h4TextElements, '16px', true);
    zoom(pTextElements, '15px', true);
    zoom(divTextElements, '15px', true);
    zoom(aTextElements, '15px', true);
    zoom(liTextElements, '15px', true);
  });

  subHeader24.addEventListener("click", function () {
    zoom(h1TextElements, '45px', false);
    zoom(h2TextElements, '30px', false);
    zoom(h3TextElements, '22px', false);
    zoom(h4TextElements, '16px', false);
    zoom(pTextElements, '15px', false);
    zoom(divTextElements, '15px', false);
    zoom(aTextElements, '15px', false);
    zoom(liTextElements, '15px', false);
  });

  // #endregion Zoom
});

function scrollMenu() {

  intElemScrollHeight = document.getElementById('main-content').getBoundingClientRect().top;

  let itemMenu = document.getElementsByClassName('itemMenu');

  intElemScrollHeight2 = 0;

  // On diminue la hauteur du header
  if (intElemScrollHeight < intElemScrollHeight2) {
    document.getElementById("maLigne").setAttribute("stroke", "#202427");
    document.getElementById("maLigne2").setAttribute("stroke", "#202427");

    document.getElementById('header1').classList.remove('header1-normal');
    document.getElementById('header1').classList.add('header1-scroll');

    document.getElementById('header-1').classList.remove('header-1-normal');
    document.getElementById('header-1').classList.add('header-1-scroll');

    document.getElementById('header-1-1-1').classList.remove('header-1-1-1-normal');
    document.getElementById('header-1-1-1').classList.add('header-1-1-1-scroll');


    document.getElementById('rechercheUser').classList.remove('rechercheUser-normal');
    document.getElementById('rechercheUser').classList.add('rechercheUser-scroll');

    document.getElementById('closeRechercheUser').classList.remove('closeRechercheUser-normal');
    document.getElementById('closeRechercheUser').classList.add('closeRechercheUser-scroll');

    document.getElementById('search-field').classList.remove('search-field-normal');
    document.getElementById('search-field').classList.add('search-field-scroll');

    Array.prototype.forEach.call(itemMenu, (el) => {
      el.children[0].classList.remove('itemMenu-child-normal');
      el.children[0].classList.add('itemMenu-child-scroll');
    });
  } else {
    document.getElementById("maLigne").setAttribute("stroke", "white");
    document.getElementById("maLigne2").setAttribute("stroke", "white");

    document.getElementById('header1').classList.add('header1-normal');
    document.getElementById('header1').classList.remove('header1-scroll');

    document.getElementById('header-1').classList.add('header-1-normal');
    document.getElementById('header-1').classList.remove('header-1-scroll');

    document.getElementById('header-1-1-1').classList.add('header-1-1-1-normal');
    document.getElementById('header-1-1-1').classList.remove('header-1-1-1-scroll');


    document.getElementById('rechercheUser').classList.add('rechercheUser-normal');
    document.getElementById('rechercheUser').classList.remove('rechercheUser-scroll');

    document.getElementById('closeRechercheUser').classList.add('closeRechercheUser-normal');
    document.getElementById('closeRechercheUser').classList.remove('closeRechercheUser-scroll');

    document.getElementById('search-field').classList.add('search-field-normal');
    document.getElementById('search-field').classList.remove('search-field-scroll');

    Array.prototype.forEach.call(itemMenu, (el) => {
      el.children[0].classList.add('itemMenu-child-normal');
      el.children[0].classList.remove('itemMenu-child-scroll');
    });
  }
  // Sert de base pour savoir si l'utilisateur monte ou descend sur la page
  intElemScrollHeight2 = intElemScrollHeight;
}

// Récupère la position de la page dans le navigateur
function getBoundingClientRectElement() {
  return document.getElementById('main-content').getBoundingClientRect().top;
}

function zoom(elements, sizeOrigin, bPlus) {
  Array.prototype.forEach.call(elements, (el) => {
    if (el.style.fontSize != '') {
      let TextFontSize = el.style.fontSize.split('px');
      TextFontSize = parseFloat(TextFontSize, 10);
      if (bPlus) {
        TextFontSize = TextFontSize + 2;
      } else {
        TextFontSize = TextFontSize - 2;
      }
      el.style.fontSize = TextFontSize + 'px';
    } else {
      el.style.fontSize = sizeOrigin;

      let TextFontSize = el.style.fontSize.split('px');

      TextFontSize = parseFloat(TextFontSize, 10);
      if (bPlus) {
        TextFontSize = TextFontSize + 2;
      } else {
        TextFontSize = TextFontSize - 2;
      }
      el.style.fontSize = TextFontSize + 'px';
    }
    // console.log(window.getComputedStyle(el, null).getPropertyValue('font-size'));
  });
}

function getRandomIntInclusive(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

