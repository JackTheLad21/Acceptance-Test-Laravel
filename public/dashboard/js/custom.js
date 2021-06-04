"use strict"

// Shared Colors Definition
const primary = '#9ac5e9';
const success = '#80c984';
const info = '#cfb7cc';
const warning = '#f6cc8f';
const danger = '#d79e9f';

const AVAILABLE_COLORS = [
    '#81e4f7',
    '#80c984',
    '#f6b1d5',
    '#8585cc',
    '#c0dbba',
    '#f6cc8f',
    '#a3f2bd',
    '#7fe3ea',
    '#c4c096',
    '#cffbb0',
    '#ae8082',
    '#c2b795',
    '#aee0d5',
    '#e180c5',
    '#d1c4e8',
    '#d9b27f',
    '#f2f1d0',
    '#80f7fb',
    '#cdd2e4',
    '#f2c99a',
    '#8182f1',
    '#ccf9d7',
    '#badd97',
    '#85efe2',
    '#cfb7cc',
    '#89a1d3',
    '#fda78f',
    '#8a8cc2',
    '#f4c7cc',
    '#9b8bd9',
    '#d38797',
    '#fabcf5',
    '#86ecdd',
    '#c3cafb',
    '#b0ec98',
    '#8fe4f9',
    '#d79e9f',
    '#a1d9df',
    '#adf48d',
    '#88a294',
    '#f0b194',
    '#9a97ce',
    '#fbad8c',
    '#8fd5ef',
    '#baa7c4',
    '#fbf4e8',
    '#8f9cd2',
    '#93fede',
    '#98df8e',
    '#a9b8cb',
    '#91a69e',
    '#fdafd7',
    '#8bc2a6',
    '#93d0e9',
    '#bfc8a5',
    '#a2f7fa',
    '#96afc3',
    '#bffec1',
    '#9ac5e9',
    '#fcf1b0',
    '#86b8cb',
    '#cbd494',
    '#e49f90'
];

/**
 * SweetAlert2 delete confirmation for Laravel delete's form
 * @param {html-object} form
 */
function sweetDelete(form) {
    event.preventDefault()

    Swal.fire({
        title: "Sei sicuro di voler eliminare?",
        text: "Non potrai annullare questa azione!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, elimina!",
        confirmButtonColor: "red",
    }).then(function(result) {
        if (result.value) {
            $(form).submit()
        }
    });
}

$(document).ready(function() {

    // fixes the C:\fakepath\ thingy
    $('.custom-file-input').on('change', function(event) {
        var text = $(this).val();
        if(text) {
            var newValue = $(this).val().replace("C:\\fakepath\\", "");
            $(this).next('.custom-file-label').text(newValue);
        }
    });

    // adds a spinner to a button
    $(".btn-with-spinner").click(function(event) {
        // disable button
        $(this).prop("disabled", true);
        // add spinner to button
        $(this).html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...'
        );
        this.form.submit();
    });


    /**
     * DatePicker Default language
     */
    $.fn.datepicker.defaults.language = 'it';
    $.fn.datepicker.dates['it'] = {
        days: ["Domenica", "Lunedì", "Martedì", "Mercoledì", "Giovedì", "Venerdì", "Sabato"],
        daysShort: ["Dom", "Lun", "Mar", "Mer", "Gio", "Ven", "Sab"],
        daysMin: ["Do", "Lu", "Ma", "Me", "Gi", "Ve", "Sa"],
        months: ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"],
        monthsShort: ["Gen", "Feb", "Mar", "Apr", "Mag", "Giu", "Lug", "Ago", "Set", "Ott", "Nov", "Dic"],
        meridiem: '',
        today: "Oggi",
        clear: "Pulisci"
    };

});
