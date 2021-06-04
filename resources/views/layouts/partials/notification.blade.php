<script>
@if(Session::has('notification'))

    /**
     * General Toastr/Flash options
     */
     toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    @php
        $toaster_type = (isset(Session::get('notification')['type'])) ? Session::get('notification')['type'] : 'success';
    @endphp

    toastr.{!! $toaster_type !!}("{{ Session::get('notification')['message'] }}");

@endif
</script>
