import { call_me } from './include/ajax';
import { imask } from './include/imask';
import { input_label, _iserror } from './include/input';
import { close_flash } from './include/flash';

import {autocomplete} from "./include/autocomplete";
import {menu_js} from "./include/menu";
//import {yandex_map_object} from "./include/yandex_map";
import {mobile_menu, add__mobile_menu, mobile_menu_close} from "./include/mobile";
//import {slick} from "./include/slick";
//import {translate} from "./include/translate";
//import {faq} from "./include/faq";
//import { canche_contacts, toggle_contacts } from './include/canche_contacts';
//import { city } from './include/city';
import { chosen } from './include/select';
import { bid } from './include/bid';



document.addEventListener('DOMContentLoaded', function () {

    call_me() // отправка заявки модальное окно
    imask() // маска на поле input input[name="phone"]
    input_label() // input движение label
    close_flash() // закрытие flash
    autocomplete() // autocomplete-ajax
    menu_js() // манипуляции с меню
   // yandex_map_object('43db27ba-be61-4e84-b139-ff37ad4802b8') // карта в объект
    mobile_menu() // работа мобильного меню
    add__mobile_menu() // добавить нужные пункты в меню
    mobile_menu_close() // закрытие мобильного меню
  //  slick() // слайдер
    chosen() //  селекты
    bid() //  заявка в форме
    _iserror() // input удаление  рамки при error


});