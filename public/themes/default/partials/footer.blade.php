        <footer class="page color-5">
            <div class="inner-page row-fluid">
                <div class="span6 social">
                    <a href="#"><i class="icon-twitter"></i></a>
                    <a href="#"><i class="icon-facebook-sign"></i></a>
                </div>
                <div class="span6 text-right copyright">
                    © 2013 {{ $config['name'] }}<a href="#top" title="Got to top" class="scroll"> | Go Up <i class="icon-caret-up"></i></a>
                </div>
            </div>
        </footer>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>
            if (typeof jQuery == 'undefined') {
                document.write(unescape("%3Cscript src='{{ urlencode(Theme::asset()->url('js/jquery-1.9.1.min.js')) }} type='text/javascript'%3E%3C/script%3E"));
            }
        </script>

        <!-- Main js fail. -->
        {{ Theme::asset()->container('footer')->scripts() }}
        {{ alertjs() }}
    </body>
</html>