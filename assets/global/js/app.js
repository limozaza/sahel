//JQUERY
import $ from 'jquery';
global.$ = $;
//FONT AWESOME
import 'font-awesome/scss/font-awesome.scss';
import swal from 'sweetalert2'
//BOOTSTRAP
import 'popper.js';
import 'bootstrap';
import 'bootstrap/scss/bootstrap.scss'

import '../css/app.scss'




$(function () {
    $('.zakaria').on('click',function () {
        swal('Any fool can use a computer')
    })
    $('[data-toggle="tooltip"]').tooltip()

    list();


})



function list() {
    $.ajax({
        type: 'GET',
        url: Routing.generate('list_exemple'),
        success: function (data) {
        }
    })
}