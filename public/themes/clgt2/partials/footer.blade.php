        <div class="footer" >
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left" >
                            <span class="copyright">
                                &copy; 2014 <a href="{{ url('/') }}">{{ $config['name'] }}</a>
                            </span>
                        </div>
                        <div class="pull-right" >
                            <a href="#" class="twitter" ><i ></i>Twitter</a><a href="#" class="facebook" ><i ></i>Facebook</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="{{ Theme::asset()->url('js/ie-row-fix.js') }}"></script>
        {{ alertjs() }}
    </body>
</html>