<footer class="footer mt-auto">
    <div class="copyright bg-white">
        <p>
            &copy; <span id="copy-year">{{ date('Y') }}</span> Copyright Admin panel By
            <a class="text-primary" href="{{ route('frontend.home') }}" target="_blank">{{ strtoupper($config->title) }} </a>.
        </p>
    </div>
    <script>
        var d = new Date();
        var year = d.getFullYear();
        document.getElementById("copy-year").innerHTML = year;
    </script>
</footer>
