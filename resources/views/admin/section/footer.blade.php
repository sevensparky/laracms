<!-- footer content -->
        <footer class="hidden-print">
            <div class="pull-left">
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>
<div id="lock_screen">
    <table>
        <tr>
            <td>
                <div class="clock"></div>
                <span class="unlock">
                    <span class="fa-stack fa-5x">
                      <i class="fa fa-square-o fa-stack-2x fa-inverse"></i>
                      <i id="icon_lock" class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                </span>
            </td>
        </tr>
    </table>
</div>
<!-- jQuery -->
<script src="{{ asset('bin/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('bin/bootstrap/dist/js/bootstrap.min.js') }}"></script>


<!-- Custom Theme Scripts -->
<script src="{{ asset('bin/js/custom.min.js') }}"></script>

<!-- /bootstrap-daterangepicker -->

@stack('scripts')

</body>
</html>