<!-- Helpers -->
<script src="{{ asset('dashboard-assets/vendor/js/helpers.js') }}"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('dashboard-assets/js/config.js') }}"></script>
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('dashboard-assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('dashboard-assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('dashboard-assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('dashboard-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('dashboard-assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('dashboard-assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('dashboard-assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('dashboard-assets/js/dashboards-analytics.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@livewireScripts()

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            theme: 'bootstrap-5'
        });
    });
</script>
